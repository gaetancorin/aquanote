<div class="background_pop_up background_delete_aqua">
<section class="pop_up">
<div class="content_pop_up">

    <div class="block_header_back">
        <div class="header_back">
            <a class="button_back" id="button_arrow_delete_aqua">
                <img class="arrow_button_back" src="src/lib/img/fleche_bouton_retour.svg" alt="bouton retour">
            </a>
            <p>Supprimer un Aquarium</p>
        </div>
    </div>

    <div class="body_pop_up">

        <div class="texts_pop_up">
            <div id="texts_pop_up_div_delete_aqua">
                <p>Nom des aquariums:</p>
                <div id="div_text_list">
                    <?php //Liste des aquariums
                        foreach ($aquariums as $aquarium) { ?>
                        <p class="text_list_pop_up">
                            <?="• ".htmlspecialchars($aquarium->get_name_aquarium());?>
                        </p>                         
                    <?php } ?>
                </div>

            </div>
        </div>

        <form class="form_pop_up" action="index.php?action=deleteAqua" method="POST">

        <div class="input_and_error_message">

            <div class="inputs_form_pop_up">
                <div class="input_pop_up">
                    <label for="name_delete_aquarium">Aquarium à supprimer</label>
                    <input maxlength="25" minlength="1" type="text" id="name_delete_aquarium" name='name_delete_aquarium' value="" required>
                </div>
            </div>
            <p class="error_text">Toutes les données de l'aquarium seront perdues</p>
            <div class="error_text">
            <?php if (isset($errorMessage)){
                    echo $errorMessage;} ?>
            </div>
        </div>
            <button class="button_submit_pop_up" type="submit" value="Valider">Supprimer l'Aquarium</button>

        </form>

    </div>


</div>
</section>
</div>