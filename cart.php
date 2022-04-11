<?php 
include 'inc/header.php';
  if(isset($_POST['addcart']))
  {
    
    $img=$_POST['img'];
    $charName=$_POST['charName'];
    $form=$_POST['form'];
    $powerlevel=$_POST['powerlevel'];
    $soluong=$_POST['soluong'];
    $check=0;
    

    for($i=0; $i<sizeof($_SESSION['giohang']);$i++)
    {
      if($_SESSION['giohang'][$i][1]==$charName&&$_SESSION['giohang'][$i][2]==$form)
      {
        $_SESSION['giohang'][$i][4]=$_SESSION['giohang'][$i][4]+$soluong;
        $check=1;
        break;
      }
      
    }
    if($check==0)
    {
        $sp=[$img,$charName,$form,$powerlevel,$soluong];
        $_SESSION['giohang'][]=$sp;
    }
    
  }
  
  
  if(isset($_GET['dele_id']))
  { 
    array_splice($_SESSION['giohang'],$_GET['dele_id'],1);
  }
    function showcart(){
      if(isset($_SESSION['giohang'])&&is_array($_SESSION['giohang']))
      { 
        // global $totalPower;
        // $totalPower=0;
        // global $sumChar;
        //  $sumChar=0;
        $totalPower=0;
        $sumChar=0;
        
        for($i=0;$i < sizeof($_SESSION['giohang']);$i++)
        { 
          $powerlevel=$_SESSION['giohang'][$i][3]*$_SESSION['giohang'][$i][4];
          $totalPower=$totalPower+$powerlevel;
          $numchar=$_SESSION['giohang'][$i][4];
          $sumChar+=$numchar;
          echo '
          <tr>
          <td><img src="upload/'.$_SESSION['giohang'][$i][0].'"/></td>
          <td>'.$_SESSION['giohang'][$i][1].'</td>
          <td>'.$_SESSION['giohang'][$i][2].'</td>
          <td>'.$_SESSION['giohang'][$i][3].'</td>
          <td>'.$_SESSION['giohang'][$i][4].'</td>
          <td><a href="cart.php?dele_id='.$i.'"><span>X</span></a></td>
        </tr>';
        }
        return [$sumChar,$totalPower];
    }
  
    }
    
  
?>

    <!-------------------------------------- header---------------------------------------------------->
    <!-------------------------------------------- cart ---------------------------------------------------------------------------------------->
    <section class="cart">
      <div class="cart-container row">
        <div class="cart-left">
          <div class="cart-left-content">
            <table>
              <tr>
                <th>Hình Nhân Vật</th>
                <th>Tên</th>
                <th>Dạng</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Xóa</th>
              </tr>
              
                <?php
                if(isset($_SESSION['username']))
                $bill=showcart();
                
                 ?>
            </table>
          </div>
        </div>
        <div class="cart-right">
          <div class="cart-right-content">
            <table>
              <tr>
                <th colspan="2">Tổng Thanh Toán</th>
              </tr>
              <tr>
                <td>Tổng Nhân Vật</td>
                <td>
                <?php
                if(isset($_SESSION['username'])) 
                echo  $_SESSION['sumchar']=$bill[0];
                else
                {
                  echo '0';
                }
                ?>
                </td>
              </tr>
              <tr>
                <td><p style="font-weight: bold">Giá Tiền</p></td>
                <td><p style="font-weight: bold"><?php
                if(isset($_SESSION['username'])) echo $_SESSION['sumpower']= $bill[1]; ?></p></td>
              </tr>
            </table>
            <div class="cart-right-content-button row">
              <button><a href="category.php">Thêm Nhân Vật</a> </button>
              <?php
                if(!isset($_SESSION['username'])) 
                echo  '<button><a href="loginForm.php">Please Sign In </a></button>';
                else if(isset($_SESSION['username'])&& sizeof($_SESSION['giohang'])>0)
                {
                  echo '<button><a href="moreInfoForm.php"> Tiếp Tục Thanh Toán</a></button>';
                }
                
                
                
                ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--------------------------------------- footer ----------------------------------------------------------->
    
    
<?php 
include 'inc/footer.php'
?>