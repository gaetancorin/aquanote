<!-- PAGE INSERT_INPUTS -->

<?php 
    $title = "Insertion des données"; 
    $stylesheets[] = 'src/lib/css/insert_inputs.css';
    // variable pour layout header_app_asides
    $aquariums = $aquariums;
    $aquarium_connected =  $aquarium_connected;
    
?>

<?php ob_start(); ?>

<!----  INSERT_INPUTS  ---->

<!--  header top INSERT_INPUTS afficheur -->
<nav>
    <ul  class="header_top_afficheur">
        <li class="navigation">
            <a href="">
            <img src="src/lib/img/icone_insertion_donnees.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="index.php?action=valuesCharts">
            <img src="src/lib/img/icone_diagramme.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="index.php?action=valuesTable">
            <img src="src/lib/img/icone_tableau.svg">
            </a>
        </li>
    </ul>
</nav>    


<!-- FORMULAIRE INSERT_INPUTS-->
<form method="post" action="index.php?action=getInputs">

    <!-- Date et checkbox --> 
    <div class="date_and_checkbox">
        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date_analysis" 
            value="<?= $date_inputs ?>" required>
        </div>

        <div>
            <p class="explain_checkbox">explication</p>              
            <label class="label_click">
                <input type="checkbox" checked>
                <span class="fake_button"></span>
            </label>
        </div>
    </div>

    <!-- Contenu flex wrap data -->   
    <div>
        <?php foreach ($types_analysis as $type_analysis) { ?>
 
            <div class="wrap_data">
                <span class="trait_noir"></span>

                <input type="number" max="999" min="0.1" step="0.1"
                id="type_analysis_<?php echo htmlspecialchars($type_analysis->id_type_analysis);?>"
                name="type_analysis_<?php echo htmlspecialchars($type_analysis->id_type_analysis);?>" value="">

                <label class="label_wrap_data" 
                for="type_analysis_<?php echo htmlspecialchars($type_analysis->id_type_analysis);?>">
                
                    <?= htmlspecialchars($type_analysis->name_type_analysis);?>
                </label>           
            </div>
                     
        <?php } ?>  

        <div class="wrap_data_button">
            <input type="submit" value="Enregistrer">
        </div>

    </div>
    
    <!-- notation  data -->
    <div>
        <label for="notation" class="label_notation">Note :</label>
        <input type="text" id="notation" name='comment_analysis' value="">
    </div>

    <div class="error_text">
        <?php if (isset($errorMessage)){
            echo $errorMessage;} ?>
    </div>
    
</form>



<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_app_asides.php'); ?>