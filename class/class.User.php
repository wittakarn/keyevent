<?php
class User
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
  
	public function create(){
		$params = $this->requests;
		$db = $this->dbh;
		
		$query = "INSERT INTO user(username) VALUES (:username)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":username", $params['username'], PDO::PARAM_STR);

		$stmt->execute();

		return $db->lastInsertId();
	}
}

?>