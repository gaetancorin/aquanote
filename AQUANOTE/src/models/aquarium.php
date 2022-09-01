<?php
require_once('src/lib/database.php');

class Aquarium{
	private string $id_aquarium;
	private string $name_aquarium;
	private string $id_user;

	public function get_id_aquarium() :string{
		return $this->id_aquarium;
	}
	public function get_name_aquarium() :string{
		return $this->name_aquarium;
	}
	public function get_id_user() :string{
		return $this->id_user;
	}
	public function set_id_aquarium(string $id_aquarium){
		$this->id_aquarium = $id_aquarium;
	}
	public function set_name_aquarium(string $name_aquarium){
		$this->name_aquarium = $name_aquarium;
	}
	public function set_id_user(string $id_user){
		$this->id_user = $id_user;
	}
}

class AquariumRepository{

	private Database $database;

	public function set_database(Database $database){
		$this->database = $database;
	}
	
	public function createAquarium(string $name_aquarium, string $id_user) 
	{
		$statement = $this->database->get_connection()->prepare(
			'INSERT INTO 
				aquariums(name_aquarium, id_user) 
			VALUES
				(?, ?)'
		);
		$statement->execute([$name_aquarium, $id_user]);
	}

	public function getAquariumById(string $id_aquarium): ?Aquarium
	{
        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_aquarium, name_aquarium, id_user 
			FROM aquariums 
			WHERE id_aquarium = ?"
        );
        $statement->execute([$id_aquarium]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $aquarium = new Aquarium();
        $aquarium->set_id_aquarium($row['id_aquarium']);
        $aquarium->set_name_aquarium($row['name_aquarium']);
        $aquarium->set_id_user($row['id_user']);

        return $aquarium;
    }

	public function getAquariumByNameAndIdUser(string $name_aquarium, string $id_user): ?Aquarium
	{
        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_aquarium, name_aquarium, id_user 
			FROM aquariums 
			WHERE name_aquarium = ? AND id_user = ?"
        );
        $statement->execute([$name_aquarium, $id_user]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $aquarium = new Aquarium();
        $aquarium->set_id_aquarium($row['id_aquarium']);
        $aquarium->set_name_aquarium($row['name_aquarium']);
        $aquarium->set_id_user($row['id_user']);

        return $aquarium;
    }
	
	
	public function getAquariumsByIdUser(string $id_user): array
	{
        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_aquarium, name_aquarium, id_user 
			FROM aquariums 
			WHERE id_user = ?"
        );
        $statement->execute([$id_user]);

		$aquariums = [];
		while (($row = $statement->fetch())){
			$aquarium = new Aquarium();
			$aquarium->set_id_aquarium($row['id_aquarium']);
			$aquarium->set_name_aquarium($row['name_aquarium']);
			$aquarium->set_id_user($row['id_user']);
			$aquariums[] = $aquarium;
		}

        return $aquariums;
    }


	public function updateNameAquariumById(string $name_aquarium, string $id_aquarium)
	{
        $statement = $this->database->get_connection()->prepare(
			'UPDATE 
				aquariums 
			SET 
				name_aquarium = ? 
			WHERE 
				id_aquarium = ?'
        );
        $statement->execute([$name_aquarium, $id_aquarium]);
    }

	
	public function deleteAquariumsById(string $id_aquarium)
	{
        $statement = $this->database->get_connection()->prepare(
			'DELETE FROM 
				aquariums
			WHERE
				id_aquarium = ?'
        );
        $statement->execute([$id_aquarium]);
    }
	
}