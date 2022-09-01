<?php
// controllers/delete_aqua.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');

function deleteAqua(array $input){

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
    // delete_aqua // 

    // récupération de la liste des aquariums de l'user 
    $database = new Database();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->set_database($database);
    try{
        $aquariums = $aquariumRepository->getAquariumsByIdUser($id_user);
        if ($aquariums === []){throw new Exception();}
    } catch (Exception) {
        throw new Exception('Une erreur est survenue lors du processus de suppression de votre aquarium');
    }

    // check des informations $_POST (input)
    if (!isset($input['name_delete_aquarium']) || $input['name_delete_aquarium'] === ''){
        throw new Exception('Vous devez indiquez un nom d\'aquarium à supprimer');
    }

    $name_delete_aquarium = $input['name_delete_aquarium'];

    // Vérification que le nom de l'aquarium à supprimer existe dans les aquariums de l'user.
    $aquarium_to_delete = null;
    foreach ($aquariums as $aquarium) {
        if($aquarium->get_name_aquarium() === $name_delete_aquarium){
            $aquarium_to_delete = $aquarium;
        }
    }
    if($aquarium_to_delete === null){
        throw new Exception('Impossible de supprimer "'.$name_delete_aquarium.'" car aucun aquarium ne correspond à ce nom');
    }

    // Si l'user est connecté sur l'aquarium à supprimer, changement de l'aquarium connecté par le premier trouvé
    if($id_aquarium_connected === $aquarium_to_delete->get_id_aquarium()){

        foreach ($aquariums as $aquarium) {
            if($aquarium->get_id_aquarium() !== $aquarium_to_delete->get_id_aquarium()){
                $_SESSION['id_aquarium_connected'] = $aquarium->get_id_aquarium();
                break;
            }
        }
    }

    // Suppression de l'aquarium
    $aquariumRepository->deleteAquariumsById($aquarium_to_delete->get_id_aquarium());

    header('Location: index.php?action=valuesInsertion');
}