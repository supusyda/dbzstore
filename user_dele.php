<?php
include "inc/header.php";
include 'class/user_class.php';   
$users=new user;
if(isset($_GET['dele_id']))
{
    $users->delete_user($_GET['dele_id']);
    echo "<script>window.location='user_list.php';</script>";
}
?>