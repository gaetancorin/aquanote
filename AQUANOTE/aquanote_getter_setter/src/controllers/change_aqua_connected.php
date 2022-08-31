<?php
// controllers/change_aqua_connected.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');

function changeAquaConnected(){

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
    // change_aqua_connected // 

    if(!isset($_GET['aqua_to_connect']) || $_GET['aqua_to_connect'] === ''){
        throw new Exception('Impossible de se connecter à cet aquarium');
    }
    $id_aquarium_to_connect = $_GET['aqua_to_connect'];
    
    // vérification de l'existance et du propriétaire de l'aquarium à connecté
    $DatabaseConnection = new DatabaseConnection();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->connection = $DatabaseConnection;
    try{
        $aquarium = $aquariumRepository->getAquariumById($id_aquarium_to_connect);
    } catch(Exception){
        throw new Exception('Une erreur est survenue sur la base de donnée');
    }
    if ($aquarium === null){
        throw new Exception('L\'aquarium sur lequel vous essayez de vous connecter n\'existe pas');
    }
    if ($aquarium->id_user !== $id_user){
        throw new Exception('L\'aquarium sur lequel vous essayez de vous connecter n\'est pas à vous');
    }
    // changement de l'aquarium connecté par la session
    $_SESSION['id_aquarium_connected'] = $id_aquarium_to_connect;

    header('Location: index.php?action=valuesInsertion');
}