<?php
//Permet de controler les origines (adresses) autorisées à utiliser l'API
//si on remplace * par www.monsite.com l'API répondra que si la requete vient de ce site
header("Access-Control-Allow-Origin: *");
//Permet de définir le type de contenu de la réponse. les données seront envoyées sous format JSON
header("Content-Type: application/json; charset=UTF-8");
//Permet de définir la méthode autorisée
header("Access-Control-Allow-Methods: GET");
//Permet de définir la durée de vie de la requete
header("Access-Control-Max-Age: 3600");
//Permet de définir les headers autorisés côté clients
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//require_once "../../../bootstrap.php";
require_once "../../Model/OperationsDB.php";

// On vérifie que la méthode utilisée est correcte
if($_SERVER['REQUEST_METHOD'] == 'GET')
{

    // On instancie les operations
    $operations = new OperationsDB();

    // On récupère les données
    $resultats = $operations->getAll();
 
     // On vérifie si on a au moins 1 produit
     if(count($resultats) > 0){
        // On initialise un tableau associatif
        $data = [];
        $data['operation'] = [];

        // On parcourt les operations
        //while($row = $resultats->fetch(PDO::FETCH_ASSOC)){
        foreach ($resultats as $resultat)
        {
            //extract($row);
           
            if($resultat->getIdCompteDestinataire()){
                $operation = [
                    "id" => $resultat->getId(),
                    "id_compte_source" => $resultat->getIdCompteSource()->getNumeroCompte(),
                    "id_compte_destinataire" => $resultat->getIdCompteDestinataire()->getNumeroCompte(),
                    "type_operation" => $resultat->getTypeOperation(),
                    "montant" => $resultat->getMontant(),
                    "date_operation" => $resultat->getDateOperation(),
                ];

                $data['operation'][] = $operation;
            }
            else
            {
                $operation = [
                    "id" => $resultat->getId(),
                    "id_compte_source" => $resultat->getIdCompteSource()->getNumeroCompte(),
                    //"id_compte_destinataire" => $resultat->getIdCompteDestinataire()->getNumeroCompte(),
                    "type_operation" => $resultat->getTypeOperation(),
                    "montant" => $resultat->getMontant(),
                    "date_operation" => $resultat->getDateOperation(),
                ];

                $data['operation'][] = $operation;
            }
        }

        // On envoie le code réponse 200 OK
        http_response_code(200);

        // On encode en json et on envoie
        echo json_encode($data);
    }

}
else
{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode utilisée n'est pas autorisée"]);
}

