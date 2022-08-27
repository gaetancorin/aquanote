<!-- PAGE VALUES_INSERTION -->

<?php 
    $title = "Insertion des données"; 
    $stylesheets[] = 'src/lib/css/values_insertion.css';
    $stylesheets[] = 'src/lib/css/pop_up.css';
    // variable pour layout header_app_asides
    $aquariums = $aquariums;
    $aquarium_connected =  $aquarium_connected;
    
?>

<?php ob_start(); ?>

<!----  VALUES_INSERTION  ---->

<!--  header top VALUES_INSERTION afficheur -->
<nav>
    <ul  class="header_top_afficheur">
        <li class="navigation">
            <a href="">
            <img src="src/lib/img/icone_insertion_donnees.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="index.php?action=dataCharts">
            <img src="src/lib/img/icone_diagramme.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="index.php?action=dataTable">
            <img src="src/lib/img/icone_tableau.svg">
            </a>
        </li>
    </ul>
</nav>    


<!-- FORMULAIRE VALUES_INSERTION -->
<form method="post" action="index.php?action=getInputs" id="form_insert_input">

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

                <?php echo htmlspecialchars('id=type_analysis_'.$type_analysis->id_type_analysis);?>

                <?php echo htmlspecialchars('name=type_analysis_'.$type_analysis->id_type_analysis);?>
                
                <?php if($type_analysis->value_type_analysis === null){ 
                    echo 'value=""';
                 } elseif($type_analysis->value_type_analysis !== null){ 
                    
                     echo htmlspecialchars('value='.$type_analysis->value_type_analysis->value_type_analysis);
                    //Va chercher l'objet ValueTypeAnalysis assigné un attribut
                    //d'objet TypeAnalysis
                    }  ?>

                readChangement>
                <label class="label_wrap_data" 
                <?php echo htmlspecialchars('for=type_analysis_'.$type_analysis->id_type_analysis);?>>
                
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
        <input type="text" id="notation" name='comment_analysis' 
        <?php if($comment_analysis === null){ 
                    echo 'value=""';
                 } elseif($comment_analysis !== null){ ?>
                    value="<?= htmlspecialchars($comment_analysis->comment_analysis);?>"
                <?php } ?>
        
        readChangement>
    </div>

    <div class="error_text" id="error_text_insert_inputs">
        <?php if (isset($errorMessage)){
            echo $errorMessage;} ?>
    </div>
    
</form>

<!-- popup -->
<?php require('templates/pop_up/create_aquarium.php'); ?>
<?php require('templates/pop_up/change_name_aquarium.php'); ?>
<?php require('templates/pop_up/delete_aquarium.php'); ?>
<?php require('templates/pop_up/logout_user.php'); ?>
<script src="src/lib/pop_up.js"></script>

<script src="src/lib/values_insertion_refresh.js"></script>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_app_asides.php'); ?>