
<?php
class user
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function checkUsedName($username)
    {
        $query = "SELECT userName FROM tbl_user WHERE userName='$username'";
        $result = $this->db->select($query);
        if ($result) {
            echo "<script>alert('User Name already exists ')</script>";
            return true;
        } else {
            return false;
        }
    }
    public function  insert_user($userInfo)
    {
        $lastName = $userInfo['lastName'];
        $firstName = $userInfo['firstName'];
        $email = $userInfo['email'];
        $password = $userInfo['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $userName = $userInfo['userName'];
        $state = $userInfo['state'];
        $query = "INSERT INTO `tbl_user`(`firstName`, `lastName`, `email`, `userName`, `password`, `state`) VALUES ('$lastName','$firstName','$email','$userName','$hashed_password',$state)";
        $result = $this->db->insert($query);
        return $result;
    }
    public function correctID()
    {
        $query1 = "ALTER TABLE tbl_user DROP id";
        $query2 = "ALTER TABLE  tbl_user ADD `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
        $this->db->link->query($query1);
        $this->db->link->query($query2);
    }
    public function show_user()
    {
        $query = "SELECT * FROM tbl_user ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_user($userName, $password)
    {
        $query1 = "SELECT * FROM `tbl_user` WHERE userName='$userName'";
        $result1 = $this->db->link->query($query1);
        $pass = $result1->fetch_assoc();

        if (password_verify($password, $pass['password'])); {
            return $pass;
        }
    }
    public function changePass($email, $pass)
    {   $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
        $query1 = "UPDATE `tbl_user` SET `password`='$hashed_password' WHERE `email` = '$email'";
        $this->db->link->query($query1);
    }
    public function get_user_id($id)
    {
        $query1 = "SELECT * FROM `tbl_user` WHERE id='$id'";
        $result1 = $this->db->link->query($query1);
        $pass = $result1->fetch_assoc();

        return $pass;
    }
    public function update_user($userInfo)
    {
        if (isset($userInfo['password'])) {
            $lastName = $userInfo['lastName'];
            $firstName = $userInfo['firstName'];
            $email = $userInfo['email'];
            $password = $userInfo['password'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $userName = $userInfo['userName'];
            $state = $userInfo['state'];
            $id = $userInfo['id'];

            $query = "UPDATE `tbl_user` SET `firstName`='$firstName',`lastName`='$lastName',`email`='$email',`userName`='$userName',`password`='$hashed_password',`state`='$state' WHERE id='$id'";
            $result = $this->db->update($query);

            return $result;
        } else {
            $lastName = $userInfo['lastName'];
            $firstName = $userInfo['firstName'];
            $email = $userInfo['email'];
            $userName = $userInfo['userName'];
            $state = $userInfo['state'];
            $id = $userInfo['id'];
            $query = "UPDATE `tbl_user` SET `firstName`='$firstName',`lastName`='$lastName',`email`='$email',`userName`='$userName',`state`='$state' WHERE id='$id'";
            $result = $this->db->update($query);

            return $result;
        }
    }
    public function delete_user($id)
    {

        $query = "DELETE  FROM tbl_user WHERE id = '$id'";
        $result = $this->db->delete($query);

        $this->correctID();
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