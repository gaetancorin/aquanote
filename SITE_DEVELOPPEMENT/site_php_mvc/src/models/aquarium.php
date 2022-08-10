<?php
require_once('src/lib/database.php');

class Aquarium{

	public string $id_aquarium;
	public string $name_aquarium;
	public string $id_user;
}

class AquariumRepository{

	public DatabaseConnection $connection;
	
	public function createAquarium(string $name_aquarium, string $id_user) :Bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				aquariums(name_aquarium, id_user) 
			VALUES
				(?, ?)'
		);
		$affectedLines = $statement->execute([$name_aquarium, $id_user]);
	
		return ($affectedLines > 0);
	}
	
}