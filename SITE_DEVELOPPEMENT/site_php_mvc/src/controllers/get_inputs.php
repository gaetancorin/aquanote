<?php
// controllers/get_inputs.php

require_once('src/lib/database.php');
require_once('src/models/type_analysis.php');
require_once('src/models/value_type_analysis.php');

function getInputs($errorMessage = null){

    if (!isset($_SESSION)){
        session_start();
    };
    // test des informations de session
    if(!isset($_SESSION['id_user']) || $_SESSION['id_user'] === '' || !isset($_SESSION['id_aquarium_connected']) || $_SESSION['id_aquarium_connected'] === ''){
        throw new Exception('Votre session de connexion est introuvable');
    }
    $id_user = $_SESSION['id_user'];
    $id_aquarium_connected = $_SESSION['id_aquarium_connected'];


    // récupération des inputs du formulaire get_inputs
    $inputs = $_POST;

    // connection à la bdd
    $DatabaseConnection = new DatabaseConnection();
    $typeAnalysisRepository = new TypeAnalysisRepository();
	$typeAnalysisRepository->connection = $DatabaseConnection;
    $valueTypeAnalysisRepository = new ValueTypeAnalysisRepository();
    $valueTypeAnalysisRepository->connection = $DatabaseConnection;

    // Vérification et Récupération date
    foreach($inputs as $key => $value){
        // Change les valeurs int en string
        $value = strval($value);
              
        if($key === 'date_analysis'){
            if ($value == ''){
                throw new Exception('Vous devez insérez une date pour ajouter des données');
            }
            $date = $value;
            try{
                list($year, $month, $day) = explode("-", $date);
                if (checkdate($month, $day, $year) === false){
                    throw new Exception();
                }
                
            } catch(Exception){
                throw new Exception('La date que vous avez inséré est invalide');
            }
        } 
    }


    // modification des inputs avec des types d'analyses
    if($date){

    foreach($inputs as $key => $value){
        echo '<br>key = ', $key, ' value = ', $value, ' ';

        // récupère valeurs d'analyses avec une key commencant par 'type_analysis_' (ex: 'type_analysis_28')
        if( (strpos($key, 'type_analysis_')) !== false ){
            //retire 'type_analysis_' pour récupérer l'id du type d'analyse
            $id_type_analysis = substr($key, 14);
            // vérifie que l'id récupéré existe
            $type_analysis = $typeAnalysisRepository->getTypeAnalisysById($id_type_analysis);
            if ($type_analysis === null){
                throw new Exception('Erreur d\'enregistrement, Un des types d\'analyses est introuvable en base de donnée');
            }
            
            // vérifie que le type d'analyse appartient à l'aquarium connecté
            if($type_analysis->id_aquarium !== $id_aquarium_connected){
                throw new Exception('Le champ "'.$type_analysis->name_type_analysis.'" n\'appartient pas à votre aquarium');
            }
            
            // Si vide, supprime la valeur du type d'analyses à la date
            if($value === ''){
                $valueTypeAnalysisRepository->deleteValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($date, $id_type_analysis);
                echo 'c\'est supprimer.';
            }
            // Si plein, update ou crée valeur du type d'analyses à la date
            if($value !== ''){

                $exist = $valueTypeAnalysisRepository->getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($date, $id_type_analysis);

                if($exist !== null){ $valueTypeAnalysisRepository->updateValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($value, $date, $id_type_analysis);
                echo 'c\'est update';
                }
                else{
                    $valueTypeAnalysisRepository->createValueTypeAnalysis($value, $date, $id_type_analysis);
                    echo 'c\'est créer';
                }
            }
                            
        }           
    }
    }

    if($date){

    foreach($inputs as $key => $value){

    if($key === 'comment_analysis'){
        if ($value == ''){
            echo "commentaire plein";
        }
        else{
            echo "commentaire vide";
        } 
    }
    }
    }





}