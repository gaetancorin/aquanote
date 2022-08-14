<div id="background_pop_up">
<section id="pop_up">
<div id="content_pop_up">

    <div id="block_header_back">
        <div id="header_back">
            <a id="button_back" href="index.php">
                <img id="arrow_button_back" src="src/lib/img/fleche_bouton_retour.svg" alt="bouton retour">
            </a>
            <p>Supprimer un Aquarium</p>
        </div>
    </div>

    <div id="body_pop_up">

        <div id="texts_pop_up">
            <div>
                <p>Nom des aquariums:</p>
                <p class="name_aquarium_pop_up">• Aquarium 1</p>
                <p class="name_aquarium_pop_up">• Aquarium 2</p>
            </div>
        </div>

        <form id="form_pop_up" action="index.php" method="POST">

        <div id="input_and_error_message">

            <div id="inputs_form_pop_up">
                <div class="input_pop_up">
                    <label for="name_aquarium">Nom de l'Aquarium</label>
                    <input maxlength="25" minlength="1" type="text" id="name_aquarium" name='name_aquarium' value="" required>
                </div>
                <div class="input_pop_up">
                    <label for="name_aquarium">Nom de l'Aquarium</label>
                    <input maxlength="25" minlength="1" type="text" id="name_aquarium" name='name_aquarium' value="" required>
                </div>
            </div>
            <div class="error_text">
            <?php if (isset($errorMessage)){
                    echo $errorMessage;} ?>
                    c'est la catastrophe
            </div>
        </div>
            <button id="button_submit_pop_up" type="submit" value="Valider">Créer votre Aquarium</button>

        </form>



    </div>





</div>
</section>
</div>