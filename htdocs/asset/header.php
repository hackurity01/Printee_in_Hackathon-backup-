<?
	session_start();
	include_once($_SERVER["DOCUMENT_ROOT"]."/config/dbconfig.php");
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title> 프 브 </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./asset/css/bootstrap.min.css">
		<link rel="stylesheet" href="./asset/css/font_awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="./asset/css/main.css">
		<link rel="stylesheet" href="./asset/css/simple-sidebar.css">
	</head>
	<?if(basename($_SERVER['PHP_SELF']) != "main.php"){
		echo '<body>';
	}else{
		echo '<body class="body_set">';
	}
		if(basename($_SERVER['PHP_SELF']) != "main.php"){?>
			<nav class="navbar" style="background-color:#3b52af;">
			 	<div class="container-fluid">
			    	<div class="navbar-header">

			    	<button type="button" id="menu-toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        
				        <img src="./icon/sidebar_memu_white.png" style="width: 20px; height: 20px;">
			      	</button>
			    		<?
				    		$phpname = basename($_SERVER['PHP_SELF']);
				    		if($phpname=='file_upload.php'){
				    			echo"
				    				<div style='margin:16px 0 16px 20px; font-size:1.5em; color:white;'>
				    					파일 업로드
				    				</div>
				    			";
				    		}
				    		else if($phpname == 'select_print.php'){
				    			echo"
				    				<div style='margin:16px 0 16px 20px; font-size:1.5em; color:white;'>
				    					프린터 선택
				    				</div>
				    			";
				    		}
				    		else if($phpname == 'print_setting.php'){
				    			echo"
				    				<div style='margin:16px 0 16px 20px; font-size:1.5em; color:white;'>
				    					프린터 설정
				    				</div>
				    			";
				    		}
				    		else if($phpname == 'done.php'){
				    			echo"
				    				<div style='margin:16px 0 16px 20px; font-size:1.5em; color:white;'>
				    					예약 완료
				    				</div>
				    			";
				    		}
			    		?>
			    	</div>
			  	</div>
			</nav>
		<?}?>
		<div id="container">
			<div id="wrapper">
				<!-- Sidebar -->
		        <div id="sidebar-wrapper">
		            <ul class="sidebar-nav">
		                <li class="sidebar-brand">
		                    <div style="width:234px; height:56px; background-color: #f5f5f5; margin:8px;">
		                        <div style="float:left">
		                        	<img src="./icon/sidebar_user.png" style="width: 20px; height: 20px;">
		                        	<?=$_SESSION['id']?>
		                        </div>
		                        <!--<div style="float:right; padding:16px">
			                        <div style="background-color:#3b52af; border-radius:20px; width:53px; height:22px">
			                        </div>
			                        <?=$_SESSION['point']?>
		                        </div>-->
		                    </div>
		                </li>
		                <li>
							<div data-toggle="modal" data-target="#myModal">
			                    <div class="text-center" style="width:253px; height:203px;     padding-top: 64px;">
			                    	<img src="./icon/sidebar_point.png" style="width: 20px; height: 20px; margin-bottom:10px">
			                    	<div style="font-size:1.5em; color:black;">포인트 충전</div>
			                    	<div style="font-size:1.1em; color:#9b9b9b;">
			                    	<div id="point">보유 포인트 <?=$_SESSION['point']?>P</div>
			                    	</div>
			                    </div>
		                    </div>
		                </li>
		                <li>
		                	<div  style="height:1px; width: 25px;border:solid 1px black; margin:0 113px 0 120px">
		                	</div>
		                </li>
		                <li>
		                	<a href="logout.php">
			                    <div class="text-center" style="width:253px; height:170px;     padding-top: 77px;">
			                    	<img src="./icon/sidebar_logout.png" style="width: 20px; height: 20px; margin-bottom:10px">
			                    	
			                    	<div style="font-size:1.5em">로그아웃</div>		                    	
			                    </div>
		                    </a>
		                </li>
		                <li>
		                    <div class="text-center" style="width:253px; margin-top:100px">
		                    	<div style="color:#d0d0d0; font-size:1.5em">
		                    		Printee
		                    	</div>
		                    </div>
		                </li>
		            </ul>
		        </div>

		        <!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">포인트 충전</h4>
								</div>
								<div class="modal-body">
								<button type="button" class="btn btn-default" onClick="request()">충전하실래요? ㅎ</button>
								
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
		        <!-- /#sidebar-wrapper -->
				<!-- Page Content -->
		        <div id="page-content-wrapper" style=" margin-top: 18px;">
		            <div class="container-fluid">