<?php

class Personne

{
    protected  $nom;
    protected $prenom;
    
    protected $adresse;


    public function __construct($nom, $prenom, $adresse)

    {
        $this->nom = $nom;
        $this->prenom= $prenom;
        $this->adresse=$adresse;
    }






}