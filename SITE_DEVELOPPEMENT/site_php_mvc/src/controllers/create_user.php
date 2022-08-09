<?php
// controllers/createUser.php

require_once('src/lib/database.php');
require_once('src/models/user.php');

function createUser(array $input){

    $email_user = null;
    $password_user = null;
    if (!empty($input['email']) && !empty($input['password'])) {
    	$email_user = $input['email'];
    	$password_user = $input['password'];

	} else {
    	throw new Exception('Les données du formulaire sont invalides.');
	}

    $userRepository = new UserRepository();
	$userRepository->connection = new DatabaseConnection();

    $success = $userRepository->createUser($email_user, $password_user);
    if (!$success) {
    	throw new Exception('Impossible d\'ajouter l\'utilisateur !');
	} else {
    	header('Location: index.php');
	}

	require('templates/homepage.php');
}