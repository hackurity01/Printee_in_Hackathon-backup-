<?php include('./asset/header.php');

 	$id = $_POST['id'];
  	$pw = $_POST['pw'];

	if(!$id || !$pw){
		echo('<script>alert("아이디나 비밀번호가 입력되지 않았습니다.");</script>'); 
		echo('<script>location.replace("main.php");</script>');
	}
	else{
		$sql="select *from member where id='$id'";
		$result = mysql_query($sql, $conn);
		$num_match = mysql_num_rows($result);

		if(!$num_match){
			echo('<script>alert("아이디가 존재하지 않습니다.");</script>'); 
			echo('<script>location.replace("main.php");</script>');
		}
		else{
			$row = mysql_fetch_array($result);
			$db_pass = $row[pw];

			if($pw != $db_pass){
				echo('<script>alert("비밀번호가 틀렸습니다.");</script>'); 
				echo('<script>location.replace("main.php");</script>');
			}
			else{
				$_SESSION['id'] = $row[id];
				$_SESSION['point'] = $row[point];
				echo('<script>location.replace("file_upload.php");</script>');
			}
		}
	}

echo('<script>location.replace("file_upload.php");</script>');
	
include('./asset/footer.php');?>
