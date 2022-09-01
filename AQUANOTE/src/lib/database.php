<?php
require_once('src/lib/.dbaccess.php');

class Database
{
	private ?PDO $connection = null;

	public function get_connection(): PDO
	{
    	if ($this->connection === null) {
			$this->connection = new PDO('mysql:host='.$_ENV["dbhost"].';dbname='.$_ENV["dbname"].';charset=utf8', $_ENV["dbuser"], $_ENV["dbpassword"]);
    	}

    	return $this->connection;
	}
}