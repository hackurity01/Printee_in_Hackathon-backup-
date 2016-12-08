<?php
	//$conn = mysql_connect('localhost', 'root', 'apmsetup', 'hackathon');
	$conn=mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("hackathon", $conn);
	
	//$link = mysql_connect('localhost', 'root', 'apmsetup');
	//$conn = mysql_select_db('hackathon', $link);
	//mysql_query("set names utf8", $conn);
	//ini_set('display_errors',0);
	//ini_set('log_errors',1);
?>
