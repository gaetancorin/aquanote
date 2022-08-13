<?php
// controllers/values_table.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');
require_once('src/models/value_type_analysis.php');
require_once('src/models/data_select_all.php');

function valuesTable($errorMessage = null){

    session_start();
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

    $DatabaseConnection = new DatabaseConnection();
    $dateValuesSelectorRepository = new DateValuesSelectorRepository();
    $dateValuesSelectorRepository->connection = $DatabaseConnection;
    // $dateValuesSelectorRepository->getAllTypesAnalysisByIdAquarium($id_aquarium_connected);
    $dateValuesSelectorRepository->getAllDatesWhereAreValuesTypesAnalysisByIdAquarium($id_aquarium_connected);

    $datesValuesSelector = $dateValuesSelectorRepository->DoListOfDatesContainsArrayTypesAnalysisObjectsWithValue($id_aquarium_connected);


    // foreach($datesValuesSelector as $dateValuesSelector){

    //     echo $dateValuesSelector->date_where_are_values." // ";

    //     foreach($dateValuesSelector->all_types_analysis_with_value_if_exist as $type_analysis_with_value_if_exist){
        
    //         if($type_analysis_with_value_if_exist->value_type_analysis !== null){
    //             echo "  ". $type_analysis_with_value_if_exist->value_type_analysis->value_type_analysis;
    //         }
    //         echo $type_analysis_with_value_if_exist->name_type_analysis." // ";
    //     }  
    //     echo '<br>';
    // }








    require('templates/values_table.php');
}