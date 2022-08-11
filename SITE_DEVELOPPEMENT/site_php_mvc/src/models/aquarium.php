<?php
require_once('src/lib/database.php');

class Aquarium{

	public string $id_aquarium;
	public string $name_aquarium;
	public string $id_user;
}

class AquariumRepository{

	public DatabaseConnection $connection;
	
	public function createAquarium(string $name_aquarium, string $id_user) 
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				aquariums(name_aquarium, id_user) 
			VALUES
				(?, ?)'
		);
		$statement->execute([$name_aquarium, $id_user]);
	}

	public function getAquariumById(string $id_aquarium): ?Aquarium
	{
        $statement = $this->connection->getConnection()->prepare(
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
        $aquarium->id_aquarium = $row['id_aquarium'];
        $aquarium->name_aquarium = $row['name_aquarium'];
        $aquarium->id_user = $row['id_user'];

        return $aquarium;
    }
	
	public function getAquariumsByIdUser(string $id_user): array
	{
        $statement = $this->connection->getConnection()->prepare(
            "SELECT 
				id_aquarium, name_aquarium, id_user 
			FROM aquariums 
			WHERE id_user = ?"
        );
        $statement->execute([$id_user]);

		$aquariums = [];
		while (($row = $statement->fetch())){
			$aquarium = new Aquarium();
			$aquarium->id_aquarium = $row['id_aquarium'];
			$aquarium->name_aquarium = $row['name_aquarium'];
			$aquarium->id_user = $row['id_user'];
			$aquariums[] = $aquarium;
		}

        return $aquariums;
    }
	
}