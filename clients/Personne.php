<?php

class Personne

{
    protected  $nom;
    protected $prenom;
    protected $telephone;
    protected $adresse;


    public function __construct($nom, $prenom, $telephone, $adresse)

    {
        $this->nom = $nom;
        $this->prenom= $prenom;

        $this->telephone=$telephone;
        $this->adresse=$adresse;
    }






}