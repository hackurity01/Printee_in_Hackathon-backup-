<?
	session_start();
	include_once($_SERVER["DOCUMENT_ROOT"]."/config/dbconfig.php");
	
	$id = $_SESSION['id'];
	
	$sql = "update member set point=point+2000 where id='$id'";
  	$result = mysql_query($sql, $conn);
  	$sql = "select * from member where id='$id'";
  	$result = mysql_query($sql, $conn);
  	$r = mysql_fetch_assoc($result);
  	print $r['point'];

  	$_SESSION['point']= $r['point'];
?>