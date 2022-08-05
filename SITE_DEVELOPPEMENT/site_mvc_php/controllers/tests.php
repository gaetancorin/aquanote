<?php
include('../models/user.php');
include('../config/ConfigDB.php');

$user = new user();

$allusers = $user->readAll();

while($donnees = $allusers->fetch()){
    echo "<h4>   ".$donnees["email_user"].", ".$donnees["password_user"]."</h4>";
}


?>