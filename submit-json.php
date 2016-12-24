<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once 'connection.php';
require_once 'class/class.Keyup.php';
require_once 'class/class.Keydown.php';
require_once 'class/class.Keydelete.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
  
		$userId = $_REQUEST['userId'];
		$pageType = $_REQUEST['pageType'];

		if(isset($_REQUEST['userId'])){
			$inputKeydownJsonData = json_decode($_REQUEST['inputKeydownJsonData'], true);
			$keydown = new Keydown($conn, $inputKeydownJsonData);
			$keydown->create($userId, $pageType);

			$inputKeyupJsonData = json_decode($_REQUEST['inputKeyupJsonData'], true);
			$keyup = new Keyup($conn, $inputKeyupJsonData);
			$keyup->create($userId, $pageType);

			$deleteJsonData = json_decode($_REQUEST['deleteJsonData'], true);
			$keydelete = new Keydelete($conn, $deleteJsonData);
			$keydelete->create($userId, $pageType);
		}
  
		$conn->commit();

		$conn = null;

		$pageType++;
		if( $pageType < 9){
			header("Location: typing.php?&pageType=".$pageType."&userId=".$userId);
			die();
		}else{
			
			echo '<!DOCTYPE HTML><html lang="en-US"><head><meta charset="UTF-8"><title>ขอบคุณที่ท่านให้ความร่วมมือ</title></head><body><H2>ขอบคุณที่ท่านให้ความร่วมมือ</H2></body></html>';
		}
	} catch (PDOException $e) {
		$conn->rollBack();
		echo "Failed: " . $e->getMessage();
	}
}

?>
