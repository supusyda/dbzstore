<?php
include "inc/header.php";
if(isset($_GET['cartid']))
{
    unset($_SESSION['giohang'][$_GET['cartid']]);
    echo "<script>window.location='cart.php';</script>";
}

?>