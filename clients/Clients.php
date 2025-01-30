<?php
include_once('Personne.php');
include_once('../GestionConnexion/Connexion.php');

class Clients extends Personne
    
{
    protected $telephone;
    public function __construct($nom, $prenom, $adresse, $telephone){
        parent::__construct($nom, $prenom, $adresse);
        $this->telephone = $telephone;
    }
    public function ajouterClient(){
        try {
            $pdo = Connexion::connexion_db();
            echo 'Connexion';
//
            $sql = $pdo->prepare("INSERT INTO clients(nomClient, prenomsClient, adresse, telephone) VALUES(:nom, :prenom,:adresse,:tel)");
            $sql->execute(array(
                'nom'=>$this->nom,
                'prenom'=>$this->prenom,
                'adresse'=>$this->adresse,
                'tel'=>$this->telephone,

            ));


        }catch (Exception $e){
            echo "Erreur ".$e->getMessage();
        }

    }

}