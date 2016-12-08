function logincheck(){
  if(!document.getElementById('id').value){
    alert("아이디를 입력하세요!");
    document.getElementById('id').focus();
    return;
  }
  else if(!document.getElementById('pw').value){
    alert("비밀번호를 입력하세요!");
    document.getElementById('pw').focus();
    return;
  }
  else{
    document.login.submit();
  }
}

function gotohome(){
  location.replace("file_upload.php");
}

function gotonextpage(){
  document.file_form.submit();
}

function request(){
  jQuery.ajax({
    type: "GET",
    url : "http://192.168.43.247/ajax/chargePoint.php?id=1",
      success:function(response){
        reload_point(response);
      },
      error:function (xhr, ajaxOptions, thrownError){
          alert("fail");
      }
  });
}

function reload_point(response){
    $("#point").html('');
    tag = '보유 포인트 '+response+'P';
    $("#point").html(tag);
}
