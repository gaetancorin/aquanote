<div class="background_pop_up background_create_type_analysis">
<section class="pop_up">
<div class="content_pop_up">

    <div class="block_header_back">
        <div class="header_back">
            <a class="button_back" id="button_arrow_create_type_analysis">
                <img class="arrow_button_back" src="src/lib/img/fleche_bouton_retour.svg" alt="bouton retour">
            </a>
            <p>Créer un type d'analyse</p>
        </div>
    </div>

    <div class="body_pop_up">

    <div class="texts_pop_up">
            <div id="texts_pop_up_div_create_type_analysis">
                <p>Types d'analyses déjà créés:</p>
                <div id="div_text_list">
                    <?php //Liste des aquariums
                        foreach ($types_analysis as $type_analysis) { ?>
                        <p class="text_list_pop_up text_list_create_type_analysis">
                            <?="• ".htmlspecialchars($type_analysis->get_name_type_analysis());?>
                        </p>                         
                    <?php } ?>
                </div>
            </div>
        </div>

        <form class="form_pop_up" action="index.php?action=createTypeAnalysis" method="POST">

        <div class="input_and_error_message">

            <div class="inputs_form_pop_up">
                <div class="input_pop_up">
                    <label for="name_new_type_analysis">Nom du nouveau type d'analyse</label>
                    <input maxlength="25" minlength="1" type="text" id="name_new_type_analysis" name='name_new_aquarium' value="" required>

                    <label for="tutorial_type_analysis">tutoriel du type d'analyse</label>
                    <textarea rows="3" id="tutorial_type_analysis" name='tutorial_type_analysis'></textarea>
                </div>
            </div>
            <div class="error_text">
            <?php if (isset($errorMessage)){
                    echo $errorMessage;} ?>
            </div>
        </div>
            <button class="button_submit_pop_up" type="submit" value="Valider">Créer un type d'analyse</button>

        </form>

    </div>

</div>
</section>
</div>