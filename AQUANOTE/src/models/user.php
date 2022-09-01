<?php

require_once('src/lib/database.php');

class User{
	private string $id_user;
	private string $email_user;
	private string $password_user;

	public function get_id_user() :string{
		return $this->id_user;
	}
	public function get_email_user() :string{
		return $this->id_user;
	}
	public function get_password_user() :string{
		return $this->password_user;
	}
	public function set_id_user(string $id_user){
		$this->id_user = $id_user;
	}
	public function set_email_user(string $email_user){
		$this->email_user = $email_user;
	}
	public function set_password_user(string $password_user){
		$this->password_user = $password_user;
	}
}

class UserRepository{

	private Database $database;

	public function set_database(Database $database){
		$this->database = $database;
	}
	
	public function createUser(string $email_user, string $password_user)
	{
		$statement = $this->database->get_connection()->prepare(
			'INSERT INTO 
				users(email_user, password_user) 
			VALUES
				(?, ?)'
		);
		$statement->execute([$email_user, $password_user]);
	}


	public function getUserById(string $id): ?User
	{
        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_user, email_user, password_user 
			FROM users 
			WHERE id_user = ?"
        );
        $statement->execute([$id]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $user = new User();
        $user->set_id_user($row['id_user']);
        $user->set_email_user($row['email_user']);
        $user->set_password_user($row['password_user']);

        return $user;
    }


	public function getUserByEmail(string $email): ?User
	{
        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_user, email_user, password_user 
			FROM users 
			WHERE email_user = ?"
        );
        $statement->execute([$email]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $user = new User();
        $user->set_id_user($row['id_user']);
        $user->set_email_user($row['email_user']);
        $user->set_password_user($row['password_user']);

        return $user;
    }

	
	public function deleteUserById(string $id_user)
	{
		//La requête delete retournera toujours 1 même si il n'a rien supprimé.
		//On doit donc vérifier l'Id avant.
		$user = $this->getUserById($id_user);
		if ($user === null) {
            return new Exception('L\id de l\'user a supprimer n\'existe pas');
        }

		$statement = $this->database->get_connection()->prepare(
			'DELETE FROM 
				users
			WHERE
				id_user = ?'
		);
		$statement->execute([$id_user]);
	}



	public function deleteUserByEmail(string $email_user)
	{
		$statement = $this->database->get_connection()->prepare(
			'DELETE FROM 
				users
			WHERE
				email_user = ?'
		);
		$statement->execute([$email_user]);
	}
	
	
}
