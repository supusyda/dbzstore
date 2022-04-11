
<?php 
include 'inc/header.php';
include 'class/charInfo_add.php';
$charInfo=new charInfoAdd();
if(!isset($_GET['charId'])||$_GET['charId']==NULL)
{
  echo "<script>window.location='category.php';</script>";
  
}
else
{
  $charID=$_GET['charId'];
}
$getInfo=$charInfo->get_char($charID);





?>
    <!-------------------------------------- header---------------------------------------------------->
    <section id="charInfo">
      <div class="container1">
        <div class="categories-top row">
        
        </div>
      </div>
      <div class="container2 row">
        <div class="charInfo-content-left row">
          <div class="charInfo-content-left-bigImg">
            <?php
            $result=$getInfo;
            $subImg=$result['img'];
            $query="SELECT * FROM `tbl_nhanvat_sub_img` WHERE img='$subImg'";
            $data= new Database;//chua tao class subImg_class nen xai thg cai database
            $select=$data->link->query($query);//chon ra tat ca subImg dua tren id nhan vat
            ?>
            <img src="upload/<?php echo $result['img'] ?>" alt="#" />
          </div>
          <div class="charInfo-content-left-smallImg row">
            <?php 
            while($result1=$select->fetch_assoc())
            {
            ?>
            <img src=upload/<?php echo $result1['sub_img1'] ?> alt="" />
            <?php }
            ?>
          </div>
        </div>
        <div class="charInfo-content-right">
          <div class="charInfo-content-right-name">
            <h1><?php echo $result['charName'] ?></h1>
            <p><?php echo $result['form'] ?></p>
          </div>
          <div class="charInfo-content-right-price">
            <p>Giá <span><?php echo $result['powerlevel'] ?></span></p>
          </div>
          <div class="charInfo-content-right-color">
            <p>
              <span style="font-weight: bold">Màu</span>: Màu Mặc Định
              <span style="color: red">*</span>
            </p>
            <div class="charInfo-content-right-color-img">
              <img src="css/img/colorimg.png" style="width: 20px" alt="" />
            </div>
          </div>
          <div class="charInfo-content-right-size">
            <p style="font-weight: bold">Kích Cỡ</p>
            <div class="size">
              <span>S</span>
              <span>M</span>
              <span>X</span>
              <span>XL</span>
              <span>XXL</span>
            </div>
            <div class="quantity row">
              <p style="font-weight: bold">Số Lượng</p>
<!-- formmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
              <form action="cart.php" method="post" >
                <input type="hidden" value="<?php echo $charID ?>" name="id">
              <input type="number" min="0" value="1" name="soluong"/>
              <input type="hidden" name="charName" value="<?php echo $result['charName'] ?>">
              <input type="hidden" name="form" value="<?php echo $result['form'] ?>">
              <input type="hidden" name="powerlevel" value="<?php echo $result['powerlevel'] ?>">
              <input type="hidden" name="img" value="<?php echo $result['img'] ?>">

            </div>
            <p style="font-weight: bold; color: red">Chọn Size</p>
          </div>
          <div class="charInfo-content-right-button">
            <?php if(isset($_SESSION['username']))
            {
              echo '<input type="submit" name="addcart" value="Thêm Vào Giỏ">';
            }
            else
            {
            ?>
            </form>
            <?php
               echo '<a href="loginForm.php"> <button><i class="fa fa-cart-plus"></i>Thêm Vào Giỏ</button></a>';
             } 
            ?>
            <button>Tìm Cửa Hàng</button>
          </div>
          <div class="charInfo-content-right-qrcode">
            <img src="css/img/qr.png" alt="" style="width: 6%" />
          </div>
          <div class="charInfo-content-right-bottom">
            <div class="charInfo-content-right-bottom-cut">
              <div class="showcontent">
                <span>&#8615;</span>
              </div>
            </div>
            <div class="charInfo-content-right-bottom-des row">
              <div class="charInfo-content-right-bottom-des-item detail">
                <p>Details</p>
              </div>
              <div class="charInfo-content-right-bottom-des-item history">
                <p>History</p>
              </div>
              <div class="charInfo-content-right-bottom-des-item">
                <p>I Dont Know</p>
              </div>
            </div>
            <div class="charInfo-content-right-bottom-desContent">
              <div class="desContent-detail 1">
                <p><?php echo $result['details'] ?></p>
              </div> 
              <div class="desContent-detail 2">
                <p><?php echo $result['history'] ?></p>
              </div>
              <div class="desContent-detail 3">
                <p></p>
              </div>
          </div>
        </div>
      </div>
    </section>
    <section id="otherChar">
      

    </section>

    <!--------------------------------------- footer ----------------------------------------------------------->
    <?php 
include 'inc/footer.php'





?>