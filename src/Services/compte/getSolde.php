<?php
//Permet de controler les origines (adresses) autorisées à utiliser l'API
//si on remplace * par www.monsite.com l'API répondra que si la requete vient de ce site
header("Access-Control-Allow-Origin: *");
//Permet de définir le type de contenu de la réponse. les données seront envoyées sous format JSON
header("Content-Type: application/json; charset=UTF-8");
//Permet de définir la méthode autorisée
header("Access-Control-Allow-Methods: POST");
//Permet de définir la durée de vie de la requete
header("Access-Control-Max-Age: 3600");
//Permet de définir les headers autorisés côté clients
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//require_once "../../../bootstrap.php";
require_once "../../Model/CompteDB.php";

// On vérifie que la méthode utilisée est correcte
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    if ( !empty($_POST["numCompte"]) )
    {
        // On instancie le model CompteDB
        $comptes = new CompteDB();

        // On récupère les données
        $resultats = $comptes->getSolde($_POST["numCompte"]);
    
        // On vérifie si le compte existe ($resultats n'est pas vide)
        if(count($resultats) > 0){
            // On initialise un tableau associatif
            $data = [];
            $data['message'] = "Voici le solde du compte";
            $data['compte'] = [];
            
            // On parcourt les comptes
            foreach ($resultats as $resultat)
            {
                $compte = [
                    "numéro compte" => $resultat->getNumeroCompte(),
                    "Solde" => $resultat->getSolde(),
                ];

                $data['compte'][] = $compte;
              
            }

            // On envoie le code réponse 200 OK
            http_response_code(200);

            // On encode en json et on envoie
            echo json_encode($data);
        }
        else
        {
            //si le compte n'existe pas
            $data['erreur'] = "Désolé! ce compte n'existe pas";
            // On encode en json et on envoie
            echo json_encode($data);
        }
    }
    //Si aucune donnée reçu
    else
    {
        $data['Message'] = "Aucun numéro compte reçu";
        $data['Infos'] = "utilise numCompte comme key et le numéro du compte comme value";
        // On encode en json et on envoie
        echo json_encode($data);
    }

}
//Si la méthode utilisée n'est pas POST
else
{
    // On gère l'erreur
    http_response_code(405);
    echo json_encode(["message" => "La méthode utilisée n'est pas autorisée"]);
}

