<?php
require_once('src/lib/.dbaccess.php');

class DatabaseConnection
{
	private ?PDO $database = null;

	public function getConnection(): PDO
	{
    	if ($this->database === null) {
			$this->database = new PDO('mysql:host='.$_ENV["dbhost"].';dbname='.$_ENV["dbname"].';charset=utf8', $_ENV["dbuser"], $_ENV["dbpassword"]);
    	}

    	return $this->database;
	}
}