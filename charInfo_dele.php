<?php 
include 'inc/header.php';
include 'class/charInfo_add.php';
$charInfo=new charInfoAdd();
if(!isset($_GET['id'])||$_GET['id']==NULL)
{
  echo "<script>window.location='charInfo_list.php';</script>";
  
}
else
{
  $charID=$_GET['id'];
  $deleInfo=$charInfo->delete_char($charID);
  
  echo "<script>window.location='charInfo_list.php';</script>";
}

?>