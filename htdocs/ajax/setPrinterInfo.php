<?
	session_start();
	include_once($_SERVER["DOCUMENT_ROOT"]."/config/dbconfig.php");
	
	$printer_name = $_GET['printer_name'];
	$printer_model = $_GET['printer_model'];
	$owner = $_GET['owner'];
	
	$sql = "insert into printer_list (printer_name, model, owner) values ('$printer_name', '$printer_model', '$owner')";
	$result = mysql_query($sql, $conn);
		
	$sql = "select * from printer_list where model='$printer_model' and owner='$owner' order by no desc limit 1";
  	$result = mysql_query($sql, $conn);	
	$printer_no = mysql_fetch_assoc($result);
	print $printer_no['no'];
?>