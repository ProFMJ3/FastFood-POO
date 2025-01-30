<?php
include_once'../GestionConnexion/Connexion.php';
class Commandes
{
    
    protected $quantite;
    protected $prixTotal;
    protected $nomMenu;
    protected $nomClient;


    public function __construct($quantite, $prixTotal,$nomMenu, $nomClient)
    {
        $this->quantite = $quantite;
        $this->prixTotal = $prixTotal;
        $this->nomMenu = $nomMenu;
        $this->nomClient = $nomClient;
        



    }

    public function ajouterCommande()
    {
        try {
            $pdo = Connexion::connexion_db();
            //echo 'Connexion';

            $sql = $pdo->prepare("INSERT INTO Commandes(quantite, prixTotal, menuId, clientId ) VALUES(:qte, :pt,:mnId,:clId)");
            $sql->execute(array(
                'qte' => $this->quantite,
                'pt' => $this->prixTotal,
                'mnId' =>$this->nomMenu,
                'clId' =>$this->nomClient,

            ));


        } catch (Exception $e) {
            echo "Erreur " . $e->getMessage();
        }


    }
}