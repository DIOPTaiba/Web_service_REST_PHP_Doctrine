<?php

class CompteDB
{
    private $connexion;

    public function __construct(){
        require_once "../../../bootstrap.php";
        $this->connexion = $entityManager;
    }
    //Permet de recupérer le solde d'un compte
    public function getSolde($numCompte)
    {
        $operations = $this->connexion->getRepository('Comptes')->findBy(['numero_compte'=>$numCompte]);
        return $operations;
    }
   

}