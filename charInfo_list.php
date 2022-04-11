<?php
include "inc/header.php";
include 'class/charInfo_add.php';
$charInfo = new charInfoAdd;
$show = $charInfo->show_chars_page();


?>


<div class="admin_charInfo">
  <table>
    <tr>
      <th>Hình Nhân Vật</th>
      <th>Tên </th>
      <th>Hình dạng</th>
      <th>Giá</th>
      <th>Chi Tiết</th>
      <th>Lịch sử</th>
      <th>Xóa</th>
      <th>Sửa</th>
    </tr>
    <?php if ($show) {
      while ($result = $show->fetch_assoc()) { ?>
        <tr>

          <td><img src="upload/<?php echo $result['img'] ?>" alt="" /></td>
          <td><?php echo $result['charName'] ?></td>
          <td><?php echo $result['form'] ?></td>
          <td><?php echo $result['powerlevel'] ?></td>
          <td>
            <p><?php echo $result['details'] ?></p>
          </td>
          <td>
            <p><?php echo $result['history'] ?></p>
          </td>
          <td><span><a href="charInfo_dele.php?id=<?php echo $result['id'] ?>"> X</a></span></td>
          <td><span><a href="charInfo_update.php?id=<?php echo $result['id'] ?>"><i class="fa fa-repeat"></i></a></span></td>
        </tr>
    <?php }
    } ?>
</div>



<div class="other">
  <a href="charInfo_add.php"><button style="padding: 6px 3px; cursor: pointer;"> Thêm nhân vật</button></a>
  <div class="categories-right-toe row">

    <div class="shownum-left">
      <!-- <p>Now on Page 2 <span>|</span> 4</p> -->
    </div>
    <div class="pageNum-right">
      <p>
        <?php
        $result = $charInfo->show_chars();
        $char_num = mysqli_num_rows($result);
        $page_num = ceil($char_num / 6);


        for ($i = 1; $i <= $page_num; $i++) { ?>

          <a href="charInfo_list.php?currentPage=<?php echo $i ?>"><span><?php echo $i ?></span></a>
        <?php
        }
        ?>

      </p>
    </div>
  </div>


</div>