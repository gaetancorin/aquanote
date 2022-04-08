<?php
class utilisateur{
    //attributs
    public $id_utilisateur;
    public $email_utilisateur;
    public $mdp_utilisateur;

    // attribut de stockage info de connexion BDD
    public $connect;

    // constructeur
    public function __construct()
    {
        $this->connect = new configBDD();
        $this->connect = $this->connect->getConnection();
    }

    public function getid_utilisateur(){
        return $this->id_utilisateur;
    }

    public function getemail_utilisateur(){
        return $this->email_utilisateur;
    }

    public function getmdp_utilisateur(){
        return $this->mdp_utilisateur;
    }

    public function setid_utilisateur($id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
    }

    public function setemail_utilisateur($email_utilisateur){
        $this->email_utilisateur = $email_utilisateur;
    }

    public function setmdp_utilisateur($mdp_utilisateur){
        $this->mdp_utilisateur = $mdp_utilisateur;
    }

    // function CRUD
    public function readAll(){
        $myQuery = "SELECT * FROM utilisateur";
        $stmt = $this->connect->prepare($myQuery);
        $stmt->execute();
        return $stmt;
    }

    public function readSingle(){
        $myQuery = "SELECT * FROM utilisateur
        WHERE email_utilisateur = :email_utilisateur";
        $stmt = $this->connect->prepare($myQuery);
        $stmt-> execute();
        return $stmt;    
    }
}
?>