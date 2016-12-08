<?php include('./asset/header.php');?>
<? 
	/*$sql="select *from file_list where owner='admin' order by no desc";
  	$result = mysql_query($sql, $conn);

	$row = mysql_fetch_array($result);
	$db_pass = $row[file_name];

	var_dump($db_pass);*/
  	//print_r($_SESSION['file_name']);
  	?>
	
	<?php
		$line=0;

		$sql ="select *from printer_list";
		$result = mysql_query($sql, $conn);
		$total_record = mysql_num_rows($result); // 전체 글 개수

		$sql2 ="select waiting_page from printer_list";
		$result2 = mysql_query($sql, $conn);
	?>
		<div style="background-color:white; width:100%; height:40px; border-radius: 8px; box-shadow: 0 1px -1px 0; padding: 10px; margin-bottom: 15px;" class="text-center">
			<img src="./icon/print_select_file.png" style="width: 20px; height: 20px;">
			<?=$_SESSION['file_name']?>
		</div>
  	<?
		for($i = 0; $i < $total_record; $i++){
			//가져올 레코드로 위치(포인터)이동
			mysql_data_seek($result, $i);
			mysql_data_seek($result2, $i);

			//하나의 레코드 가져오기
			$row=mysql_fetch_array($result);
			$printer_name=$row[print_name];
			$number=$row[no];
			$model=$row[model];
			$location=$row[location];
			$type=$row[type];

			$row2=mysql_fetch_array($result2);
			$waiting_page = $row2[waiting_page];
	?>
		<div style="width:328px; height:134px; background-color:#ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 3px 0 #c5c5c5; margin-bottom: 15px;">
			<div>
				<div>
					<div style="float:left; margin : 26px 18px 26px 18px">
						<img src="./icon/file_upload.png" style="width: 45px; height: 42px;">
					</div>
					<div style="float:left; margin : 15px">
						<div style="color:#9b9b9b"><?=$model?></div>
						<div><strong><?=$location?></strong></div>
						<div><strong><?=$type?></strong>&nbsp&nbsp<?=$printer_name?></div>
					</div>
				</div>
				
				<a href="done.php?target=<?=$number?>">
				<div style="clear:both; background-color:#f5f5f5; height: 39.6px; padding: 15px;">
					<div style="float:left">
						예상 대기시간 : <? 	$time=$waiting_page*3;
							echo $time;?>초(<?if($waiting_page == NULL)
													echo "0";
											  else
											  		echo $waiting_page;?>장 인쇄 중)
					</div>
					<div style="float:right">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</div>
				</div>
				</a>
			</div>
		</div>

		<?}?>

<?php include('./asset/footer.php');?>