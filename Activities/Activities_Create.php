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
        return $pdo;
    }
    function ShowActivities(){
        $selectAll = "SELECT * FROM {$this->tablename}";
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();
        $result = $pdo->prepare($selectAll);
        if($result->execute()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo '<tr class="border-t">
                            <td class="p-3">'. $row['activity_id'] .'</td>
                            <td class="p-3">'. $row['nom'] .'</td>
                            <td class="p-3">'. $row['description'] .'</td>
                            <td class="p-3">'. $row['price'] .'</td>
                            <td class="p-3">'. $row['date_activite'] .'</td>
                </tr>';
            }
        }   
    }
}


?>