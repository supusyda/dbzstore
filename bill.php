<?php
include "inc/header.php";
include "class/user_class.php";
include "class/bienlai_class.php";
include "class/cart_class.php";
if(!isset($_SESSION['username']))
{
    echo "<script>window.location='loginForm.php';</script>";
}
$user = new Database;
$username = $_SESSION['username'];
$bienlai= new bienlai;
$cart=new cart;

$getBill=$bienlai->show_bienlai($username);
?>

<?php
if($getBill)while($result=$getBill->fetch_assoc())
{
    ?>
<div id="wrapper_moreInfo">
        <div action=""class="login_moreInfo">
            <div class="logo_moreInfo">
                <h1>DBZ STORE</h1>
                <!-- <p> Giỏ hàng>Thông tin giao hàng>Phương thức thanh toán</p> -->
                <hr>
                <div class = "menu_moreInfo">
                    
                    <a href="#" style="font-weight:bold; font-size: 25px"> Biên Lai  </a>
            </div>
          
            <div class="group_moreInfo">
                <p >Họ Và Tên :     <?php echo $result['fullname'] ?></p> 
                <p ></p> 
                <p >Username :    <?php echo $result['username']  ?></p> 
                <p >Số Điện Thoại:    <?php echo $result['username']  ?></p> 
                <p >Ngày Mua :    <?php echo $result['time']  ?></p> 


                <p >Địa chỉ :    <?php echo $result['diachi']?></p> 
                <p >Tổng Nhân Vật :     <?php echo $result['tongsanpham']  ?></p> 
                <p >Tổng Tiền :    <?php echo $result['tongtien']  ?></p> 
                <?php 
                if($result['trangthai']==1) {
                    echo "<p '>Trạng Thái:<span style='color:red'>Đang được xử lý</span></p>";
                }
                else
                {
                    echo "<p >Trạng Thái:<span style='color:green'>Đang giao hàng</span></p>";

                }
                
                  ?>


            </div>
                </hr>
                
        </div>
               <div class="charBill row">
                   
                  <?php 
                  
                  $show=$cart->show_cart($result['id']) ;
                  while($resultCart=$show->fetch_assoc())
                  { 
                      ?>

                    <div class="item row">
                   <div class="charImg">
                       <img src="upload/<?php echo $resultCart['img'] ?>" alt="">
                   </div>
                   <div class="charBillInfo">
                       <p>Tên: <span><?php echo $resultCart['charName'] ?></span></p>
                       <p>Số lượng <span><?php echo $resultCart['soluong'] ?></span></p>
                       <p>PowerLevel: <span><?php echo $resultCart['powerlevel'] ?></span></p>
                   </div>
                   </div>
                  <?php                        
                  } ?>
                  
                
     </div>

    </div>

    </div>
<?php
}

unset($_SESSION['giohang']);

?>
  