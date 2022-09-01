<?php
// controllers/change_name_aqua.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');

function changeNameAqua(array $input){

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
    // change_name_aqua //  

    // récupération du nom de l'aquarium connecté
    // L'utilisateur ne peut changer que celui sur lequel il est connecté 
    $DatabaseConnection = new DatabaseConnection();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->set_connection($DatabaseConnection);

    $aquarium_connected = $aquariumRepository->getAquariumById($id_aquarium_connected);
    if ($aquarium_connected === null){
        throw new Exception('Une erreur sur votre session est survenue lors du changement du nom de votre aquarium');
    }

    // check des informations $_POST (input)
    if (!isset($input['new_name_aquarium']) || $input['new_name_aquarium'] === ''){
        throw new Exception('Vous devez indiquez un nom pour renommer l\'aquarium'.$aquarium_connected->get_name_aquarium());
    }
    $new_name_aquarium = $input['new_name_aquarium'];

    // check que le nouveau nom est différent de l'ancien
    if($new_name_aquarium === $aquarium_connected->get_name_aquarium()){
        throw new Exception('Pour changer le nom de "'.$aquarium_connected->get_name_aquarium().'", vous devez indiquez un autre nom');
    }

    // Changement du nom de l'aquarium
    try{
        $aquariumRepository->updateNameAquariumById($new_name_aquarium, $aquarium_connected->get_id_aquarium());
    } catch(Exception){
        throw new Exception('Une erreur est survenue lors du changement du nom de votre aquarium');
    }

    header('Location: index.php?action=valuesInsertion');
}