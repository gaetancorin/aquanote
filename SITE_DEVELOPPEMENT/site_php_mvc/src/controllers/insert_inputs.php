<?php
// controllers/insert_inputs.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');

function insertInputs($errorMessage = null){

    session_start();
    // test des informations de session
    if(!isset($_SESSION['id_user']) || $_SESSION['id_user'] === '' || !isset($_SESSION['id_aquarium_connected']) || $_SESSION['id_aquarium_connected'] === ''){
        throw new Exception('Votre session de connexion est introuvable');
    }
    $id_user = $_SESSION['id_user'];
    $id_aquarium_connected = $_SESSION['id_aquarium_connected'];

    // récupération de la liste des aquariums pour le template header header_app_asides
    $DatabaseConnection = new DatabaseConnection();
    $aquariumRepository = new AquariumRepository();
    $aquariumRepository->connection = $DatabaseConnection;
    try{
        $aquariums = $aquariumRepository->getAquariumsByIdUser($id_user);
    } catch (Exception) {
        throw new Exception('Impossible de télécharger vos aquariums');
    }
    // récupération de l'aquarium connecté par l'id pour le template header header_app_asides
    $aquarium_connected = $aquariumRepository->getAquariumById($id_aquarium_connected);


    require('templates/insert_inputs.php');
}