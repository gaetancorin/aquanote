<?php $page = 'choice_login_register' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=" utf-8">
    <link rel="stylesheet" href="../css/header_login_register.css" type="text/css">
    <link rel="stylesheet" href="../css/choice_login_register.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Inscription</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!------ HEADER LOGIN REGISTER--->
    <?php include('../views/header_login_register.php'); ?>

    <section>

        <div id="content_left_poissonBallon">
            <img id="poissonBallon" src="../img/poissonballon.png" alt="Aqua Data logo" >
        </div>

        <div id="content_right_register_login">
            <div id="center_button">
                <a class="button_login_register" id="login" href="./login.php">Se connecter</a>
                <a class="button_login_register" id="register" href="./register.php">S'inscrire</a>
            </div>
        </div>

    </section>

</body>
</html>


