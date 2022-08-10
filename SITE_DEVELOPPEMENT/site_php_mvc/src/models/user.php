<?php
require_once('src/lib/database.php');

class User{

	public string $id_user;
	public string $email_user;
	public string $password_user;
}

class UserRepository{

	public DatabaseConnection $connection;
	
	public function createUser(string $email_user, string $password_user) :Bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				users(email_user, password_user) 
			VALUES
				(?, ?)'
		);
		$affectedLines = $statement->execute([$email_user, $password_user]);
	
		return ($affectedLines > 0);
	}

	public function readUserByEmail(string $email): ?User
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

	public function deleteUserById(string $id_user) :Bool
	{
		$statement = $this->connection->getConnection()->prepare(
			'DELETE FROM 
				users
			WHERE
				id_user = ?'
		);
		$affectedLines = $statement->execute([$id_user]);
	
		return ($affectedLines > 0);
	}
	
}
