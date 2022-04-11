<?php
include "class/category_class.php";
$category = new cartegoty();
$showhead = $category->show_cartegory();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./css/style.css?v<?php echo time(); ?>" />
  <link rel="stylesheet" href="./css/app.css?v<?php echo time(); ?>">
  <link rel="stylesheet" href="./css/app1.css?v<?php echo time(); ?>">
  <link rel="stylesheet" href="./css/app2.css?v<?php echo time(); ?>">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <title>DBZ STORE</title>
</head>

<body>
  <div id="header">
    <div class="logo row" style="align-items: center">
      <p style="    font-weight: bold;
    font-size: 17px;">DBZ STORE</p>
      <a href="index.php"><img src="css/img/logo.jpg" alt="" /></a>
    </div>
    <div class="menu-container">
      <ul class="menu">
        <li><a href="category.php?currentPage=1">Nhân Vật</a></li>

        <?php if ($showhead) {
          while ($result = $showhead->fetch_assoc()) { ?>
            <li><a href="category.php?cateID=<?php echo $result['danhmuc_id']; ?>"><?php echo $result['Name']; ?></a></li>
          <?php  }
        } else {
          ?>
        <?php
        } ?>
        <?php
        if (isset($_SESSION['username']) && $_SESSION['state'] == 2)
          echo '<li class="super">
          <a href=""> ADMIN</a>
          <ul class="submenu" style="color:black">
            <ul>
              <a href="user_list.php">User List</a>
            </ul>
            <ul>
              <a href="charInfo_list.php">Character</a>
            </ul>
            <ul>
              <a href="categorylist.php">Category</a>
            </ul>
            <ul>
              <a href="bill_list.php">User Bill</a>
            </ul>
          </ul>
        </li>'
        ?>
      </ul>
    </div>
    <div class="otherThing row">
      <ul>
        <li>
          <div class="timkiem">
            <form action="./category.php" method="post">
              <input type="text" name="searchContent" id="search-bar" placeholder="Tìm Kiếm" />

              <button type="submit" class="fa fa-search"></button>
            </form>
          </div>

        </li>

      </ul>
      <div class="icon">
        <a href="cart.php" class="fa fa-shopping-bag"></a>
        <a href="bill.php" class="	far fa-money-bill-alt"></a>
      </div>
      <div class="user row" style="justify-content: center;
    align-content: center;
    flex-direction: row;
    /* margin-right: 1px; */
    margin-left: -5px;">
        <?php
        if (isset($_SESSION['username'])) {
          echo '<div class="dangnhapdone">Hello &nbsp;<span> ' ?><?php echo $_SESSION['username'] ?><?php echo "</div>";
                                                                                              echo "<a href='logout.php'></span><div class='dangnhap'>Đăng xuất</div></a>";
                                                                                              if (!isset($_SESSION['giohang'])) {
                                                                                                $_SESSION['giohang'] = [];
                                                                                              }
                                                                                            } else {
                                                                                              echo "
              <a href='loginForm.php'><div class='dangnhap'>Đăng Nhập </div></a>
              <a href='register_user.php'><div class='dangnhap'>Đăng Ký</div></a>
              ";
                                                                                            }
                                                                                              ?>
      </div>
    </div>
  </div>
  <!-------------------------------------- header---------------------------------------------------->



<section class="slider">
  <div class="slider-container aspect-ratio-169">
    <img src="css/img/slide1.png" alt="" />
    <img src="css/img/slide2.png" alt="" />
    <img src="css/img/slide3.png" alt="" />
    <img src="css/img/slide4.png" alt="" />
  </div>
  <div class="dot-container">
    <div class="dot active"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>
</section>
<?php 
include 'inc/footer.php'





?>