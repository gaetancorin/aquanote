<!-- PAGE VALUES_TABLE -->

<?php 
    $title = "Tableau des données"; 
    // $stylesheets[] = 'src/lib/css/insert_inputs.css';
?>

<?php ob_start(); ?>

<!----  VALUES_TABLE  ---->



<?php $content = ob_get_clean(); ?>

<?php echo 'VALUE_TABLE'; require('templates/layout/header_app_asides.php'); ?>