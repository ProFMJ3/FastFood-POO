<?php

try {
    $connexion = new PDO('mysql:host=localhost; dbname=fastfood; charset =utf-8;', 'root', 'Jules1012#');

//echo("Connexion réussie");
    if (isset($_GET["clientId"])) {
        $clientId = $_GET["clientId"];

        $sql = $connexion->prepare("DELETE FROM clients WHERE clientId = ?");
        $sql->execute(array($clientId));
        if ($sql){
            header('Location: listeClients.php');
            exit();

        }
        else{
            echo ("l'opération à échoué");
        }
    }


}catch (Exception $e){
    echo("Une erreur s'est produite". $e->getMessage());
}

