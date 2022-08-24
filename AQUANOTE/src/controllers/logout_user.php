<?php
// controllers/logout_user.php

require_once('src/lib/database.php');
require_once('src/models/aquarium.php');

function logoutUser(){

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
    // logout_user // 
    $sessionDestroy = session_destroy();
    if($sessionDestroy === 0){
        throw new Exception('Impossible de vous déconnecter');
    }

    header('Location: index.php');
}