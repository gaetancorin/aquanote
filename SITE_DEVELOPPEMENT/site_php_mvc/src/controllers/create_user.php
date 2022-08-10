<?php
// controllers/createUser.php

require_once('src/lib/database.php');
require_once('src/models/user.php');
require_once('src/models/aquarium.php');

function createUser(array $input){
	
    $email_user = null;
    $password_user = null;
    if (!empty($input['email']) && !empty($input['password']) && !empty($input['name_aquarium'])) {
    	$email_user = $input['email'];
    	$password_user = $input['password'];
		$name_aquarium = $input['name_aquarium'];

	} else {
    	throw new Exception('Les données du formulaire sont invalides.');
	}

    $DatabaseConnection = new DatabaseConnection();

    $userRepository = new UserRepository();
	$userRepository->connection = $DatabaseConnection;

    //vérifier que l'email n'est pas déjà utilisé
    $user = $userRepository->readUserByEmail($email_user);
    if (!empty($user)) {
    	throw new Exception('Cet Email est déjà utilisé !');
	} 
    // créer l'utilisateur
    $success = $userRepository->createUser($email_user, $password_user);
    if (!$success) {
    	throw new Exception('Impossible d\'ajouter l\'utilisateur !');
	} 

    // créer l'aquarium associé avec l'id de l'user
	$user = $userRepository->readUserByEmail($email_user);
	$id_user = $user->id_user;

	$aquariumRepository = new AquariumRepository();
	$aquariumRepository->connection = $DatabaseConnection;
	try{
		$aquariumRepository->createAquarium($name_aquarium, $id_user);
	}
	catch (Exception $e) {
		//Nécessite d'utiliser un try catch ici pour capturer les exceptions de clé étrangère
		//Suppression de l'user si l'aquarium associé ne peut pas être créé
		$userRepository->deleteUserById($id_user);
		throw new Exception('Impossible d\'ajouter l\'utilisateur à cause de l\'aquarium !');
	}
	

	require('templates/homepage.php');
}