<?php
class Aquarium{

    //attributs
    public $id_aquarium;
    public $name_aquarium;
    public $id_user; // clé étrangère

    // attribut de stockage info de connexion BDD
    public $connect;

    // constructeur
    public function __construct()
    {
        $this->connect = new configDB();
        $this->connect = $this->connect->getConnection();
    }

    //getter
    public function get_id_aquarium(){
        return $this->id_aquarium;
    }
    public function get_name_aquarium(){
        return $this->name_aquarium;
    }
    public function get_id_user(){
        return $this->id_user;
    }

    //setter
    public function set_id_aquarium($id_aquarium){
        $this->id_aquarium = $id_aquarium;
    }
    public function set_name_aquarium($name_aquarium){
        $this->name_aquarium = $name_aquarium;
    }
    public function set_id_user($id_user){
        $this->id_user = $id_user;
    }

    // méthode CRUD
    public function create_one_aquarium(){
        try {
            //
            $new_req = "INSERT INTO 
                                aquarium 
                            SET 
                                name_aquarium = :name_aquarium,
                                id_user = :id_user";
            $req = $this->connect->prepare($new_req);
            $req->bindParam(':name_aquarium', $this->name_aquarium);
            $req->bindParam(':id_user', $this->id_user);

            return $req->execute();
        } 
        catch (Exception $e) {
            return throw new Exception('fail_db_create_one_aquarium');
            // die('Erreur dans la bdd: ' . $e->getMessage());
        }
    }
  
}
?>