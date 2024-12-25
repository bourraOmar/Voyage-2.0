<?php 
$dsn = 'mysql:host=192.168.8.142;dbname=voyage2';
$user = 'root';
$pass = "";

try {

    $conn = new PDO($dsn, $user, $pass);


} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>