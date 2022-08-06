<?php $page = 'login' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=" utf-8">
    <link rel="stylesheet" href="./css/header_login_register.css" type="text/css">
    <link rel="stylesheet" href="./css/login_register.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!------ HEADER LOGIN REGISTER--->
    <?php include('./header_login_register.php'); ?>
    <section>

    <div id="content_left_poissonBallon">
        <img id="poissonBallon" src="../img/poissonballon.png" alt="Aqua Data logo" >
    </div>

    <div id="content_right_register_login">
        <div id="section_register_login">

            <div id="header_form">
                <a id="button_back" href="../index.php">
                    <img id="arrow_button_back" src="../img/fleche_bouton_retour.svg" alt="bouton retour">
                </a>
                <p>Connexion</p>
            </div>

            <form id="register_login_form" action="">
                <div id="register_login_inputs">

                    <div class="register_login_input">
                        <label for="email">Email</label>
                        <input maxlength="50" minlength="8" type="email" id="email" name='email' required>
                    </div>

                    <div class="register_login_input">
                        <label for="password">Mot de Passe</label>
                        <input maxlength="50" minlength="8" type="password" id="password" name='password' required>
                    </div>

                </div>
                <button id="access_aqua" type="submit" value="Valider">Accéder à votre Aquarium</button>
            </form>

        </div>
    </div>
    
</section>

</body>
</html>