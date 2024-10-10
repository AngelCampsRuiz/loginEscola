<?php
    $host = '127.0.0.1';
    $bdname = 'bd_escola';
    $user = 'root';
    $pwd = '';
    try{
        $conexion = new PDO("mysql:host=$host; dbname=$bdname" , $user, $pwd);
    }catch(PDOException $e){
        echo "El error es:".$e->getMessage();
    }