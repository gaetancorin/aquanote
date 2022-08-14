<!-- PAGE VALUES_TABLE -->

<?php 
    $title = "Tableau des données"; 
    $stylesheets[] = 'src/lib/css/values_table.css';
    $stylesheets[] = 'src/lib/css/pop_up/create_new_aquarium.css';
?>

<?php ob_start(); ?>

<!----  VALUES_TABLE  ---->

<!--  header top VALUES_TABLE afficheur  -->
<nav>
    <ul  class="header_top_afficheur">
        <li class="navigation">
            <a href="index.php?action=insertInputs">
            <img src="src/lib/img/icone_insertion_donnees.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="index.php?action=valuesCharts">
            <img src="src/lib/img/icone_diagramme.svg">
            </a>
        </li>
        <li class="navigation">
            <a href="">
            <img src="src/lib/img/icone_tableau.svg">
            </a>
        </li>
    </ul>
</nav>

<div id="tableau">
<table>
    <!-- mais ou est tu? -->
<?php
$modulo = 0;
//chaque objet 'dateValuesSelector'contient la date et une liste d'objet "type_analysis" contenant un objet "value_type_analysis" uniquement si il existe
foreach($datesValuesSelector as $dateValuesSelector){ 

        //  tous les 10, on affiche l'intitulé date qui n'est pas un type d'analyse
        // tous les 10, on affiche tous les nom des 'type_analysis' dans la liste
    if($modulo ===0){
                ?>
<thead>
<tr>
<th>Date</th>
        <?php
        foreach($dateValuesSelector->all_types_analysis_with_value_if_exist as $type_analysis_with_value_if_exist){ ?>
<th>           
        <?php echo htmlspecialchars($type_analysis_with_value_if_exist->name_type_analysis);?>
</th>
        <?php } ?>
</tr>
</thead>
    <?php } ?>


<tbody>
<tr>

<td>
        <?php //On affiche la date en premier qui n'est pas un type de valeur
        // on transforme de yyyy-mm-dd en dd-mm
        $date = $dateValuesSelector->date_where_are_values;
        echo htmlspecialchars(date('d-m', strtotime($date)));?>
</td>
        <?php //On itère la liste contenant les objets types de valeurs
        foreach($dateValuesSelector->all_types_analysis_with_value_if_exist as $type_analysis_with_value_if_exist){ ?>
<td>
            <?php //Si le type_value contient un objet value_type_value, on récupère la valeur, si il n'existe pas on passe
            if($type_analysis_with_value_if_exist->value_type_analysis !== null){

                echo htmlspecialchars($type_analysis_with_value_if_exist->value_type_analysis->value_type_analysis);

            }  ?>
</td>
        <?php }?>

    <?php 
    $modulo += 1; // on incrémente le modulo et on remet a 0 arrivé a 10.
    $modulo = ($modulo % 10);?>

    <?php 
    if($modulo === 0){ ?>
</tbody>
    <?php }?>        
<?php }?>

</table>
</div>


<!-- popup create_new_aquarium -->
<?php require('templates/pop_up/create_new_aquarium.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_app_asides.php'); ?>