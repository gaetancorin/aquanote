<?php
// controllers/values_insertion.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');
require_once('src/models/value_type_analysis.php');
require_once('src/models/comment_analysis.php');

function valuesInsertion($errorMessage = null){

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
    $DatabaseConnection = new DatabaseConnection();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->connection = $DatabaseConnection;
    try{
        $aquariums = $aquariumRepository->getAquariumsByIdUser($id_user);
        if ($aquariums === []){throw new Exception();}
    } catch (Exception) {
        throw new Exception('Impossible de télécharger vos aquariums');
    }
    // pour template header_app_asides // récupération de l'aquarium connecté par l'id 
    $aquarium_connected = $aquariumRepository->getAquariumById($id_aquarium_connected);



    //////////////////////////////////////////////////////////////:
    // pour template values_insertion // 

    // récupération de la date dans l'url et sa vérification
    //si aucune fournis récupérer la date du jour
    if (isset($_GET['date'])){
        $date_inputs = $_GET['date'];
        try{
            list($year, $month, $day) = explode("-", $date_inputs);
            if (checkdate($month, $day, $year) === false){
                throw new Exception();
            }           
        } catch(Exception){
            throw new Exception('La date que vous avez inséré est invalide');
        }
    }
    else{ // date du jour
        $date_inputs = date('Y-m-d');
    }

    //récupération du commentaire de l'aquarium connecté à la date choisi
    $commentAnalysisRepository = new CommentAnalysisRepository();
    $commentAnalysisRepository->connection = $DatabaseConnection;
    $comment_analysis = $commentAnalysisRepository->getCommentAnalysisByDateAnalysisAndIdAquarium($date_inputs, $id_aquarium_connected);


    //récupération de tous les types d'analyses de l'aquarium connecté
    //avec dans l'attribut de ses objets TypeAnalyses un objet ValueTypeAnalysis correspondant à la date choisi
    $typeAnalysisRepository = new TypeAnalysisRepository();
    $typeAnalysisRepository->connection = $DatabaseConnection;
    $types_analysis = $typeAnalysisRepository->getTypesAnalisysWithObjectValueIfExistByIdAquariumAndDate($id_aquarium_connected, $date_inputs);


    require('templates/values_insertion.php');
}