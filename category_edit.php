<?php
    include "inc/header.php";
    if(!isset($_GET['update_id'])||$_GET['update_id']==NULL)
{
  echo "<script>window.location='categorylist.php';</script>";
  
}
else
{
  $update_id=$_GET['update_id'];
}
  
?>
<div class="admin" style="padding-top:100px">
    <div class="admin-category-add">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">dien ten danh muc :id</label>
        <input type="hidden" name="id" id="" value="<?php echo $update_id;?>" />
        <?php echo $update_id;?>
        <input type="text" name="danhmuc_name" id="">
        <button type="submit" >Gui</button>
    </form>
    </div>
</div>


<?php
$cate=new cartegoty;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['danhmuc_name'];
    $id=$_POST['id'];
    $update=$cate->update_cartegory($name,$id);
}

?>