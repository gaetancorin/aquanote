<!-- HEADER DE LA PAGE HOMEPAGE, LOGIN ET REGISTER -->

<?php $stylesheets[] = 'src/lib/css/layout/header_homepages.css'; ?>

<?php ob_start(); ?>

    <header id="header_login_register">
        <div id="div_logo">
            <img id="logoAquaData" src="src/lib/img/logoAquaData_hd.png" alt="Aqua Data logo">
            <p id="title_logo">AquaData</p>
        </div>
    </header>

    <?= $content ?>

<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/doctype_head.php') ?>