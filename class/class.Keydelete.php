<?php
class Keydelete
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
			$query = "INSERT INTO keydelete(id, page_type, input, keyup_timestamp, keydown_timestamp, position, reference_position, delete_count) VALUES (:id, :page_type, :input, :keyup_timestamp, :keydown_timestamp, :position, :reference_position, :delete_count)";

			$stmt = $db->prepare($query);
			$stmt->bindParam(":id", $userId, PDO::PARAM_INT);
			$stmt->bindParam(":page_type", $pageType, PDO::PARAM_INT);
			$stmt->bindParam(":input", $row['input'], PDO::PARAM_STR); 
			$stmt->bindParam(":keyup_timestamp", $row['keyup_timestamp'], PDO::PARAM_STR); 
			$stmt->bindParam(":keydown_timestamp", $row['keydown_timestamp'], PDO::PARAM_STR); 
			$stmt->bindParam(":position", $row['position'], PDO::PARAM_INT);
			$stmt->bindParam(":reference_position", $row['reference_position'], PDO::PARAM_INT); 
			$stmt->bindParam(":delete_count", $row['delete_count'], PDO::PARAM_INT); 

			$stmt->execute();
		}
	}
}

?>