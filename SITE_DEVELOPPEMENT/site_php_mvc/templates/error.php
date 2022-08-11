<!-- PAGE ERROR -->

<?php 
    $title = "Erreur"; 
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
            <p>Page d'erreur</p>
        </div>
        <div id="header_form">
            <div class="error_text" id="error_page_error">
                <?php if (isset($errorMessage)){
                        echo $errorMessage;} ?>
            </div>
        </div>


        

    </div>
</div>

</section>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_homepages.php'); ?>