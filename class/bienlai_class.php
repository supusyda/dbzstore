
<?php
class bienlai
{
 
   private $db;
 
   public function __construct()
   {
       $this ->db = new Database();
   }
 
   public function insert_bienlai($InfoBienlai){
        $fullname=$InfoBienlai['fullName'];
        $tongsanpham=$InfoBienlai['tongsanpham'];
        $tongtien=$InfoBienlai['tongtien'];
        $diachi=$InfoBienlai['address'];
        $username=$InfoBienlai['username'];
        $phoneNumber=$InfoBienlai['phoneNumber'];
        $time=$InfoBienlai['time'];

        $query = "INSERT INTO `tbl_bienlai`(`fullname`, `time`, `tongsanpham`, `tongtien`, `diachi`, `phoneNumber`, `username`) VALUES ('$fullname','$time','$tongsanpham','$tongtien','$diachi','$phoneNumber','$username')";
        $result = $this ->db ->insert($query);
        $query="SELECT * FROM tbl_bienlai ORDER BY id DESC LIMIT 1";
        $lastID=$this ->db->select($query)->fetch_assoc();

            return $lastID['id'];   
       }
 public function show_bienlai($username){
       $query = "SELECT * FROM tbl_bienlai WHERE `username`='$username' ORDER BY id  DESC ";
       $result = $this -> db ->select($query);
       return $result;
   }
   public function show_bienlai_id($id){
    $query = "SELECT * FROM tbl_bienlai WHERE `id`='$id'";
    $result = $this -> db ->select($query);
    return $result;
}
   public function show_bienlai_all(){
    $query = "SELECT * FROM tbl_bienlai ORDER BY id  DESC ";
    $result = $this -> db ->select($query);
    return $result;
}

   public function update_bienlai($id) {
               $query = "UPDATE tbl_bienlai SET trangthai = '2' WHERE id = '$id'";
               $result = $this ->db ->update($query);
               echo "<script>window.location='bill_list.php';</script>";
               return $result;
               
    
 
   }
   public function delete_cartegory($id){
       $query = "DELETE  FROM tbl_bienlai WHERE id = '$id'";
      
        $result = $this -> db ->delete($query);
       if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
       else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
     
 
   }
 
   }
 
?>
