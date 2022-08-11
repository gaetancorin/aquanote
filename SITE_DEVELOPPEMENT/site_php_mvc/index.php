<?php
// Routeur

require_once('src/controllers/homepages/error.php');
require_once('src/controllers/homepages/homepage.php');
require_once('src/controllers/homepages/register.php');
require_once('src/controllers/homepages/login.php');
require_once('src/controllers/homepages/create_user.php');
require_once('src/controllers/homepages/connect_user.php');

require_once('src/controllers/insert_inputs.php');
require_once('src/controllers/values_charts.php');
require_once('src/controllers/values_table.php');

try {
	if (isset($_GET['action']) && $_GET['action'] !== '') {
		// homepages
    	if ($_GET['action'] === 'register') {
			register();
    	}
		elseif ($_GET['action'] === 'createUser') {
			createUser($_POST);
    	}
		elseif ($_GET['action'] === 'login') {
			login();
    	}
		elseif ($_GET['action'] === 'connectUser') {
			connectUser($_POST);
    	}
		// app
		elseif ($_GET['action'] === 'insertInputs') {
			insertInputs();
    	}
		elseif ($_GET['action'] === 'valuesCharts') {
			valuesCharts();
    	}
		elseif ($_GET['action'] === 'valuesTable') {
			valuesTable();
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
	if (strpos($UrlAfterControllers, 'homepages\create_user') !== false){
		register($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'homepages\connect_user') !== false){
		login($errorMessage);
	}
	


	//Si aucun ne correspond, on renvois sur la page error
	// error($errorMessage);
}