<?php include('./asset/header.php');
	$number = $_GET['target'];
	$sql ="update file_list set status='waiting', target_printer=$number where file_path='".$_SESSION['file_path']."'";
	$result = mysql_query($sql, $conn);
?>

<div >
	<div style="width:80px; height:80px; border-radius:100px; background-color:#f5f5f5; margin:auto;">
		<div style="padding:19px">
			<img src="./icon/OK.png" style="width: 45px; height: 42px;">
		</div>
	</div>
	<div class="text-center form-space" style="font-size:1.5em">
		프린터 예약이 완료되었습니다.
	</div>
	<div class="text-center form-space" style="font-size:1.2em">
		해당 프린터로 이동하여<br>
		출력물을 수령해 주세요!
	</div>
	<div class="form-space" style="margin-top:45px;">
		<button class="btn btn_max" style="background-color : #3b52af; color:white" onClick="gotohome()">홈으로 가기</button>
	</div>
</div>
<?php include('./asset/footer.php');?>