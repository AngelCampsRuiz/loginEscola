<?php
    $host = 'localhost';
    $bdname = 'bd_escola';
    $user = 'root';
    $pwd = '';
    try{// Conexion con PDO a la base de datos 
        $conexion = new PDO("mysql:host=$host; dbname=$bdname" , $user, $pwd);
    }catch(PDOException $e){
        echo "El error es:".$e->getMessage();
    }