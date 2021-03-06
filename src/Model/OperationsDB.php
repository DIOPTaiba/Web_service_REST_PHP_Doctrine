<?php

class OperationsDB
{
    private $connexion;

    public function __construct(){
        require_once "../../../bootstrap.php";
        $this->connexion = $entityManager;
    }
    //Permet de recupérer toutes les opérations
    public function getAll()
    {
        $operations = $this->connexion->getRepository('Operations')->findAll();
        return $operations;
    }
    //Permet de recupérer le compte selon son numéro compte
    public function getIdCompte($numCompte)
    {
        $operations = $this->connexion->getRepository('Comptes')->findBy(['numero_compte'=>$numCompte]);
        return $operations;
    }
    //Permet de recupérer toutes les opérations sur un compte donné via son id
    public function getAllByCompte($idCompte)
    {
        $operations = $this->connexion->getRepository('Operations')->findBy(['id_compte_source'=>$idCompte]);
        return $operations;
    }

   

}