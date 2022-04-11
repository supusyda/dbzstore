<?php
    include "inc/header.php";
    if(!isset($_GET['dele_id'])||$_GET['dele_id']==NULL)
{
  echo "<script>window.location='categorylist.php';</script>";
  
}
else
{
  $dele_id=$_GET['dele_id'];
  $cate=new cartegoty;
  $dele=$cate->delete_cartegory($dele_id);
  echo "<script>window.location='categorylist.php';</script>";
}
  
