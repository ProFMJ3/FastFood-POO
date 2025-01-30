<?php

try {
    $connexion = new PDO('mysql:host=localhost;dbname=fastfood;charset=utf8', 'root', 'Jules1012#');

//echo("Connexion réussie")
    if (isset($_GET["commandeId"])) {
        $commandeId = $_GET["commandeId"];

        $sql = $connexion->prepare("DELETE FROM commandes WHERE commandeId = ?");
        $sql->execute(array($commandeId));
        if ($sql){
            header('Location: listeCommandes.php');
            exit();
        }
        else{
            echo ("l'opération à échoué");
        }
    }


}catch (Exception $e){
    echo("Une erreur s'est produite". $e->getMessage());
}

