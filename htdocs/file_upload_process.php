<?
	session_start();
	include('./asset/header.php');

	$userfile = $_FILES['userfile'];
	$MAX_FILE_SIZE = $_POST['MAX_FILE_SIZE'];

	$str = explode(".", $userfile['name']); //확장자 구하기

	if($userfile['name']){
		$new_file_name = date("Y_m_d_H_i_s"); //새로운 파일이름 생성 (날짜_넘버링.확장자)
		$new_file_name = $new_file_name.".".$str[1];
		$file_path = "upfiles/".$new_file_name;
	}

	move_uploaded_file($userfile['tmp_name'], "upfiles/".$new_file_name);
	
	var_dump($userfile['name']);
	var_dump($file_path);
	var_dump($userfile['size']);
	var_dump($_SESSION['id']);
	var_dump('waiting');

	$sql = "insert into file_list (file_original_name, file_path, file_size, owner, status) values ('".$userfile['name']."', '".$file_path."', '".$userfile['size']."', '".$_SESSION['id']."', 'uploaded')";

	mysql_query($sql, $conn);

	$_SESSION['file_name'] = $userfile['name'];
	$_SESSION['file_path'] = $file_path;

	echo("<script>
			location.href='select_print.php';
  		</script>
  		");
	include('./asset/footer.php');
?>