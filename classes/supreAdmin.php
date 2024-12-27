<?php
require_once '../connection/conn.php';
require_once 'utilisateur.php';

class superAdmin extends utilisateur
{
    protected $role = "superAdmin";
    protected $status = "active";

    private $tablename = 'user';
    private $pdo;

    function registement($nom, $prenom, $email, $password)
    {

        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();

        $role_name = 'superAdmin';

        $role_sql = "SELECT role_id FROM role WHERE titre = :role_name";
        $stmt_role = $pdo->prepare($role_sql);
        $stmt_role->bindParam(':role_name', $role_name);
        $stmt_role->execute();

        $role = $stmt_role->fetch(PDO::FETCH_ASSOC);
        if ($role) {
            $role_id = $role['role_id'];
        } else {
            $insert_role_sql = "INSERT INTO role (titre) VALUES (:role_name)";
            $stmt_insert_role = $pdo->prepare($insert_role_sql);
            $stmt_insert_role->bindParam(':role_name', $role_name);
            if ($stmt_insert_role->execute()) {
                $role_id = $pdo->lastInsertId();
            } else {
                echo 'Error: Could not insert role';
                return;
            }
        }

        $sql = "INSERT INTO {$this->tablename} (nom, prenom, email, password, status, role_id) 
              VALUES(:nom, :prenom, :email, :password, :status, :role_id)";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':role_id', $role_id);

        if ($stmt->execute()) {
            echo 'done';
        } else {
            echo 'Error occurred during registration.';
        }
    }
}
