<?
	session_start();
	include_once($_SERVER["DOCUMENT_ROOT"]."/config/dbconfig.php");
	
	$file_no = $_GET['file'];
	
	$sql = "update file_list set status='downloaded' where no='$file_no'";
  	$result = mysql_query($sql, $conn);
	print true;
?>