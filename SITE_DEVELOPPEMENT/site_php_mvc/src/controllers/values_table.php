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
        // pour template valeu_table // 

    $DatabaseConnection = new DatabaseConnection();
    $dateValuesSelectorRepository = new DateValuesSelectorRepository();
    $dateValuesSelectorRepository->connection = $DatabaseConnection;
        // récupère toutes les dates et les met dans l'attribut du répository.
    $dateValuesSelectorRepository->getAllDatesWhereAreValuesTypesAnalysisByIdAquarium($id_aquarium_connected);

    //  Puis ce sert de ses dates pour, dans chacune d'elle, créer un objet 'dateValuesSelector'. Cette objet va récupérer la date ainsi que tous les objects type_analysis lié à l'aquarium. Si il y a une valeur à cette date, l'objet 'ty^pe_analysis' l' aura en attribut.(objet 'dateValuesSelector' qui contient une liste d'objet 'type_analysis' qui contient un objet 'value_type_analysis' si cette valeur existe) 
    $datesValuesSelector = $dateValuesSelectorRepository->DoListOfDatesContainsArrayTypesAnalysisObjectsWithValue($id_aquarium_connected);

    // Si le user n'as encore rentré aucune donnée(et donc aucune date), on récupère les types d'analyse pour les itérer séparement
    if($dateValuesSelectorRepository->dates_where_are_values === [])
    {
        $typeAnalysisRepository = new TypeAnalysisRepository();
        $typeAnalysisRepository->connection = $DatabaseConnection;
        $arrayTypesAnalysisObject = $typeAnalysisRepository->getTypesAnalisysByIdAquarium($id_aquarium_connected);
    }




// // Exemple pour comprendre le front
//     $modulo = 0;
//     //  chaque objet 'dateValuesSelector'contient la date et une liste d'objet "type_analysis" contenant un objet "value_type_analysis" uniquement si la valeur existe
//     foreach($datesValuesSelector as $dateValuesSelector){

//         if($modulo ===0){
//             //tous les 10, on affiche l'intitulé date qui n'est pas un type d'analyse
//             echo 'Date  //';
//             // tous les 10, on affiche dans la liste tous les nom de 'type_analysis'
//             foreach($dateValuesSelector->all_types_analysis_with_value_if_exist as $type_analysis_with_value_if_exist){

//                 echo $type_analysis_with_value_if_exist->name_type_analysis." // ";
//             }
//             echo '<br>';
//         }

//         // on récupère dans la liste de 'type_analysis' l'objet "value_type_analysis" si il existe. On affiche sa valeur. 
//         echo $dateValuesSelector->date_where_are_values." // ";
//         foreach($dateValuesSelector->all_types_analysis_with_value_if_exist as $type_analysis_with_value_if_exist){
        
//             if($type_analysis_with_value_if_exist->value_type_analysis !== null){
//                 echo $type_analysis_with_value_if_exist->value_type_analysis->value_type_analysis." // ";
//             } else{ 
//                 echo " // ";
//             }
//         } 
//         $modulo += 1; // on incrémente le modulo et on remet a 0 arrivé a 10.
//         $modulo = ($modulo % 10); 
//         echo '<br>';

//     }


    require('templates/values_table.php');
}