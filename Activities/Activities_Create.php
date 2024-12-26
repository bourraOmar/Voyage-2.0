<?php 
require_once '../connection/conn.php';

class Activities{
    protected $nom;
    protected $description;
    protected $price;
    protected $date_activite;
    private $tablename = 'activity';
    private $pdo;
    
    function CreateNewActivitie($nom, $description, $price, $date_activite){
        $this->nom = $nom;
        $this->description = $description;
        $this->price = $price;
        $this->date_activite = $date_activite;
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();
        $sql = "INSERT INTO {$this->tablename} (nom, description, price, date_activite) 
                VALUES (:nom, :description, :price, :date_activite)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindparam(':nom', $this->nom);
        $stmt->bindparam(':description', $this->description);
        $stmt->bindparam(':price', $this->price);
        $stmt->bindparam(':date_activite', $this->date_activite);

        if($stmt->execute()){
            echo 'done';
        }
    }
}

$act1 = new Activities();
$pdo = new DBconnect();
$conn = $pdo->connectpdo();
$act1->CreateNewActivitie('samir', 'jamil', 10, '2025-6-5');

?>