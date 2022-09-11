<?php
// controllers/create_new_aqua.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');

function deleteTypeAnalysis(array $input){

    if (!isset($_SESSION)){
        session_start();
    };
    
    // test des informations de session
    if(!isset($_SESSION['id_user']) || $_SESSION['id_user'] === '' || !isset($_SESSION['id_aquarium_connected']) || $_SESSION['id_aquarium_connected'] === ''){
        throw new Exception('Votre session de connexion est introuvable');
    }
    $id_user = $_SESSION['id_user'];
    $id_aquarium_connected = $_SESSION['id_aquarium_connected'];


    //////////////////////////////////////////////////////////////:
    // DELETE_TYPE_ANALYSIS // 


    // récupération de la liste des types d'analyses de l'aquarium connecté 
    $database = new Database();
    $typeAnalysisRepository = new TypeAnalysisRepository();
    $typeAnalysisRepository->set_database($database);
    $types_analysis = $typeAnalysisRepository->getTypesAnalisysByIdAquarium($id_aquarium_connected);
    
    // récupérations des informations $_POST(input)
    if (!isset($input['name_delete_type_analysis']) || $input['name_delete_type_analysis'] === ''){
        throw new Exception('Vous devez indiquez le nom d\'un type d\'analyse à supprimer');
    } 
    $name_delete_type_analysis = $input['name_delete_type_analysis'];

    // Vérification que le nom du type d'analyse à supprimer existe dans les type d'analyse de l'aquarium connecté.
    $type_analysis_to_delete = null;
    foreach ($types_analysis as $type_analysis) {
        if($type_analysis->get_name_type_analysis() === $name_delete_type_analysis){
            $type_analysis_to_delete = $type_analysis;
        }
    }
    if($type_analysis_to_delete === null){
        throw new Exception('Impossible de supprimer "'.$name_delete_type_analysis.'" car aucun type d\analyse ne correspond à ce nom sur votre aquarium');
    }

    // Suppression du type d'analyse
    $typeAnalysisRepository->deleteTypeAnalysisById($type_analysis_to_delete->get_id_type_analysis());

    header('Location: index.php?action=valuesInsertion');


}