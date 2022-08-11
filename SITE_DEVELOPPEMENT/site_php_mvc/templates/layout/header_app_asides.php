<!-- HEADER DE LA PAGE INSERT_INPUTS -->

<?php $stylesheets[] = 'src/lib/css/layout/header_app_asides.css'; ?>

<?php ob_start(); ?>

<!------ HEADER TOP--->
<header>
    <div class="header_top">
        <h2 class="aquarium_name">
            <?= htmlspecialchars($aquarium_connected->name_aquarium); ?></h2>
        <div id="div_logo">
            <img id="logoAquaData" src="src/lib/img/logo_aqua_data.png" alt="Aqua Data logo">
            <p id="title_logo">AquaData</p>
        </div>

        <div class="hamburger_conteneur">
            <input type="checkbox" name="" id="">
            <ul class="conteneur_aside_hamb">
                
                <?php $number_of_fish_picture = 0;
                foreach ($aquariums as $aquarium) {
                    $number_of_fish_picture += 1; ?>

                    <li>
                        <a class="a_aside_hamb" href="https://www.google.com/">
                            <img class="img_fish_hamb" src="src/lib/img/poisson_burger_<?= $number_of_fish_picture?>.svg">
                            <?= htmlspecialchars($aquarium->name_aquarium);?>      
                        </a>
                    </li>

                <?php } ?>
               
                <li><a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="src/lib/img/poisson_burger_6.svg">
                        Créer nouvel aquarium      
                    </a></li>                
                <li><a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="src/lib/img/poisson_burger_5.svg">
                        Changer nom de l' aquarium       
                    </a></li>                
                <li><a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="src/lib/img/poisson_burger_4.svg">
                        Supprimer un aquarium       
                    </a></li>                
                <li><a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="src/lib/img/poisson_burger_3.svg">
                        Déconnection       
                    </a></li>   
            </ul>
            <img class="hamburger_header" src="src/lib/img/parametre_header.svg">
        </div>
    </div>
</header>

<!-- RESPONSIVE DES ASIDE PAR GRID-->
<section id="responsive_des_aside">

    <!-- ASIDE GAUCHE HAMBURGER-->
    <aside id="aside_gauche_hamb">
        <ul class="ul_aside_hamb">

            <?php $number_of_fish_picture = 0;
                    foreach ($aquariums as $aquarium) {
                        $number_of_fish_picture += 1; ?>

                        <li>
                            <a class="a_aside_hamb" href="https://www.google.com/">
                                <img class="img_fish_hamb" src="src/lib/img/poisson_burger_<?= $number_of_fish_picture?>.svg">
                                <?= htmlspecialchars($aquarium->name_aquarium);?>      
                            </a>
                        </li>
            <?php } ?>
           
            <li>
                <a class="a_aside_hamb" href="https://www.google.com/">
                    <img class="img_fish_hamb" src="src/lib/img/poisson_burger_6.svg">
                    Créer nouvel aquarium      
                </a>
            </li>
            <li>
                <a class="a_aside_hamb" href="https://www.google.com/">
                    <img class="img_fish_hamb" src="src/lib/img/poisson_burger_5.svg">
                    Changer nom de l' aquarium       
                </a>
            </li>                
            <li>
                <a class="a_aside_hamb" href="https://www.google.com/">
                    <img class="img_fish_hamb" src="src/lib/img/poisson_burger_4.svg">
                    Supprimer un aquarium       
                </a>
            </li>                
            <li>
                <a class="a_aside_hamb" href="https://www.google.com/">
                    <img class="img_fish_hamb" src="src/lib/img/poisson_burger_3.svg">
                    Déconnection       
                </a>
            </li>

        </ul>
    </aside>

    <!-- ASIDE DROITE PUBLICITE-->
    <aside id="aside_droite_pub">
        <div class="box_publicite">
            
            <div class="zone_titre_top_pub">
                <p class="text_titre_top_pub">Liens pratiques</p>
            </div>

            <a class="lien_pub" href="https://www.amazon.fr/">
                <img class="img_1_aside_pub" src="src/lib/img/image_malette_1_transparent.png" alt="mallette de test a goutte JBl lien Amazon">
            </a>

            <a  class="lien_pub" href="https://www.amazon.fr/">
                <img class="img_2_aside_pub" src="src/lib/img/image_malette_2_transparent.png" alt="mallette de test a goutte JBl lien Amazon">
            </a>

        </div>
    </aside>


    <!----  SECTION CENTRALE  ---->
    <section class="section_centrale">

        <?= $content ?>

    </section>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('templates/layout/doctype_head.php') ?>