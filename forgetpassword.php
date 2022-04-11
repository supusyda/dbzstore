<?php include 'inc/header.php';
include 'class/user_class.php';


?>
<div id="wrapper">
    <form action="" class="form-login" method="post">
        <h1 class="form-heading">LẤY LẠI MẬT KHẨU</h1>
        <div class="form-group form-group-1">
            <i class="fas fa-envelope-open-text"></i>
            <input type="email" class="form-input " placeholder="Nhập email" name="email" autocomplete="off">
        </div>
        <div class="form-group form-group-1">
            <i class="fas fa-key"></i>
            <input type="password" class="form-input " placeholder="Mật khẩu mới" name="password">
            <div class="eye">
                <i class="far fa-eye"></i>
            </div>
        </div>
        <input type="submit" value="Xác nhận đổi mật khẩu" class="form-submit">
    </form>
</div>
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
    $user = new user;
    $get = $user->changePass($_POST['email'], $_POST['password']);
    echo "<script>alert('ĐỔI MẬT KHẨU THÀNH CÔNG')</script>";
    echo "<script>window.location='loginForm.php';</script>";
}
?>