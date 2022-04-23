<?php 

$host = "localhost";

$dbname = "evaluation_php";

$username = "root";

$password = "root";

try{

    $pdo = new PDO('mysql:host='. $host .';dbname=' . $dbname, $username, $password);

}catch(PDOException $e){

    die($e->getMessage());
    
}




?>