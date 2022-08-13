<!-- PAGE VALUES_TABLE -->

<?php 
    $title = "Tableau des données"; 
    $stylesheets[] = 'src/lib/css/values_table.css';
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
        <thead>
            <tr>
                <th>Date</th>
                <th>C°</th>
                <th>La grandiose mare</th>
                <th>NO3</th>
                <th>PO4</th>
                <th>Températureouaiq</th>
                <th>NO2</th>
                <th>chang eau</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01-08</td>
                <td>444.1</td>
                <td>4.4</td>
                <td>24.2</td>
                <td>4.4</td>
                <td>4.9</td>
                <td>4.5</td>
                <td>4.8</td>
            </tr>
            <tr>
                <td>01-08</td>
                <td>4.1</td>
                <td>4.4</td>
                <td>4.2</td>
                <td>4.4</td>
                <td>4.9</td>
                <td>4.5</td>
                <td>4.8</td>
            </tr>
            <tr>
                <th>Date</th>
                <th>C°</th>
                <th>khckkphyfhouazf</th>
                <th></th>
                <th>PO4</th>
                <th>Tempér
                    ature</th>
                <th>NO2</th>
                <th>chang eau</th>
            </tr>
            <tr>
                <td>01-08</td>
                <td>4.1</td>
                <td>4.4</td>
                <td>4.2</td>
                <td>4.4</td>
                <td>4.9</td>
                <td>4.5</td>
                <td>4.8</td>
            </tr>
            <tr>
                <td>01-08</td>
                <td>4.1</td>
                <td>4.4</td>
                <td>4.2</td>
                <td>4.4</td>
                <td>4.9</td>
                <td>4.5</td>
                <td>4.8</td>
            </tr>
        </tbody>
        
    </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/header_app_asides.php'); ?>