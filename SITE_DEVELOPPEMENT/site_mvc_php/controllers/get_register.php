<?php echo "page 'get_register' <br>";

include('../models/user.php');
include('../models/aquarium.php');
include('../config/ConfigDB.php');

// On récupère la donnée du formulaire d'inscription
if (
    !empty($_POST['email'])
    && !empty($_POST['password'])
    && !empty($_POST['name_aquarium'])
){
    $email_user = $_POST['email'];
    $password_user = $_POST['password'];
    $name_aquarium = $_POST['name_aquarium'];
    // echo $email_user.' '.$password_user.' '.$name_aquarium;

    // On essaye de créer le user
    try{
        $user = new User();
        $user->set_email_user($email_user);
        $user->set_password_user($password_user);
        //On vérifie dabors que personne n'utilise le même email
        $my_user = $user->read_one_user();
        $nbrLignesRetournees = $my_user->rowCount();
        if ($nbrLignesRetournees != 0) {
            throw new Exception('Email déjà utilisé sur un autre compte');
        }
        //Si personne ne l'utilise, on crée le nouvel user
        $user->create_user();
    } 
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

// On essaye de créer l'aquarium relié au User
    try{
        // on récupère l'enregistrement de l'utilisateur par son email
        $my_user = $user->read_one_user();
        while ($donnees = $my_user->fetch()) {
            // On récupère son id
            $id_my_user = $donnees["id_user"];
        }
        // On crée l'aquarium avec l'id de l'user en clé étrangère
        $aquarium = new Aquarium();
        $aquarium->set_name_aquarium($name_aquarium);
        $aquarium->set_id_user($id_my_user);
        $aquarium->create_aquarium();


    } 
    catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}

?>
