<?php
require_once('src/lib/database.php');

class User{

	public string $id_user;
	public string $email_user;
	public string $password_user;
}

class UserRepository{

	public DatabaseConnection $connection;
	
	public function createUser(string $email_user, string $password_user)
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				users(email_user, password_user) 
			VALUES
				(?, ?)'
		);
		$statement->execute([$email_user, $password_user]);
	}

	public function getUserById(string $id): ?User
	{
        $statement = $this->connection->getConnection()->prepare(
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
        $user->id_user = $row['id_user'];
        $user->email_user = $row['email_user'];
        $user->password_user = $row['password_user'];

        return $user;
    }

	public function getUserByEmail(string $email): ?User
	{
        $statement = $this->connection->getConnection()->prepare(
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
        $user->id_user = $row['id_user'];
        $user->email_user = $row['email_user'];
        $user->password_user = $row['password_user'];

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

		$statement = $this->connection->getConnection()->prepare(
			'DELETE FROM 
				users
			WHERE
				id_user = ?'
		);
		$statement->execute([$id_user]);
	}
	
}
