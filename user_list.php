<?php
include "inc/header.php";
include 'class/user_class.php';   
$users=new user;
$show=$users->show_user();
?>
<div class="admin-fix" style="width:100%;padding: 100px;">
<a href="register_admin.php"><button style="padding: 10px 20px; margin-bottom: 20px; cursor: pointer;">THÊM ADMIN</button></a>
    <table style="width:100%">
        <tr>
            <th>
                ID
            </th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Email</th>
            <th>User Name</th>
            <th>Mật Khẩu</th>
            <th>Vị Trí</th>
            <th>Chức Năng</th>
        </tr>
        <?php
        
        if($show){while($result=$show->fetch_assoc()){
         ?>
        <tr> 
        <td><?php echo $result['id']?></td>
        <td><?php echo $result['firstName']?></td>
        <td><?php echo $result['lastName']?></td>
        <td><?php echo $result['email']?></td>
        <td><?php echo $result['userName']?></td>
        <td><?php echo $result['password']?></td>
        <td><?php if($result['state']==1)
            {
                echo "Người Dùng";
            }
            else
            {
                echo "Admin";
            }
        ?></td>
        <td><a href="user_update.php?update_id=<?php echo $result['id']?>">sửa</a> |<a href="user_dele.php?dele_id=<?php echo $result['id']?>">xóa</a></td>
        </tr>
        <?php }}
        ?>
    </table>