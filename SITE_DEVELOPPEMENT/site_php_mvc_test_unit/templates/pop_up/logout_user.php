<div class="background_pop_up background_logout_user">
<section class="pop_up">
<div class="content_pop_up">

    <div class="block_header_back">
        <div class="header_back">
            <a class="button_back" id="button_arrow_logout_user">
                <img class="arrow_button_back" src="src/lib/img/fleche_bouton_retour.svg" alt="bouton retour">
            </a>
            <p>Déconnexion</p>
        </div>
    </div>

    <div class="body_pop_up">

        <div class="texts_pop_up">
            <div>
                <p>Voulez vous vraiment vous déconnecter?</p>
            </div>
        </div>

        <div class="input_and_error_message">


            <div class="error_text">
            <?php if (isset($errorMessage)){
                    echo $errorMessage;} ?>
            </div>
        </div>
            <button class="button_submit_pop_up" id="button_back_logout_user" >Retour</button>
            <button class="button_submit_pop_up" id="button_logout_user">Se déconnecter</button>

    </div>


</div>
</section>
</div>