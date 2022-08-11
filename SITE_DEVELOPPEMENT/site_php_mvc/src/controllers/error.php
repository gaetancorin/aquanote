<?php
// controllers/error.php

function error($errorMessage){
    $errorMessage = $errorMessage;
	require('templates/error.php');
}