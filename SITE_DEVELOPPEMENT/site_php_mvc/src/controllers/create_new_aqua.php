<?php
// controllers/create_new_aqua.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');
require_once('src/models/type_analysis.php');

function createNewAqua(array $input){

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
    // create_new_aqua // 

    // récupération de la liste des aquariums de l'user 
    $DatabaseConnection = new DatabaseConnection();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->connection = $DatabaseConnection;
    try{
        $aquariums = $aquariumRepository->getAquariumsByIdUser($id_user);
        if ($aquariums === []){throw new Exception();}
    } catch (Exception) {
        throw new Exception('Une erreur est survenue lors du processus de création de votre aquarium');
    }


    // check des informations $_POST(input)
    if (!isset($input['name_new_aquarium']) || $input['name_new_aquarium'] === ''){
        throw new Exception('Vous devez indiquez le nom de votre nouvel aquarium');
    }

    $name_new_aquarium = $input['name_new_aquarium'];

    // vérification que aucun aquarium ne l'user ne possède le même nom que le nouveau
    foreach ($aquariums as $aquarium) {
        if($aquarium->name_aquarium === $name_new_aquarium){
            throw new Exception('Vous avez déjà un aquarium au nom de '.$aquarium->name_aquarium.', merci de choisir un autre nom');
        }
    }

    // puis création de son aquarium
    try{
        $aquariumRepository->createAquarium($name_new_aquarium, $id_user);
    } catch(Exception){
        throw new Exception('Une erreur est survenue lors du processus de création de votre aquarium');
    }
    // récupération nouvel aquarium pour avoir son id
    $Newaquarium = $aquariumRepository->getAquariumByNameAndIdUser($name_new_aquarium, $id_user);

    // ajout des types d'analyses par défaults relié à l'aquarium
    $typeAnalysisRepository = new TypeAnalysisRepository();
    $typeAnalysisRepository->connection = $DatabaseConnection;
    try{
        $typeAnalysisRepository->createDefaultTypesAnalysis($Newaquarium->id_aquarium);
    } catch (Exception) {
        throw new Exception('Votre aquarium à été créé mais une erreur est survenue sur la création de ses types d\'analyses par défault. Vous pouvez tout de  même accéder à votre nouvel aquarium.');
    }

    // sur la session, changement de l'aquarium connecté par le nouvel aquarium
    $_SESSION['id_aquarium_connected'] = $Newaquarium->id_aquarium;


    header('Location: index.php?action=insertInputs');
}