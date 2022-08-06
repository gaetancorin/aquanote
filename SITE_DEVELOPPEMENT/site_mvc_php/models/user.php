<?php
class User{

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
    public function create_one_user(){
        try {
            $new_req = "INSERT INTO 
                                user 
                            SET 
                                email_user = :email_user,
                                password_user = :password_user";
            $req = $this->connect->prepare($new_req);
            $req->bindParam(':email_user', $this->email_user);
            $req->bindParam(':password_user', $this->password_user);
            return $req->execute();
        } 
        catch (Exception $e) {
            return throw new Exception('fail_db_create_one_user');
            // die('Erreur dans la bdd: ' . $e->getMessage());
        }
    }

    public function read_one_user(){
        try {
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
        catch (Exception $e) {
            // return 'fail_db_read_one_user';
            die('Erreur dans read_one_user: ' . $e->getMessage());
        }
    }

    public function delete_one_user(){
        try {
            $new_req =  'DELETE FROM 
                                user
                            WHERE
                            email_user = :email_user';
            $req = $this->connect->prepare($new_req);
            $req->bindParam(':email_user', $this->email_user);
            return $req->execute();

        } 
        catch (Exception $e) {
            return throw new Exception('fail_db_delete_one_user');
            // die('Erreur dans la bdd: ' . $e->getMessage());
        }
    }

    


    //Sert pas mais est là
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


  
}
?>