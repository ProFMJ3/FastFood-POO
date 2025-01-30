<?php


include_once('../GestionConnexion/Connexion.php');


class menus

{
    protected $nomMenu;
    protected $composition;
    protected $categorie;
    private $prix;
    private $disponible;


    // Getters
    public function getNomMenu() {
        return $this->nomMenu;
    }

    public function getComposition() {
        return $this->composition;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getDisponible() {
        return $this->disponible;
    }

    // Setters
    public function setNomMenu($newNomMenu) {
        $this->nomMenu = $newNomMenu;
    }

    public function setComposition($newComposition) {
        $this->composition = $newComposition;
    }

    public function setCategorie($newCategorie) {
        $this->categorie = $newCategorie;
    }

    public function setPrix($newPrix) {
        if (is_numeric($newPrix)) {
            $this->prix = $newPrix;
        } else {
            throw new Exception("Le prix doit être un nombre.");
        }
    }

    public function setDisponible($newDisponible) {
        $this->disponible = $newDisponible ? 1 : 0; // Convertir en booléen (0 ou 1)
    }

    //constructeur par défaut est le constructeur qui ne prend pas de paramètres et qui initialise les attributs avec leurs valeurs par défaut

    //créer le constructeur pour initialiser les attributs pour instancier les objets plus tard
    public function __construct($nomMenu, $composition, $categorie,$prix, $disponible)
    {

        $this->nomMenu = $nomMenu;
        $this->composition = $composition;
        $this->categorie = $categorie;
        $this->prix = $prix;
        $this->disponible = $disponible;

    }

    public function ajouterMenu(){
        try {
            $pdo = Connexion::connexion_db();
            echo 'Connexion';
//            $sql = $pdo->prepare('INSERT INT');



            $sql = $pdo->prepare("INSERT INTO menus(nomMenu, composition, categorie, prix, disponible) VALUES(:nom, :compo,:cat,:prix, :dispo)");
            $sql->execute(array(
                'nom'=>$this->nomMenu,
                'compo'=>$this->composition,
                'cat'=>$this->categorie,
                'prix'=>$this->prix,
                'dispo'=>$this->disponible,
            ));

        }catch (Exception $e){
            echo "Erreur ".$e->getMessage();
        }

    }
}