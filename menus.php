<?php
include_once('./GestionConnexion/Connexion.php');

class Menus
{
    protected $nomMenu;
    protected $composition;
    protected $categorie;
    private $prix;
    private $disponibilite;


    public function getNomMenu(){
        return $this -> nomMenu;

    }
    public  function setNomMenu($newNomMenu){
        $this->nomMenu=$newNomMenu;

    }
    public function ajouterMenu(){
        try {
            $pdo = Connexion::connexion_db();

        }catch (Exception $e){
            echo "";
        }


    }



}

?>

