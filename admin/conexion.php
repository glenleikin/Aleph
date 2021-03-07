<?php

$host = 'localhost'; 
$user = 'root';
$pass = '';
$database = 'aleph';

try {
    $conexion = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
     echo "me conecto";
}catch(PDOException $e){
    print 'Error no conecto'.$e->getMessage();
}