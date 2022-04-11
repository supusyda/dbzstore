<?php include 'inc/header.php';
include 'class/user_class.php';


?>
<div id="wrapper">
    <form action="" class="form-login" method="post">
        <h1 class="form-heading">ĐĂNG NHẬP</h1>
        <div class="form-group">
            <i class="far fa-user"></i>
            <input type="text" class="form-input" placeholder="Tên đăng nhập" name="username" autocomplete="off">
        </div>
        <div class="form-group form-group-1">
            <i class="fas fa-key"></i>
            <input type="password" class="form-input " placeholder="Mật khẩu" name="password">
            <div class="eye">
                <i class="far fa-eye"></i>
            </div>
        </div>
        <a href="forgetpassword.php" style="color: red;">Quên mật khẩu?</a>
        <input type="submit" value="Đăng nhập" class="form-submit">
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
    $get = $user->get_user($_POST['username'], $_POST['password']);
    $result = $get;

    if ($result['state'] == 1) {
        $_SESSION["username"] = $result['userName'];
        $_SESSION["state"] = $result['state'];
        echo "<script>window.location='cart.php';</script>";
    } else if ($result['state'] == 2) {
        $_SESSION["username"] = $result['userName'];
        $_SESSION["state"] = $result['state'];
        echo "<script>window.location='user_list.php';</script>";
    } else {
        echo $result['userName'];
    }
}
?>