<?php

class OperationsDB
{
    private $connexion;

    public function __construct(){
        require_once "../../../bootstrap.php";
        $this->connexion = $entityManager;
    }
    public function getAll()
    {
        $operations = $this->connexion->getRepository('Operations')->findAll();
        return $operations;
    }
    public function getByIdCompte($idCompte)
    {
        $operations = $this->connexion->getRepository('Operations')->findBy(['id_compte_source'=>$idCompte]);
        return $operations;
    }

   

}