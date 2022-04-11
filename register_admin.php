<?php

include 'inc/header.php'; 
include 'class/user_class.php';   

?>
<body>
    <div id="wrapper ">
      <div class="con aspect-ratio-169">
       
      </div>
      <div class="cc">
        <form action="" class="form-register" method="post">
          <h1 class="form-heading">ĐĂNG KÝ CHO ADMIN</h1>
          <div class="form-group">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input required type="text" class="form-input" placeholder="Họ" name="lastName"/>
          </div>
          <div class="form-group">
            <i class="far fa-user"></i>
            <input required type="text" class="form-input" placeholder="Tên" name="firstName"/>
          </div>
          <div class="form-group">
            <i class="far fa-user"></i>
            <input required type="text" class="form-input" placeholder="UserName" name="userName"/>
          </div>
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input required type="email" class="form-input" placeholder="Email" name="email" autocomplete="off"/>
          </div>
          <div class="form-group form-group-1">
            <i class="fas fa-key"></i>
            <input required type="password" class="form-input" placeholder="Mật khẩu" name="password"/>
            <div id="eye">
              <i class="far fa-eye"></i>
            </div>
          </div>
          <div class="form-group form-group-1">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input required
              type="password"
              class="form-input"
              placeholder="Nhập lại mật khẩu"
              name="rePass"
            />
            <div id="eye">
              <i class="far fa-eye"></i>
            </div>
          </div>
          <input type="hidden" name="state" value="2">
          <input type="submit" value="Đăng ký" class="form-submit" />
        </form>
      </div>
    </div>
  </body>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
 
  $password=$_POST['password'];
  $userName=$_POST['userName'];
  $rePass=$_POST['rePass'];
  if($rePass===$password)
  { 
    $user=new user;
    if($user->checkUsedName($userName)==false)
    {
      $insert=$user->insert_user($_POST);
      echo "<script>window.location='user_list.php';</script>";
    }
    else{
      echo "dang ky fail";
    }
  }
  else
  {
    echo "dang ky fail";
  }
  

}
else{
  echo "dang ky fail";
}


?>
