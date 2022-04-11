<?php  
include "inc/header.php";
include "class/bienlai_class.php";
if(isset($_GET['id']))
{
    $bienlai=new bienlai;
    $showbill=$bienlai->update_bienlai($_GET['id']);
    
}



?>