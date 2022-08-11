<?php
// Routeur

require_once('src/controllers/error.php');
require_once('src/controllers/homepage.php');
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
		homepage();
	}
} 
catch (Exception $exception) { // Catch toutes les exceptions...
	$errorMessage = $exception->getMessage();

	if ($errorMessage === "La page que vous recherchez n'existe pas."){
		error($errorMessage);
	}
	
	//récupère l'url ou est déclenché l'exception
	//Puis récupère le nom du controller
	$getUrlError = $exception->getFile();
	$cutUrlBeforeControllers = strstr($getUrlError, 'controllers');
	$UrlAfterControllers = substr($cutUrlBeforeControllers, 12);

	//Renvois le massage d'erreur sur le controller approprié en fonction du nom du controller qui à créer l'exception
	if (strpos($UrlAfterControllers, 'create_user') !== false){
		register($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'connect_user') !== false){
		login($errorMessage);
	}
	


	//Si aucun ne correspond, on renvois sur la page error
	error($errorMessage);
}