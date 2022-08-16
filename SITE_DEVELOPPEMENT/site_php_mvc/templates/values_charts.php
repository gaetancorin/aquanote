<!-- PAGE VALUES_CHARTS -->

<?php 
    $title = "Graphiques des données"; 
    $stylesheets[] = 'src/lib/css/values_charts.css';
    $stylesheets[] = 'src/lib/css/pop_up.css';
?>

<?php ob_start(); ?>

<!----  VALUES_CHARTS  ---->

<!--  header top VALUES_CHARTS afficheur  -->
<nav>
    <ul  class="header_top_afficheur">
        <li class="navigation">
            <a href="index.php?action=insertInputs">
            <img src="src/lib/img/icone_insertion_donnees.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="">
            <img src="src/lib/img/icone_diagramme.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="index.php?action=valuesTable">
            <img src="src/lib/img/icone_tableau.svg">
            </a>
        </li>
    </ul>
</nav>

<!-- popup -->
<?php require('templates/pop_up/create_aquarium.php'); ?>
<?php require('templates/pop_up/change_name_aquarium.php'); ?>
<?php require('templates/pop_up/delete_aquarium.php'); ?>
<?php require('templates/pop_up/logout_user.php'); ?>
<script src="src/lib/pop_up.js"></script>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_app_asides.php'); ?>