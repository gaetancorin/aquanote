<?php
class user{

    //attributs
    public $id_user;
    public $email_user;
    public $password_user;

    // attribut de stockage info de connexion BDD
    public $connect;

    // constructeur
    public function __construct()
    {
        $this->connect = new configDB();
        $this->connect = $this->connect->getConnection();
    }

    //getter
    public function get_id_user(){
        return $this->id_user;
    }

    public function get_email_user(){
        return $this->email_user;
    }

    public function get_password_user(){
        return $this->password_user;
    }

    //setter
    public function set_id_user($id_user){
        $this->id_user = $id_user;
    }

    public function set_email_user($email_user){
        $this->email_user = $email_user;
    }

    public function set_password_user($password_user){
        $this->password_user = $password_user;
    }

    // méthode CRUD
    public function readAll(){
        $req = $this->connect->prepare(
            'SELECT
                    *
                FROM 
                    user'
        );
        $req->execute();
        return $req;
    }

    public function readOne(){
        $req = $this->connect->prepare(
            'SELECT
                    *
                FROM 
                    user
                WHERE
                    email_user = :email_user'
        );
        $req->execute(
            array(
                ':email_user' => $this->email_user
            )
        );
        return $req;
    }
  
}
?>