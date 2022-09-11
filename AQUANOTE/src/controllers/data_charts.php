<?php
// controllers/data_charts.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');

function dataCharts($errorMessage = null){

    if (!isset($_SESSION)){
        session_start();
    };
    // test des informations de session
    if(!isset($_SESSION['id_user']) || $_SESSION['id_user'] === '' || !isset($_SESSION['id_aquarium_connected']) || $_SESSION['id_aquarium_connected'] === ''){
        throw new Exception('Votre session de connexion est introuvable');
    }
    $id_user = $_SESSION['id_user'];
    $id_aquarium_connected = $_SESSION['id_aquarium_connected'];

    // pour template header_app_asides // récupération de la liste des aquariums 
    $database = new Database();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->set_database($database);
    try{
        $aquariums = $aquariumRepository->getAquariumsByIdUser($id_user);
        if ($aquariums === []){throw new Exception();}
    } catch (Exception) {
        throw new Exception('Impossible de télécharger vos aquariums');
    }
    // pour template header_app_asides // récupération de l'aquarium connecté par l'id 
    $aquarium_connected = $aquariumRepository->getAquariumById($id_aquarium_connected);

    // pour pop_up create_type_analysis et pop_up delete_type_analysis // récupération des types d'analyses de l'aquarium connecté
    $typeAnalysisRepository = new TypeAnalysisRepository();
    $typeAnalysisRepository->set_database($database);
    $types_analysis = $typeAnalysisRepository->getTypesAnalisysByIdAquarium($id_aquarium_connected); 

    //////////////////////////////////////////////////////////////:

    require('templates/data_charts.php');
}