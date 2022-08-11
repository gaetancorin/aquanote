<?php
// controllers/error.php

function error( string $errorMessage){
    $errorMessage = $errorMessage;
	require('templates/homepages/error.php');
}