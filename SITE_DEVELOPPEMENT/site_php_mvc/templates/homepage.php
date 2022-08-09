<!-- PAGE HOMEPAGE -->

<?php 
    $title = "Page d'accueil"; 
    $stylesheets[] = 'src/lib/css/homepage.css';
?>

<?php ob_start(); ?>

<section>

    <div id="content_left_poissonBallon">
        <img id="poissonBallon" src="src/lib/img/poissonballon.png" alt="Aqua Data logo" >
    </div>

    <div id="content_right_register_login">
        <div id="center_button">
            <a class="button_login_register" id="login" href="index.php?action=login">Se connecter</a>
            <a class="button_login_register" id="register" href="index.php?action=register">S'inscrire</a>
        </div>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_homepages.php'); ?>

