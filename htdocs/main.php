<?php include('./asset/header.php');?>
<div class="text-center">
	<div style="font-size:3em" class="form-space">
		<div><img src="./icon/login_logo.png" style="width: 75px; height: 75px;"></div>
		Printee
	</div>
	<div style="font-size:1.1em; margin: 20px 0 40px 0; line-height: 29px;">
		바쁜 일상 속 프린트를 손쉽게<br>
		Printee을 이용하세요!
	</div>	

	<div>
		<form action="login.php" method="POST" name="login">
			<input type="text" class="form-control form-space btn_max" placeholder="아이디" id="id" name="id">
			<input type="password" class="form-control form-space btn_max" placeholder="비밀번호" id="pw" name="pw">
			<input type="button" class="btn btn-primary form-space btn_max" style="background-color:#606fb3;" onClick="logincheck()" value="로그인">
		</form>
	</div>

	<div>
		<a href="join.php" style="color : white">계정이 없으신가요?</a>
	</div>
</div>
<?php include('./asset/footer.php');?>