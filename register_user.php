<?php

include 'inc/header.php';
include 'class/user_class.php';

?>

<body>
  <div id="wrapper ">
    <div class="con aspect-ratio-169">
      <img src="css/img/CIBG2.jpg" id="bg" alt="" />
    </div>
    <div class="cc">
      <form action="" class="form-register" method="post">
        <h1 class="form-heading">ĐĂNG KÝ</h1>
        <div class="form-group">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input required type="text" class="form-input" placeholder="Họ" name="lastName" autocomplete="off" />
        </div>
        <div class="form-group">
          <i class="far fa-user"></i>
          <input required type="text" class="form-input" placeholder="Tên" name="firstName" autocomplete="off"/>
        </div>
        <div class="form-group">
          <i class="far fa-user"></i>
          <input required type="text" class="form-input" placeholder="UserName" name="userName" autocomplete="off"/>
        </div>
        <div class="form-group">
          <i class="fas fa-envelope"></i>
          <input required type="email" class="form-input" placeholder="Email" name="email" autocomplete="off" />
        </div>
        <div class="form-group form-group-1">
          <i class="fas fa-key"></i>
          <input required type="password" class="form-input" placeholder="Mật khẩu" name="password" />
          <div class="eye">
            <i class="far fa-eye"></i>
          </div>
        </div>
        <div class="form-group form-group-1">
          <i class="fa fa-lock" aria-hidden="true"></i>
          <input required type="password" class="form-input" placeholder="Nhập lại mật khẩu" name="rePass" />
          <input type="hidden" name="state" value="1">
          <div class="eye">
            <i class="far fa-eye"></i>
          </div>
        </div>
        <input type="submit" value="Đăng ký" class="form-submit" />
      </form>
    </div>
  </div>
</body>
<script>
    $(document).ready(function() {
        $('.eye').click(function() {
            $(this).toggleClass('open');
            $(this).children('i').toggleClass('fa-eye-slash fa-eye');
            if ($(this).hasClass('open')) {
                $(this).prev().attr('type', 'text');
            } else {
                $(this).prev().attr('type', 'password');
            }
        });
    });
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $lastName = $_POST['lastName'];
  $firstName = $_POST['firstName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $userName = $_POST['userName'];
  $rePass = $_POST['rePass'];
  if ($rePass === $password) {
    $user = new user;
    if ($user->checkUsedName($userName) == false) {
      $insert = $user->insert_user($_POST);
      echo "<script>window.location='loginForm.php';</script>";
    } else {
      echo "dang ky fail";
    }
  } else {
    echo "dang ky fail";
  }
} else {
  echo "dang ky fail";
}


?>