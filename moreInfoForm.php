<?php
include "inc/header.php";
include "class/user_class.php";
include "class/bienlai_class.php";
include "class/cart_class.php";


$user = new Database;
$username= $_SESSION['username'];
$query = "SELECT * FROM `tbl_user` WHERE userName='$username'";
$result = $user->link->query($query)->fetch_assoc();
$bienlai= new bienlai;


?>
<div id="wrapper_moreInfo">
        
        <div action=""class="login_moreInfo">
            <div class="logo_moreInfo">
                <h1>DBZ STORE</h1>
                <!-- <p> Giỏ hàng>Thông tin giao hàng>Phương thức thanh toán</p> -->
                <hr>
                <div class = "menu_moreInfo">
                    
                   
            </div>
                </hr>
                
        </div>
                <form action="" method="post">
            <h1 class="header_moreInfo">Thông tin giao hàng</h1>
            <div class="group_moreInfo">
                <input type="text" class="input" name="fullName" value='<?php echo $result['firstName'].' '.$result['lastName']?>'' placeholder="Họ và Tên" >
            </div>
            <div class="group group1">
                <input required type="text" name="phoneNumber"  class="input" placeholder="Số Điện Thoại" autocomplete="off" >
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
            </div>
            <div class="group_moreInfo">
                <input required type="text" name='address' class="input" placeholder="Địa chỉ" autocomplete="off">
            </div>
            <div class="group group2">
                <input type="hidden" name="tongsanpham" value="<?php echo $_SESSION['sumchar']?>">
                <input type="hidden" name="tongtien" value="<?php echo $_SESSION['sumpower']?>">
                <p><?php  echo 'Ngày mua hàng:       '. date('Y-m-d');?></p>
                <input type="hidden" name="time"  value='<?php  echo date('Y-m-d')?>'>
                <p style="font-weight:bold">Tổng Nhân Vật: <span><?php echo $_SESSION['sumchar'] ?></span></p>
                <p style="font-weight:bold">Tổng Giá: <span><?php echo $_SESSION['sumpower'] ?></span></p>
            </div>
        <div class="footer_moreInfo">
            <a href="cart.php"><i class="fas fa-arrow-circle-left"></i> Giỏ hàng</a>    
            <input type="submit" value="Hoàn Tất Thanh Toán" class="submit"> 
        </div>
            
        </form>
    </div>

    </div>
    <?php
   
   if($_SERVER['REQUEST_METHOD']=='POST')
   {
    $cart=new cart;
    
    $insert=$bienlai->insert_bienlai($_POST);
    $insertToCart=$cart->insert_cart($insert);
    echo "<script>window.location='bill.php';</script>";


   }
    
    
    
    ?>