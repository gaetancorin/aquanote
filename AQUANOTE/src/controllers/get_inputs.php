<?php
// controllers/get_inputs.php

require_once('src/lib/database.php');
require_once('src/models/type_analysis.php');
require_once('src/models/value_type_analysis.php');
require_once('src/models/comment_analysis.php');

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


    // récupération des inputs du formulaire insert_inputs
    $inputs = $_POST;

    // connection à la bdd des modèles
    $DatabaseConnection = new DatabaseConnection();
    $typeAnalysisRepository = new TypeAnalysisRepository();
	$typeAnalysisRepository->connection = $DatabaseConnection;
    $valueTypeAnalysisRepository = new ValueTypeAnalysisRepository();
    $valueTypeAnalysisRepository->connection = $DatabaseConnection;
    $commentAnalysisRepository = new CommentAnalysisRepository();
    $commentAnalysisRepository->connection = $DatabaseConnection;

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


    // modification de la valeur des types d'analyses
    if($date){

    foreach($inputs as $key => $value){
        // echo '<br>key = ', $key, ' value = ', $value, ' ';

        // récupère valeurs d'analyses avec une key commencant par 'type_analysis_' (ex: 'type_analysis_28')
        if( (strpos($key, 'type_analysis_')) !== false ){
            //retire 'type_analysis_' pour récupérer l'id du type d'analyse
            $id_type_analysis = substr($key, 14);
            // vérifie que l'id récupéré du type_analyse existe
            $type_analysis = $typeAnalysisRepository->getTypeAnalisysById($id_type_analysis);
            if ($type_analysis === null){
                throw new Exception('Erreur d\'enregistrement, Un des types d\'analyses est introuvable en base de donnée');
            }
            
            // vérifie que le type d'analyse appartient à l'aquarium connecté
            if($type_analysis->id_aquarium !== $id_aquarium_connected){
                throw new Exception('Le champ "'.$type_analysis->name_type_analysis.'" n\'appartient pas à votre aquarium');
            }
            
            // Si type_analysis est vide, supprime la valeur du type d'analyses à la date
            if($value === ''){
                $valueTypeAnalysisRepository->deleteValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($date, $id_type_analysis);
                echo 'valeur analyse supprimer.';
            }
            // Si type_analysis est plein, update ou crée la valeur du type d'analyses en fonction de son existance à la date 
            if($value !== ''){

                $exist = $valueTypeAnalysisRepository->getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($date, $id_type_analysis);

                if($exist !== null){ $valueTypeAnalysisRepository->updateValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($value, $date, $id_type_analysis);
                echo 'valeur analyse update';
                }
                else{
                    $valueTypeAnalysisRepository->createValueTypeAnalysis($value, $date, $id_type_analysis);
                    echo 'valeur analyse créer';
                }
            }
                            
        }           
    }
    }

    // modification des commentaires d'analyses
    if($date){

    foreach($inputs as $key => $value){

    if($key === 'comment_analysis'){
        // Si comment_analysis est vide, je supprime la valeur du commentaire à la date
        if ($value == ''){
            $commentAnalysisRepository->deleteCommentAnalysisByDateAnalysisAndIdAquarium($date, $id_aquarium_connected);

            echo "commentaire supprimer";
        }
        // Si commentaire_analysis est plein, update ou crée la valeur du commentaire en fonction de son existance à la date
        elseif($value !== ''){

            $exist = $commentAnalysisRepository->getCommentAnalysisByDateAnalysisAndIdAquarium($date, $id_aquarium_connected); 

            if($exist !== null){ 
                
                $commentAnalysisRepository->updateCommentAnalysisByDateAnalysisAndIdAquarium($value, $date, $id_aquarium_connected);

                echo 'commentaire modifier';
            }
            else{
                $commentAnalysisRepository->createCommentAnalysis($value, $date, $id_aquarium_connected);

                echo 'commentaire créer';
            }
        } 
    }
    }
    }

    // Renvois sur le formulaire à la date d'insertion
    header('Location: index.php?action=insertInputs&date='.$date);


}