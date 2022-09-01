<?php
// controllers/data_table.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');
require_once('src/models/value_type_analysis.php');
require_once('src/models/date_value_selector.php');

function dataTable($errorMessage = null){

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



    //////////////////////////////////////////////////////////////:
        // pour template data_table // 

    $dateValuesSelectorRepository = new DateValuesSelectorRepository();
    $dateValuesSelectorRepository->set_database($database);
    
    // récupère toutes les dates et les met dans l'attribut $dates_where_are_values du répository.
    $dateValuesSelectorRepository->getAllDatesWhereAreValuesTypesAnalysisByIdAquarium($id_aquarium_connected);

    //  Puis recupère cette attribut,et pour chaque date,va créerun objet 'dateValuesSelector'. 
    // Cette objet va récupérer la date dans son attribut ainsi que tous les objects type_analysis lié à l'aquarium dans son autre attribut.
    //Dans les types analysis qu'elle a récupérer, il y aura l'objet value_type_analysis si il existe a la date de datevaluesselector. SInon, il y aura un null. 
    // Une fois l'objet créer, il est ajouter à une liste.
    // A la fin de la fonction, on retourne la liste.
    $datesValuesSelector = $dateValuesSelectorRepository->DoListOfDatesContainsArrayTypesAnalysisObjectsWithValue($id_aquarium_connected);

    // Si le user n'as encore rentré aucune donnée(et donc aucune date), on récupère les types d'analyse pour les itérer séparement
    if($dateValuesSelectorRepository->get_dates_where_are_values() === [])
    {
        $typeAnalysisRepository = new TypeAnalysisRepository();
        $typeAnalysisRepository->set_database($database);
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
//             foreach($dateValuesSelector->get_all_types_analysis_with_value_if_exist() as $type_analysis_with_value_if_exist){

//                 echo $type_analysis_with_value_if_exist->get_name_type_analysis()." // ";
//             }
//             echo '<br>';
//         }

//         // on récupère dans la liste de 'type_analysis' l'objet "value_type_analysis" si il existe. On affiche sa valeur. 
//         echo $dateValuesSelector->get_date_where_are_values()." // ";
//         foreach($dateValuesSelector->get_all_types_analysis_with_value_if_exist() as $type_analysis_with_value_if_exist){
        
//             if($type_analysis_with_value_if_exist->get_value_type_analysis() !== null){
//                 echo $type_analysis_with_value_if_exist->get_value_type_analysis()->get_value_type_analysis()." // ";
//             } else{ 
//                 echo " // ";
//             }
//         } 
//         $modulo += 1; // on incrémente le modulo et on remet a 0 arrivé a 10.
//         $modulo = ($modulo % 10); 
//         echo '<br>';

//     }


    require('templates/data_table.php');
}