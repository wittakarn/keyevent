<?php
class CaptchaResult
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
		
		$query = "INSERT INTO captcha_result(id, page_type, correctness, word, enter_word) VALUES (:id, :page_type, :correctness, :word, :enter_word)";
		$stmt = $db->prepare($query);
		$stmt->bindParam(":id", $params['id'], PDO::PARAM_INT);
		$stmt->bindParam(":page_type", $params['pageType'], PDO::PARAM_INT);
		$stmt->bindParam(":correctness", $params['correctness'], PDO::PARAM_STR);
		$stmt->bindParam(":word", $params['word'], PDO::PARAM_STR);
		$stmt->bindParam(":enter_word", $params['enter_word'], PDO::PARAM_STR);

		$stmt->execute();

		return $db->lastInsertId();
	}
}

?>