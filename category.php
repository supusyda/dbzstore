
<?php 
include 'inc/header.php';
include 'class/charInfo_add.php';
$charInfo=new charInfoAdd();
if(isset($_POST['searchContent']))
{
  $show=$charInfo->show_chars_search($_POST['searchContent']);
  $result=$charInfo->show_chars_search_num($_POST['searchContent']); 
  if($result)
  {
    $char_num=mysqli_num_rows($result);
    $page_num= ceil($char_num/6);
  }



}
else if(isset($_GET['cateID'])){

$show=$charInfo->show_chars_category($_GET['cateID']);
  $result=$charInfo->show_chars_category_num($_GET['cateID']); 
  if($result)
  {
    $char_num=mysqli_num_rows($result);
    $page_num= ceil($char_num/6);
  }
}
else{
  $show=$charInfo->show_chars_page();
  $result=$charInfo->show_chars(); 
  if($result)
  {
    $char_num=mysqli_num_rows($result);
    $page_num= ceil($char_num/6);
  }
}

?>
    <!-------------------------------------- header---------------------------------------------------->
    <!-- ---------------------categories --------------------ory -->
    <section id="categories">
      <div class="container1">
        <div class="categories-top row">
     
        </div>
      </div>
      <div class="container2">
        <div class="row">
          <div class="categories-left">
            <ul>
              <li class="categories-left-li">
                <a href="#">Male</a>
                <ul class="categories submenu sidebar-js">
                  <li><a href="">Saiyan</a></li>
                  <li><a href="">Hybrid Saiyan</a></li>
                  <li><a href="">Earthling</a></li>
                </ul>
              </li>
              <li class="categories-left-li ">
                <a href="#">Female</a>
                <ul class="categories submenu sidebar-js">
                  <li><a href="">Saiyan</a></li>
                  <li><a href="">Hybrid Saiyan</a></li>
                  <li><a href="">Earthling</a></li>
                </ul>
              </li>

              <li class="categories-left-li">
                <a href="#">Kid</a>
                <ul class="categories submenu sidebar-js">
                  <li><a href="">Saiyan</a></li>
                  <li><a href="">Hybrid Saiyan</a></li>
                  <li><a href="">Earthling</a></li>
                </ul>
              </li>
              <li class="categories-left-li">
                <a href="#">Friza Race</a>
              </li>
            </ul>
          </div>
          <div class="categories-right">
            <div class="categories-right-top row">
              <div class="categories-right-top-item">NHÂN VẬT</div>
              <div class="categories-right-top-item">
                <button>
                  <span>Bộ Lọc</span><i class="fa fa-angle-down"></i>
                </button>
              </div>
              <div class="categories-right-top-item">
                <select name="" id="">
                  <option value="">Sắp xếp</option>
                  <option value="">Strongest to Weakest</option>
                  <option value="">Weakest to Strongest</option>
                </select>
              </div>
            </div>
            <div class="categories-right-bot row">
              <?php           
              if($result){while($result=$show->fetch_assoc()){ 
                ?>
                <div class="categories-right-bot-item">
                <a href="charInfo.php?charId=<?php echo $result['id'] ?>"><img src="upload/<?php echo $result['img']?>" alt=""/></a>
                <h1><a href="charInfo.php?charId=<?php echo $result['id'] ?>"><?php echo $result['charName']?></a> </h1>
                <p>
                  <img
                    src="css/img/scout.png"
                    alt=""
                    style="width: 25px"
                  />
                  <?php echo $result['powerlevel']?>
                </p>
              </div>
                <?php              
              }}
              else
              {
                echo "Không tìm thấy kết quả";
              } ?>        
            </div>
            
            <div class="categories-right-toe row">            
              <div class="shownum-left">
              </div>
              <div class="pageNum-right">
                <p>
                <?php 
           
            if($page_num)
            {
              for($i=1;$i<=$page_num;$i++) {
              ?>

              <a href="category.php?currentPage=<?php echo $i ?>"><span><?php echo $i ?></span></a>
<?php
            }
          }
            else
            {
              echo "0";
            }
            ?>
                  
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-------------------------------------------------------------------------->
    <!--------------------------------------- footer ----------------------------------------------------------->
   
    <?php 
include 'inc/footer.php'





?>