<?php
include_once('Personne.php');
include_once('../GestionConnexion/Connexion.php');

class Clients extends Personne
{
    public function ajouterClient(){
        try {
            $pdo = Connexion::connexion_db();
            echo 'Connexion';
//



            $sql = $pdo->prepare("INSERT INTO clients(nomClient, prenomsClient, telephone, adresse) VALUES(:nom, :prenom,:tel,:adresse)");
            $sql->execute(array(
                'nom'=>$this->nom,
                'prenom'=>$this->prenom,
                'tel'=>$this->telephone,
                'adresse'=>$this->adresse,

            ));



        }catch (Exception $e){
            echo "Erreur ".$e->getMessage();
        }

    }

}