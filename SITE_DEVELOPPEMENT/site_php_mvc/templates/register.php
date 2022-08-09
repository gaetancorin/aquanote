<!-- PAGE REGISTER -->

<?php 
    $title = "Inscription"; 
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
            <p>Inscription</p>
        </div>

        <form id="register_login_form" action="index.php?action=createUser" method="POST">
            <div id="register_login_inputs">

                <div class="register_login_input">
                    <label for="email">Email</label>
                    <input maxlength="50" minlength="8" type="email" id="email" name='email' value="" required>
                </div>

                <div class="register_login_input">
                    <label for="password">Mot de Passe</label>
                    <input maxlength="50" minlength="8" type="password" id="password" name='password' value="" required>
                </div>

                <div class="register_login_input">
                    <label for="name_aquarium">Nom de l'Aquarium</label>
                    <input maxlength="25" minlength="1" type="text" id="name_aquarium" name='name_aquarium' value="" required>
                </div>
            </div>
            <div class="error_text">
                <?php if (isset($visible_error)){
                        echo $visible_error;} ?>
            </div>
            <button id="button_create_aqua" type="submit" value="Valider">Créer votre Aquarium</button>
        </form>

    </div>
</div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_homepages.php'); ?>