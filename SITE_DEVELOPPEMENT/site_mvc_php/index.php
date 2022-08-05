<!-- http://localhost/fil_rouge/php_site/ -->
<!DOCTYPE html>
<html>
<head>
    <meta charset=" utf-8">
    <link rel="stylesheet" href="./only_header.css" type="text/css">
    <link rel="stylesheet" href="./diagramme.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficheur</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!--https://fonts.google.com/specimen/Roboto#standard-styles-->
</head>
<body>

    <!------ HEADER TOP--->
    <header>
        <div class="header_top">
            <h2 class="aquarium_name">Aquarium 1</h2>
            <p class="logo">logo</p>
            <div class="hamburger_conteneur">
                <input type="checkbox" name="" id="">
                <ul class="conteneur_aside_hamb">                
                    <li><a class="a_aside_hamb" href="https://www.google.com/">
                            <img class="img_fish_hamb" src="./image_site/poisson_burger_1.svg">
                            Aquarium 1       
                        </a></li>
                    <li><a class="a_aside_hamb" href="https://www.google.com/">
                            <img class="img_fish_hamb" src="./image_site/poisson_burger_2.svg">
                            Aquarium 2       
                        </a></li>                
                    <li><a class="a_aside_hamb" href="https://www.google.com/">
                            <img class="img_fish_hamb" src="./image_site/poisson_burger_3.svg">
                            Créer nouvel aquarium      
                        </a></li>                
                    <li><a class="a_aside_hamb" href="https://www.google.com/">
                            <img class="img_fish_hamb" src="./image_site/poisson_burger_4.svg">
                            Changer nom de l' aquarium       
                        </a></li>                
                    <li><a class="a_aside_hamb" href="https://www.google.com/">
                            <img class="img_fish_hamb" src="./image_site/poisson_burger_5.svg">
                            Supprimer un aquarium       
                        </a></li>                
                    <li><a class="a_aside_hamb" href="https://www.google.com/">
                            <img class="img_fish_hamb" src="./image_site/poisson_burger_6.svg">
                            Déconnection       
                        </a></li>   
                </ul>
                <img class="hamburger_header" src="./image_site/parametre_header.svg">
            </div>
        </div>
    </header>

    <!-- RESPONSIVE DES ASIDE PAR GRID-->
    <section id="responsive_des_aside">

        <!-- ASIDE GAUCHE HAMBURGER-->
        <aside id="aside_gauche_hamb">
            <ul class="ul_aside_hamb">
                
                <li>
                    <a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="./image_site/poisson_burger_1.svg">
                        Aquarium 1       
                    </a>
                </li>
                <li>
                    <a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="./image_site/poisson_burger_2.svg">
                        Aquarium 2       
                    </a>
                </li>                <li>
                    <a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="./image_site/poisson_burger_3.svg">
                        Créer nouvel aquarium      
                    </a>
                </li>                <li>
                    <a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="./image_site/poisson_burger_4.svg">
                        Changer nom de l' aquarium       
                    </a>
                </li>                <li>
                    <a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="./image_site/poisson_burger_5.svg">
                        Supprimer un aquarium       
                    </a>
                </li>                <li>
                    <a class="a_aside_hamb" href="https://www.google.com/">
                        <img class="img_fish_hamb" src="./image_site/poisson_burger_6.svg">
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
                    <img class="img_1_aside_pub" src="./image_site/image_malette_1_transparent.png" alt="mallette de test a goutte JBl lien Amazon">
                </a>

                <a  class="lien_pub" href="https://www.amazon.fr/">
                    <img class="img_2_aside_pub" src="./image_site/image_malette_2_transparent.png" alt="mallette de test a goutte JBl lien Amazon">
                </a>
  
            </div>
        </aside>


        <!----  SECTION CENTRALE  ---->
        <section class="section_centrale">
            <!----  AFFICHEUR  ---->

            <!--  header top afficheur  -->
            <nav>
                <ul  class="header_top_afficheur">
                    <li class="navigation">
                        <a href="./afficheur.html">
                        <img src="./image_site/icone_afficheur.svg">
                        </a>
                    </li>
                    <li class="navigation">
                        <a href="#">
                        <img src="./image_site/icone_diagramme.svg">
                        </a>
                    </li>
                    <li class="navigation">
                        <a href="./tableau.html">
                        <img src="./image_site/icone_tableau.svg">
                        </a>
                    </li>
                </ul>
            </nav>   
            
            




        </section>
    </section>

</body>
</html>