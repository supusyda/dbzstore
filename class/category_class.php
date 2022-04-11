<?php
include "lib/database.php";
?>
 
<?php
class cartegoty
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_cartegory($Name)
    {
        $query = "INSERT INTO tbl_danhmuc (Name) VALUES ('$Name')";
        $result = $this->db->insert($query);
        return $result;
    }
    public function correctID()
    {
        $query1 = "ALTER TABLE tbl_danhmuc DROP danhmuc_id";
        $query2 = "ALTER TABLE  tbl_danhmuc ADD `danhmuc_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
        $this->db->link->query($query1);
        $this->db->link->query($query2);
    }
    public function show_cartegory()
    {
        $query = "SELECT * FROM tbl_danhmuc ORDER BY danhmuc_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_cartegory($danhmuc_id)
    {
        $query = "SELECT * FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_cartegory($Name, $danhmuc_id)
    {
        $query = "UPDATE tbl_danhmuc SET Name = '$Name' WHERE danhmuc_id = '$danhmuc_id'";
        $result = $this->db->update($query);
        echo "<script>window.location='categorylist.php';</script>";
        return $result;
    }
    public function delete_cartegory($danhmuc_id)
    {
        $query = "DELETE  FROM tbl_danhmuc WHERE danhmuc_id = '$danhmuc_id'";
        $result = $this->db->delete($query);

        if ($result) {
            $alert = "<span class = 'alert-style'> Delete Thành công</span> ";
            return $alert;
        } else {
            $alert = "<span class = 'alert-style'> Delete Thất bại</span>";
            return $alert;
        }
    }
}

?>
