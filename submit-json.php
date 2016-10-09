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
  
		if(isset($_REQUEST['userId'])){

			$inputKeydownJsonData = json_decode($_REQUEST['inputKeydownJsonData'], true);
			$keydown = new Keydown($conn, $inputKeydownJsonData);
			$keydown->create($_REQUEST['userId']);

			$inputKeyupJsonData = json_decode($_REQUEST['inputKeyupJsonData'], true);
			$keyup = new Keyup($conn, $inputKeyupJsonData);
			$keyup->create($_REQUEST['userId']);

			$deleteJsonData = json_decode($_REQUEST['deleteJsonData'], true);
			$keydelete = new Keydelete($conn, $deleteJsonData);
			$keydelete->create($_REQUEST['userId']);
		}
  
		$conn->commit();
	} catch (PDOException $e) {
		$conn->rollBack();
		echo "Failed: " . $e->getMessage();
	}
	$conn = null;
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>บันทึกข้อมูลเรียบร้อยแล้ว</title>
    </head>
    <body>
		<H2>
			บันทึกข้อมูลเรียบร้อยแล้ว
		</H2>
    </body>
</html>