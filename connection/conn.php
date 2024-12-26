<?php 
class DBconnect {

    protected $dsn = 'mysql:host=192.168.8.187;dbname=voyage2';
    protected $user = 'root';
    protected $pass = "";
    private $pdo;

    function connectpdo(){
        try{
            $pdo = new PDO($this->dsn, $this->user, $this->pass);
        }
        catch(PDOException $e){
            echo 'err :' . $e->getMessage();
        }
    }
}
$pdo = new DBconnect();
$pdo->connectpdo();
?>