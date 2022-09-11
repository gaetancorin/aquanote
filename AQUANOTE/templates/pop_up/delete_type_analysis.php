<div class="background_pop_up background_delete_type_analysis">
<section class="pop_up">
<div class="content_pop_up">

    <div class="block_header_back">
        <div class="header_back">
            <a class="button_back" id="button_arrow_delete_type_analysis">
                <img class="arrow_button_back" src="src/lib/img/fleche_bouton_retour.svg" alt="bouton retour">
            </a>
            <p>Supprimer un Type d'analyse</p>
        </div>
    </div>

    <div class="body_pop_up">

        <div class="texts_pop_up">
            <div id="texts_pop_up_div_delete_type_analysis">
                <p>Nom des types d'analyses:</p>
                <div id="div_text_list">
                    <?php //Liste des types d'analyses
                        foreach ($types_analysis as $type_analysis) { ?>
                        <p class="text_list_pop_up text_list_create_type_analysis">
                            <?="• ".htmlspecialchars($type_analysis->get_name_type_analysis());?>
                        </p>                         
                    <?php } ?>
                </div>

            </div>
        </div>

        <form class="form_pop_up" action="index.php?action=deleteTypeAnalysis" method="POST">

        <div class="input_and_error_message">

            <div class="inputs_form_pop_up">
                <div class="input_pop_up">
                    <label for="name_delete_type_analysis">Type d'analyse à supprimer</label>
                    <input maxlength="15" minlength="1" type="text" id="name_delete_type_analysis" name='name_delete_type_analysis' value="" required>
                </div>
            </div>
            <p class="error_text">Toutes les données du type d'analyse seront perdues</p>
            <div class="error_text">
            <?php if (isset($errorMessage)){
                    echo $errorMessage;} ?>
            </div>
        </div>
            <button class="button_submit_pop_up" type="submit" value="Valider">Supprimer le Type d'analyse</button>

        </form>

    </div>


</div>
</section>
</div>