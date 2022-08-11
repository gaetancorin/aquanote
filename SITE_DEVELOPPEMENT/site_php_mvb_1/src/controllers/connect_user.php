<?php
// controllers/connect_user.php

require_once('src/lib/database.php');
require_once('src/models/user.php');

function connectUser(array $input){
	
    $email_user = null;
    $password_user = null;

	if (empty($input['email']) || empty($input['password'])) {
		throw new Exception('Une ou plusieurs données du formulaire de connection sont vides !');
	}
	$email_user = $input['email'];
    $password_user = $input['password'];

    // vérification que l'email existe dans la bdd
    $DatabaseConnection = new DatabaseConnection();
    $userRepository = new UserRepository();
	$userRepository->connection = $DatabaseConnection;

    $user = $userRepository->getUserByEmail($email_user);
    if ($user === null) {
		throw new Exception('Identifiants invalides !');
	}

    //vérification que le mot de passe correspond à l'email
    if (!password_verify( $password_user, $user->password_user)){
        throw new Exception('Identifiants invalides !');
    }

	header('Location: index.php');
}