<!-- PAGE INSERT_INPUTS -->

<?php 
    $title = "Insertion des données"; 
    $stylesheets[] = 'src/lib/css/insert_inputs.css';
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
<form method="get">

    <!-- Date et checkbox --> 
    <div class="date_and_checkbox">
        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date_afficheur">
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
        <div class="wrap_data">
            <span class="trait_noir"></span>
            <input type="text" id="data_temperature" >
            <label for="data_temperature" class="label_wrap_data">°C
            </label>
            
        </div>
        <div class="wrap_data">
            <span class="trait_noir"></span>
            <input type="text" id="data_ph" >
            <label for="data_ph" class="label_wrap_data">PH
            </label>
        </div>
        <div class="wrap_data">
            <span class="trait_noir"></span>
            <input type="text" id="temperature" >
            <label for="temperature" class="label_wrap_data">GH
            </label>
        </div>
        <div class="wrap_data">
            <span class="trait_noir"></span>
            <input type="text" id="temperature" >
            <label for="temperature" class="label_wrap_data">KH
            </label>
        </div>
        <div class="wrap_data">
            <span class="trait_noir"></span>
            <input type="text" id="temperature" >
            <label for="temperature" class="label_wrap_data">NO2
            </label>
        </div>
        <div class="wrap_data">
            <span class="trait_noir"></span>
            <input type="text" id="temperature" >
            <label for="temperature" class="label_wrap_data">NO3
            </label>
        </div>
        <div class="wrap_data">
            <span class="trait_noir"></span>
            <div class="pourcentage">
                <p>%</p>
            </div>           
            <input type="text" id="temperature" >
            <label for="temperature" class="label_wrap_data">chang.eau
            </label>
        </div>

        <div class="wrap_data_button">
            <input type="submit" value="Enregistrer">
        </div>

    </div>
    
    <!-- notation  data -->
    <div>
        <label for="notation" class="label_notation">Note :</label>
        <input type="text" id="notation">
    </div>
    
</form>


<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_app_asides.php'); ?>