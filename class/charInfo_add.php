
<?php

use function PHPSTORM_META\map;

class charInfoAdd
{
 
   private $db;
   public function __construct()
   {
       $this ->db = new Database();
   }
   public function insert_char($Info,$Info_file){
    $name= $Info['name'];
    $form =$Info['form'];
    $powerlevel =$Info['powerlevel'];
    $details =$Info['details'];
    $history =$Info['history'];
    $img=$Info_file['img']['name'];
    move_uploaded_file($Info_file['img']['tmp_name'],"upload/".$Info_file['img']['name']);
    $tempSubImg=$Info_file['subImg']['tmp_name'];
    $query = "INSERT INTO `tbl_nhanvat` (`charName`, `form`, `powerlevel`, `details`, `history`, `img`) VALUES ('$name', '$form', '$powerlevel','$details', '$history', '$img');";
    $result = $this ->db ->insert($query);
    if($result)
    {
        $query="SELECT * FROM `tbl_nhanvat` ORDER BY id DESC LIMIT 1;";
        $kq=$this -> db ->select($query)->fetch_assoc();
        $subImg=$Info_file['subImg']['name'];
        $charId=$kq['id'];
        foreach($subImg as $key=>$val)
        {   echo $key;
            $query="INSERT INTO `tbl_nhanvat_sub_img`(`img`, `sub_img1`) VALUES ('$img','$val')";
            $kq=$this -> db ->insert($query);
            move_uploaded_file($tempSubImg[$key],"upload/".$val);
        }        
    }
    return $result;   
       }
       public function correctID()  
       {  $query1="ALTER TABLE tbl_nhanvat DROP id";
          $query2= "ALTER TABLE  tbl_nhanvat ADD `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
          $this -> db ->link->query($query1); 
          $this -> db ->link->query($query2); 
       }     
       //VÀO BÌNH THƯỜNG////////////////////////////////////////////////
 public function show_chars(){
       $query = "SELECT * FROM tbl_nhanvat ORDER BY id DESC";
       $result = $this -> db ->select($query);
       return $result;
   }
   public function show_chars_page()
   {    if(!isset($_GET['currentPage']))
    {   
        $currentPage=1;
    }
    else{
        $currentPage=$_GET['currentPage'];
    }  
     $currentPage=($currentPage-1)*6;
       $query="SELECT * FROM `tbl_nhanvat` ORDER BY id DESC LIMIT $currentPage,6";
       $result = $this -> db ->select($query);
       return $result;
   }
   //VÀO BẰNG THANH TÌM KIẾM 
   public function show_chars_search_num($searchContent){
    $query = "SELECT * FROM tbl_nhanvat WHERE charName LIKE '%$searchContent%' ORDER BY id DESC";
    $result = $this -> db ->select($query);
    return $result;
}
   public function show_chars_search($searchContent){
    if(!isset($_GET['currentPage']))
    {   
        $currentPage=1;
    }
    else{
        $currentPage=$_GET['currentPage'];
    }  
     $currentPage=($currentPage-1)*6;
    $query = "SELECT * FROM tbl_nhanvat WHERE charName LIKE '%$searchContent%' ORDER BY id DESC LIMIT $currentPage,6";
    $result = $this -> db ->select($query);
    return $result;
}
   //VÀO BẰNG CATEGORY Ở HEADER ////////////////////////////////
   public function show_chars_category_num($cateID){
    $query = "SELECT * FROM tbl_nhanvat WHERE category='$cateID' ORDER BY id DESC";
    $result = $this -> db ->select($query);
    return $result;
}
   public function show_chars_category($cateID){
    if(!isset($_GET['currentPage']))
    {   
        $currentPage=1;
    }
    else{
        $currentPage=$_GET['currentPage'];
    }  
     $currentPage=($currentPage-1)*6;
    $query = "SELECT * FROM tbl_nhanvat WHERE category='$cateID' ORDER BY id DESC LIMIT $currentPage,6";
    $result = $this -> db ->select($query);
    return $result;
}




   ///////////////////////////////////////////////////
   public function get_char($id){
       $query = "SELECT * FROM tbl_nhanvat WHERE id = '$id'";
       $result = $this -> db ->select($query)->fetch_assoc();
       return $result;
   }
   public function update_char($Info,$Info_file) {
    $id=$Info['id'];
    $name= $Info['name'];
    $form =$Info['form'];
    $powerlevel =$Info['powerlevel'];
    $details =$Info['details'];
    $history =$Info['history'];
    $img=$Info_file['img']['name'];
    move_uploaded_file($Info_file['img']['tmp_name'],"upload/".$Info_file['img']['name']);
    $tempSubImg=$Info_file['subImg']['tmp_name'];
    $query = "UPDATE `tbl_nhanvat` SET `id`='$id',`charName`='$name',`form`='$form',`powerlevel`='$powerlevel',`details`='$details',`history`='$history',`img`='$img',`category`='' WHERE id='$id'";
    $result = $this ->db ->update($query);

if($result)
    {
        $query1 = "SELECT * FROM `tbl_nhanvat_sub_img` WHERE img='$img'";
        $select=$this -> db ->link->query($query1);
        while($kq=$select->fetch_assoc())
        {   
            unlink('upload/'.$kq['sub_img1']);
        }
        $query2="DELETE FROM `tbl_nhanvat_sub_img` WHERE img='$img'";
        $kq2=$this -> db ->link->query($query2);
        $subImg=$Info_file['subImg']['name'];
        foreach($subImg as $key=>$val)
        {   echo $key;
            $query="INSERT INTO `tbl_nhanvat_sub_img`(`img`, `sub_img1`) VALUES ('$img','$val')";
            $kq=$this -> db ->insert($query);
            move_uploaded_file($tempSubImg[$key],"upload/".$val);
        }
    }
    header('Location:charInfo_list.php');
    return $result;
   }
   public function delete_char($id){
       $query0="SELECT * FROM `tbl_nhanvat` WHERE id='$id'";

       $result0=$this ->db ->select($query0)->fetch_assoc();
        $img=$result0['img'];
       unlink('upload/'.$result0['img']);

       $query = "DELETE  FROM tbl_nhanvat WHERE id = '$id'";

       $result = $this -> db ->delete($query);
       $oldID=$id;
       $this ->correctID();
       if($result) {
        $alert = "<span class = 'alert-style'> Delete Thành công</span> ";
        $query1 = "SELECT * FROM `tbl_nhanvat_sub_img` WHERE img='$img'";
        $select=$this -> db ->select($query1);
        while($kq=$select->fetch_assoc())
        {   unlink('upload/'.$kq['sub_img1']);
        }
        $query2="DELETE FROM `tbl_nhanvat_sub_img` WHERE img='$img'";
        $kq1=$this -> db ->link->query($query2);

         return $alert;}
       else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}
     
 
   }
 
   }
 
?>
