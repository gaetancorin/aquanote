<?php
require_once('src/lib/database.php');

class User{

	public string $id_user;
	public string $email_user;
	public string $password_user;
}

class UserRepository{

	public DatabaseConnection $connection;
	
	public function createUser(string $email_user, string $password_user){

		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				users(email_user, password_user) 
			VALUES
				(?, ?)'
		);
		$affectedLines = $statement->execute([$email_user, $password_user]);
	
		return ($affectedLines > 0);
	}
	
}

