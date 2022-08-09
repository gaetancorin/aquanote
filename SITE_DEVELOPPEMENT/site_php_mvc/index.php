<?php

try {
	if (isset($_GET['action']) && $_GET['action'] !== '') {

    	if ($_GET['action'] === 'register') {
            require('templates/register.php');
    	}
		if ($_GET['action'] === 'login') {
            require('templates/login.php');
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