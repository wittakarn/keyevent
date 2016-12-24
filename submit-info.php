<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once 'connection.php';
require_once 'class/class.User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
  
		if(isset($_REQUEST['username'])){

			$user = new User($conn, $_REQUEST);
			$userId = $user->create();
		}
  
		$conn->commit();

		header("Location: typing.php?pageType=1&userId=".$userId);
		die();
	} catch (PDOException $e) {
		$conn->rollBack();
		echo "Failed: " . $e->getMessage();
	}
	$conn = null;
}

?>