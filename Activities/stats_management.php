<?php 
require_once '../connection/conn.php';
class stats_Manager {
    protected $table = 'user'; 
    protected $pdo;

    function CountUser(){
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();
        $sql = "SELECT COUNT(*) AS users_count FROM {$this->table}";
        
        $stmt = $pdo->query($sql);
        if($stmt){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo $row['users_count'];
            }
        }
        
    }
    function CountActiveReservation(){
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();

        $sql = "SELECT COUNT(*) AS reserv_count FROM reservation WHERE status = 'waiting' OR status = 'accepte'";
        
        $stmt = $pdo->query($sql);
        if($stmt){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo $row['reserv_count'];
            }
        }
    }

    function CountRefusedReservation(){
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();

        $sql = "SELECT COUNT(*) AS reserv_count FROM reservation WHERE status = 'refuse'";
        
        $stmt = $pdo->query($sql);
        if($stmt){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo $row['reserv_count'];
            }
        }
    }

    function CountBannedUser(){
        $this->pdo = new DBconnect();
        $pdo = $this->pdo->connectpdo();
        $sql = "SELECT COUNT(*) AS users_banned FROM {$this->table} WHERE status = 'blocked'";
        
        $stmt = $pdo->query($sql);
        if($stmt){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo $row['users_banned'];
            }
        }
        
    }

}

?>