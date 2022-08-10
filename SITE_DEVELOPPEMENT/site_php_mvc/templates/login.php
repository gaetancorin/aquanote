<!-- PAGE LOGIN -->

<?php 
    $title = "Connection"; 
    $stylesheets[] = 'src/lib/css/login_register.css';
?>


<?php ob_start(); ?>


<section>

<div id="content_left_poissonBallon">
    <img id="poissonBallon" src="src/lib/img/poissonballon.png" alt="Aqua Data logo" >
</div>

<div id="content_right_register_login">
    <div id="section_register_login">

        <div id="header_form">
            <a id="button_back" href="index.php">
                <img id="arrow_button_back" src="src/lib/img/fleche_bouton_retour.svg" alt="bouton retour">
            </a>
            <p>Connexion</p>
        </div>

        <form id="register_login_form" action="index.php?action=connectUser" method="POST">
            <div id="register_login_inputs">

                <div class="register_login_input">
                    <label for="email">Email</label>
                    <input maxlength="50" minlength="8" type="email" id="email" name='email' required>
                </div>

                <div class="register_login_input">
                    <label for="password">Mot de Passe</label>
                    <input maxlength="50" minlength="8" type="password" id="password" name='password' required>
                </div>

            </div>
            <button id="access_aqua" type="submit" value="Valider">Accéder à votre Aquarium</button>
        </form>

    </div>
</div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_homepages.php'); ?>