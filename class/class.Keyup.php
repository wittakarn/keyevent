<?php
class Keyup
{
	public $requests;
	public $dbh;
	
	public function  __construct($conn, $param) {
		$this->requests = $param;
		$this->dbh = $conn;
	}
  
	public function create($userId, $pageType){
		$params = $this->requests;
		$db = $this->dbh;
		
		foreach ($params as $row) {
			$query = "INSERT INTO keyup(id, page_type, input, keyup_timestamp, position) VALUES (:id, :page_type, :input, :keyup_timestamp, :position)";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":id", $userId, PDO::PARAM_INT);
			$stmt->bindParam(":page_type", $pageType, PDO::PARAM_INT);
			$stmt->bindParam(":input", $row['input'], PDO::PARAM_INT); 
			$stmt->bindParam(":keyup_timestamp", $row['keyup_timestamp'], PDO::PARAM_STR); 
			$stmt->bindParam(":position", $row['position'], PDO::PARAM_INT); 

			$stmt->execute();
		}
	}
}

?>