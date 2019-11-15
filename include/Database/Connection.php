<?php

namespace App\Database;

class Connection
{
	private $host = 'localhost';
	private $username = 'root';
	private $password = 'aurora';
	private $db = 'web_project';

	public $connection;

	public function __construct()
	{
		$conn = new \mysqli($this->host, $this->username, $this->password, $this->db);

		if( $conn->connect_error ){
			die('Error while connecting: ' . $conn->connect_error);
		}

		$this->connection = $conn;
	}
}

?>