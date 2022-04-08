<?php
include('../models/utilisateur.php');
include('../models/bdd.php');

$utilisateur = new utilisateur();

$allutilisateur = $utilisateur->readAll();

while($donnees = $allutilisateur->fetch()){

    echo "<h4>   ".$donnees["id_utilisateur"].", ".$donnees["email_utilisateur"].", ".$donnees["mdp_utilisateur"]."</h4>";
    // echo gettype($donnees["id_utilisateur"]);
}


?>