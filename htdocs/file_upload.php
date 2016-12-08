<?php include('./asset/header.php');?>

<div style="border:solid 1px #f5f5f5; height: 178.3px; width:178.3px; border-radius:100px;     margin: auto;">
	<div style="border:solid 1px white; background-color:#f5f5f5; height: 158.5px; width:158.5px; border-radius:100px; margin: 9.9px">
		<div style="border:solid 3px white; height: 149px; width:149px; border-radius:100px; margin: 4.8px">
			<div style="padding: 44px 48.7px 43px 49px;">
				<img src="./icon/file_upload.png" style="width: 51px; height: 62px;">
			</div>
		</div>
	</div>
</div>

<div class="text-center form-space" style="color:#38499d; margin-top:30px; font-size:1.5em">
	출력하고 싶은 파일을 가져오세요!
</div>
<form enctype="multipart/form-data" action="file_upload_process.php" method="POST" name="file_form">
	<input type="hidden" name="MAX_FILE_SIZE" value="300000" />
	<div class="filebox">
	  <label for="ex_file">파일 가져오기</label>
	  <input type="file" id="ex_file" name="userfile" onchange="gotonextpage()"> 
	</div>
</form>


<?php include('./asset/footer.php');?>