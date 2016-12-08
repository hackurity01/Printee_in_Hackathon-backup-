<?
	session_start();
	include_once($_SERVER["DOCUMENT_ROOT"]."/config/dbconfig.php");
	//header('Content-type: text/html; charset=utf-8');
	
	$printer_no = $_GET['printer'];
	$waiting_page = $_GET['waiting_page'];
	
	//프린터 대기 시간 갱신
	$sql = "update printer_list set waiting_page='$waiting_page' where no='$printer_no'";
  	$result = mysql_query($sql, $conn);
	
	$sql = "select * from file_list where status='waiting' and target_printer='$printer_no'";
  	$result = mysql_query($sql, $conn);
	$rows = array();
	while($r = mysql_fetch_assoc($result))
    	$rows[] = $r;

	print json_encode($rows);
?>