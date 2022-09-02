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

    $database = new Database();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->set_database($database);

    // vérification des informations $_POST (input)
    if (!isset($input['new_name_aquarium']) || $input['new_name_aquarium'] === ''){
        throw new Exception('Vous devez indiquez un nom pour renommer l\'aquarium');
    }
    $new_name_aquarium = $input['new_name_aquarium'];

    // récupération du nom de l'aquarium connecté
    // L'utilisateur ne peut changer de nom que sur l'aquarium sur lequel il est connecté 
    $aquarium_connected = $aquariumRepository->getAquariumById($id_aquarium_connected);
    if ($aquarium_connected === null){
        throw new Exception('Une erreur sur votre session est survenue lors du changement du nom de votre aquarium');
    }

    // vérification que le nouveau nom est bien différent de l'ancien
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