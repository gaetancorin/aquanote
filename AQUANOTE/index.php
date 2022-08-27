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
require_once('src/controllers/values_insertion.php');
require_once('src/controllers/data_charts.php');
require_once('src/controllers/data_table.php');
require_once('src/controllers/save_values_insertion.php');
//pop_up
require_once('src/controllers/change_aqua_connected.php');
require_once('src/controllers/create_new_aqua.php');
require_once('src/controllers/change_name_aqua.php');
require_once('src/controllers/delete_aqua.php');
require_once('src/controllers/logout_user.php');

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
		elseif ($_GET['action'] === 'valuesInsertion') {
			valuesInsertion();
    	}
		elseif ($_GET['action'] === 'saveValuesInsertion') {
			saveValuesInsertion();
    	}

		elseif ($_GET['action'] === 'dataCharts') {
			dataCharts();
    	}
		elseif ($_GET['action'] === 'dataTable') {
			dataTable();
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
		elseif ($_GET['action'] === 'logoutUser') {
			logoutUser();
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

	if (strpos($UrlAfterControllers, 'values_insertion') !== false){
		error($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'save_values_insertion') !== false){
		valuesInsertion($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'data_table') !== false){
		error($errorMessage);
	}

	if (strpos($UrlAfterControllers, 'change_aqua_connected') !== false){
		valuesInsertion($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'create_new_aqua') !== false){
		valuesInsertion($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'change_name_aqua') !== false){
		valuesInsertion($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'delete_aqua') !== false){
		valuesInsertion($errorMessage);
	}
	if (strpos($UrlAfterControllers, 'logout_user') !== false){
		valuesInsertion($errorMessage);
	}

	


	//Si aucun ne correspond, on renvois sur la page error
	// error($errorMessage);
}