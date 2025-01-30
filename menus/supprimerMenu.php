<?php

try {
    $connexion = new PDO('mysql:host=localhost; dbname=fastfood; charset =utf-8;', 'root', 'Jules1012#');

//echo("Connexion réussie");
    if (isset($_GET["menuId"])) {
        $menuId = $_GET["menuId"];

        $sql = $connexion->prepare("DELETE FROM menus WHERE menuId = ?");
        $sql->execute(array($menuId));
        if ($sql){
            header('Location: listeMenu.php');
            exit();
        }
        else{
            echo ("l'opération à échoué");
        }
    }


}catch (Exception $e){
    echo("Une erreur s'est produite". $e->getMessage());
}

