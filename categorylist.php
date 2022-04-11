<?php
include "inc/header.php";
$category=new cartegoty();
$show=$category->show_cartegory();
include 'class/charInfo_add.php';
?>

<div class="admin-fix" style="width:100%;padding: 100px;">
    <table style="width:100%">
        <tr>
            <th>
                id
            </th>
            <th>name</th>

        </tr>
        <?php
        if($show){while($result=$show->fetch_assoc()){
            
         ?>
        <tr>
        <td><?php echo $result['danhmuc_id']?></td>
        <td><?php echo $result['Name']?></td>
        <td><a href="category_edit.php?update_id=<?php echo $result['danhmuc_id']?>">sửa</a> |<a href="category_dele.php?dele_id=<?php echo $result['danhmuc_id']?>">xóa</a></td>
        </tr>
        <?php }}
        ?>
    </table>
    <a href="categoryadd.php"><button>addCategory</button></a>
</div>












