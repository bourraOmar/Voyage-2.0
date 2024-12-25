<?php 
$dsn = 'mysql:host=192.168.8.142;dbname=voyage2';
$user = 'root';
$pass = "";

try {

    $conn = new PDO($dsn, $user, $pass);


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo 'Connection successful';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>