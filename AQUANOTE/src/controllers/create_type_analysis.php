<?php
// controllers/create_new_aqua.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');

function createTypeAnalysis(array $input){

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
    // CREATE_TYPE_ANALYSIS // 

    // récupération de la liste des types d'analyses de l'aquarium connecté 
    $database = new Database();
    $typeAnalysisRepository = new TypeAnalysisRepository();
    $typeAnalysisRepository->set_database($database);
    $types_analysis = $typeAnalysisRepository->getTypesAnalisysByIdAquarium($id_aquarium_connected);
    
    // récupérations des informations $_POST(input)
    if (!isset($input['name_new_type_analysis']) || $input['name_new_type_analysis'] === ''){
        throw new Exception('Vous devez indiquez le nom de votre nouveau type d\'analyse');
    } 
    $name_new_type_analysis = $input['name_new_type_analysis'];

    $tutorial_type_analysis = $input['tutorial_type_analysis'];

    // vérification que aucun type d'analyse de l'aquarium connecté ne possède le même nom que le nouveau
    foreach ($types_analysis as $type_analysis) {
        if($type_analysis->get_name_type_analysis() === $name_new_type_analysis){
            throw new Exception('Vous avez déjà un type d\'analyse au nom de "'.$type_analysis->get_name_type_analysis().'", merci de choisir un autre nom');
        }
    }

    // puis création du type d'analyse
    try{
        $typeAnalysisRepository->createTypeAnalysis($name_new_type_analysis, $tutorial_type_analysis, $id_aquarium_connected);
    } catch(Exception){
        throw new Exception('Une erreur est survenue lors du processus de création de votre aquarium');
    }

    header('Location: index.php?action=valuesInsertion');
}