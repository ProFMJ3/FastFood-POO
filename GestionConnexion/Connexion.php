<?php

class Connexion{
    public static function connexion_db(){

        
        $pdo = new PDO("mysql:host=localhost; dbname=fastfood;charset=utf8","root","Jules1012#");
        echo 'Connexion';
        return $pdo;
    }


}


?>


