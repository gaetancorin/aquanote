<div class="background_pop_up background_change_name_aqua">
<section class="pop_up">
<div class="content_pop_up">

    <div class="block_header_back">
        <div class="header_back">
            <a class="button_back button_back_change_name_aqua">
                <img class="arrow_button_back" src="src/lib/img/fleche_bouton_retour.svg" alt="bouton retour">
            </a>
            <p>Changer nom de l'Aquarium</p>
        </div>
    </div>

    <div class="body_pop_up">

        <div class="texts_pop_up">
            <div>
                <p>Ancien nom : <span class="name_aquarium_to_change">Aquarium 1</span></p>
            </div>
        </div>

        <form class="form_pop_up" action="index.php" method="POST">

        <div class="input_and_error_message">

            <div class="inputs_form_pop_up">
                <div class="input_pop_up">
                    <label for="name_aquarium">Nom de l'Aquarium</label>
                    <input maxlength="25" minlength="1" type="text" id="name_aquarium" name='name_aquarium' value="" required>
                </div>
            </div>
            <div class="error_text">
            <?php if (isset($errorMessage)){
                    echo $errorMessage;} ?>
            </div>
        </div>
            <button class="button_submit_pop_up" type="submit" value="Valider">Changer le nom de l'Aquarium</button>

        </form>

    </div>


</div>
</section>
</div>