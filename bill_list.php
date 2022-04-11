<?php
include "inc/header.php";
include "class/bienlai_class.php";


$bill=new bienlai;
$showAll=$bill->show_bienlai_all();


?>


<div class="admin_charInfo" >
            <table>
              <tr>
                <th>Họ Tên</th>
                <th>Thời Gian Mua</th>
                <th>Tổng Sản Phẩm</th>
                <th>Tổng Tiền</th>
                <th>Địa Chỉ</th>
                <th>Phone</th>
                <th>User Name</th>
                <th>Trạng Thái</th>
                <th>Duyệt</th>
                <th>Xóa</th>




              </tr>
              <?php if($showAll){while($result=$showAll->fetch_assoc()){?>
              <tr>                

                <td><?php echo $result['fullname'] ?></td>
                <td><?php echo $result['time'] ?></td>
                <td><?php echo $result['tongsanpham'] ?></td>
                <td><p><?php echo $result['tongtien'] ?></p></td>
                <td><p><?php echo $result['diachi'] ?></p></td>
                <td><p><?php echo $result['phoneNumber'] ?></p></td>
                <td><p><?php echo $result['username'] ?></p></td>
                <?php if($result['trangthai']==1){
                  echo '<td><p> ĐANG ĐỢI DUYỆT </p></td>';
                
                
                } 
                else
                {
                  echo '<td><p style="color:green;font-weight: bold;"> ĐÃ ĐƯỢC DUYỆT </p></td>';
                  
                }?>
               




                <td><span><a href="bill_chapnhan.php?id=<?php echo $result['id'] ?>"> <i class="fa fa-check-square"></i></a></span></td>
                <td><span><a href="bill_tuchoi.php?id=<?php echo $result['id'] ?>"><i class="fa fa-repeat"></i></a></span></td>
              </tr>
              <?php }} ?>
      </div>






