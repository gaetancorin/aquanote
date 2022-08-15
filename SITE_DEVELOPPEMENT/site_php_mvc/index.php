<?php
// Routeur

//homepage
require_once('src/controllers/homepages/error.php');
require_once('src/controllers/homepages/homepage.php');
require_once('src/controllers/homepages/register.php');
require_once('src/controllers/homepages/login.php');
require_once('src/controllers/homepages/create_user.php');
require_once('src/controllers/homepages/connect_user.php');
//app
require_once('src/controllers/insert_inputs.php');
require_once('src/controllers/values_charts.php');
require_once('src/controllers/values_table.php');
require_once('src/controllers/get_inputs.php');
//pop_up
require_once('src/controllers/change_aqua_connected.php');
require_once('src/controllers/create_new_aqua.php');
require_once('src/controllers/change_name_aqua.php');
require_once('src/controllers/delete_aqua.php');

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
		elseif ($_GET['action'] === 'getInputs') {
			getInputs();
    	}

		elseif ($_GET['action'] === 'valuesCharts') {
			valuesCharts();
    	}
		elseif ($_GET['action'] === 'valuesTable') {
			valuesTable();
    	}

		elseif ($_GET['action'] === 'changeAquaConnected') {
			changeAquaConnected();
    	}
		elseif ($_GET['action'] === 'createNewAqua') {
			createNewAqua($_POST);
    	}
		elseif ($_GET['action'] === 'changeNameAqua') {
			changeNameAqua($_POST);
    	}
		elseif ($_GET['action'] === 'deleteAqua') {
			deleteAqua($_POST);
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

	if (strpos($UrlAfterControllers, 'insert_inputs') !== false){
		error($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'get_inputs') !== false){
		insertInputs($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'values_table') !== false){
		error($errorMessage);
	}

	if (strpos($UrlAfterControllers, 'change_aqua_connected') !== false){
		insertInputs($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'create_new_aqua') !== false){
		insertInputs($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'change_name_aqua') !== false){
		insertInputs($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'delete_aqua') !== false){
		insertInputs($errorMessage);
	}

	


	//Si aucun ne correspond, on renvois sur la page error
	// error($errorMessage);
}