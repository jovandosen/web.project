<?php

namespace App;

class External
{
	private $conn;

	public function __construct()
	{
		$connect = new \mysqli('localhost', 'root', 'aurora', 'web_project');

		if( $connect->connect_error ){
			die('Error while connecting to database: ' . $connect->connect_error);
		}

		$this->conn = $connect;
	}

	public function getAllEmails()
	{
		$sql = "SELECT email FROM users";

		$records = $this->conn->query($sql);

		$emails = [];

		if( $records->num_rows > 0 ){
			while( $row = mysqli_fetch_object($records) ){
				$emails[] = $row->email;
			}
		}

		$emails = json_encode($emails);

		echo $emails;
	}
}

$externalData = new External();
$externalData->getAllEmails();

?>