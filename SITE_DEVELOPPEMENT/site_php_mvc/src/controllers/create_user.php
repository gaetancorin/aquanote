<?php
// controllers/create_user.php

require_once('src/lib/database.php');
require_once('src/models/user.php');
require_once('src/models/aquarium.php');

function createUser(array $input){
	
    $email_user = null;
    $password_user = null;
	$name_aquarium = null;

	if (empty($input['email']) || empty($input['password']) || empty($input['name_aquarium'])) {
		throw new Exception('Une ou plusieurs données du formulaire d\'inscription sont vides !');
	}
	$email_user = $input['email'];
    $password_user = $input['password'];
	$name_aquarium = $input['name_aquarium'];

	if (filter_var($email_user, FILTER_VALIDATE_EMAIL) === FALSE) {
		throw new Exception('l\'email est invalide');
	}
	elseif ( strlen($password_user) < 8 ) {
		throw new Exception('le password est trop court');
	}
	elseif ( strlen($name_aquarium) < 0 ) {
		throw new Exception('le nom de l\'aquarium est trop court');
	}

	//Hash du mot de passe avec bcrypt
	$password_user_hash = password_hash( $password_user, PASSWORD_DEFAULT);

    // vérifier que l'email n'est pas déjà utilisé
	$DatabaseConnection = new DatabaseConnection();
    $userRepository = new UserRepository();
	$userRepository->connection = $DatabaseConnection;
	try{
		$emailExist = $userRepository->getUserByEmail($email_user);
	} catch (Exception $e) {
		throw new Exception('Impossible de chercher l\'utilisateur par l\'email!');
	}
	if ($emailExist !== null) {
		throw new Exception('Cet Email est déjà utilisé !');
	}

    // créer l'utilisateur
	try{
		$userRepository->createUser($email_user, $password_user_hash);
	} catch (Exception) {
		throw new Exception('Impossible d\'ajouter l\'utilisateur !');
	}

    // créer l'aquarium associé avec l'id de l'user
	try{
		$user = $userRepository->getUserByEmail($email_user);
		$id_user = $user->id_user;
	} catch (Exception) {
		throw new Exception('Impossible de récupérer l\'id de l\'utilisateur par l\'email!');
	}

	$aquariumRepository = new AquariumRepository();
	$aquariumRepository->connection = $DatabaseConnection;
	try{
		$aquariumRepository->createAquarium($name_aquarium, $id_user);
	} catch (Exception) {
		//L'user doit avoir un aquarium pour créer un compte.
		//On supprime donc l'user pour qu'il puisse se réinscrire correctement.
		try{
			$userRepository->deleteUserById($id_user);
		} catch (Exception) {
			throw new Exception('Impossible de supprimer l\'utilisateur après ne pas avoir réussi à créer son aquarium.');
		}
		
		throw new Exception('Impossible d\'ajouter l\'utilisateur car son aquarium n\'a pas pu être créer!');
	}
	

	require('templates/homepage.php');
}