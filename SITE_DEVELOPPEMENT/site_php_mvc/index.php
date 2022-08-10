<?php
// Routeur

require_once('src/controllers/register.php');
require_once('src/controllers/login.php');
require_once('src/controllers/create_user.php');
require_once('src/controllers/connect_user.php');

try {
	if (isset($_GET['action']) && $_GET['action'] !== '') {

    	if ($_GET['action'] === 'register') {
			register();
    	}
		if ($_GET['action'] === 'createUser') {
			createUser($_POST);
    	}
		if ($_GET['action'] === 'login') {
			login();
    	}
		if ($_GET['action'] === 'connectUser') {
			connectUser($_POST);
    	}
       
        else {
        	throw new Exception("La page que vous recherchez n'existe pas.");
    	}
	} 
    else { // Si aucune variable 'action'
        require('templates/homepage.php');
	}
} 
catch (Exception $e) { // Catch toutes les exceptions...
	$errorMessage = $e->getMessage();

	require('templates/error.php');
}