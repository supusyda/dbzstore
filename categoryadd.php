<?php
    include "inc/header.php";
    
  
?>
<div class="admin" style="padding-top:100px">
    <div class="admin-category-add">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">dien ten danh muc</label>
        <input type="text" name="name" id="">
        <button type="submit" >Gui</button>
    </form>
    </div>
</div>


<?php
$cate=new cartegoty;
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['name'];
    $insert=$cate->insert_cartegory($name);
    echo "<script>window.location='categorylist.php';</script>";
}

?>