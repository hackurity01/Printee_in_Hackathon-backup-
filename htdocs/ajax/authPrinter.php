<?
	session_start();
	include_once($_SERVER["DOCUMENT_ROOT"]."/config/dbconfig.php");
	header('Content-type: text/html; charset=utf-8');
	
	$printer_id = $_GET['id'];
	$printer_pw = $_GET['pw'];
	
	$sql = "select * from member where id='$printer_id' and pw='$printer_pw' and type='printer'";
  	$result = mysql_query($sql, $conn);
  	if(mysql_num_rows($result)==1){
		$p = mysql_fetch_assoc($result);
		//중복 로그인 제어..
		$sql = "delete from printer_list where owner='$printer_id'";
	  	$result = mysql_query($sql, $conn);
		print $p['id'];
  	}
  	print false;
//	print json_encode();
?>