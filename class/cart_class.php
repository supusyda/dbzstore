
<?php
class cart
{
 
   private $db;
 
   public function __construct()
   {
       $this ->db = new Database();
   }
 
   public function insert_cart($bill_id){
       for($i=0; $i<sizeof($_SESSION['giohang']); $i++){
        $img=$_SESSION['giohang'][$i][0];
        $charName=$_SESSION['giohang'][$i][1];
        
        $soluong=$_SESSION['giohang'][$i][4];
        $powerlevel=$_SESSION['giohang'][$i][3]*$soluong;
        $query = "INSERT INTO `tbl_cart`(`id_bill`, `charName`, `soluong`, `powerlevel`, `img`) VALUES ('$bill_id','$charName','$soluong','$powerlevel','$img')";
            $result = $this ->db ->insert($query);
       }
       
            
            return $result;   
       }
 
 public function show_cart($bill_id){
       $query = "SELECT * FROM tbl_cart WHERE id_bill='$bill_id'";
       $result = $this -> db ->select($query);
      return $result;
       
   }

   }
 
?>
