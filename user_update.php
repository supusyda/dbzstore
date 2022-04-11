<?php

include 'inc/header.php'; 
include 'class/user_class.php';   
if(isset($_GET['update_id']))
{
    $id=$_GET['update_id'];
    $user=new user;
    $getuser=$user->get_user_id($id);
}

?>
<body>
    <div id="wrapper ">
      <div class="con aspect-ratio-169">
       
      </div>
      <div class="cc">
        <form action="" class="form-register" method="post">
          <h1 class="form-heading">Update CHO User</h1>
          <div class="form-group">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input required type="text" class="form-controlinput" placeholder="Họ" name="lastName" value="<?php echo $getuser['lastName'] 
             ?>"/>
          </div>
          <div class="form-group">
            <i class="far fa-user"></i>
            <input required type="text" class="form-input" placeholder="Tên" name="firstName"  value="<?php echo $getuser['firstName']  ?>"/>
          </div>
          <div class="form-group">
            <i class="far fa-user"></i>
            <input required type="text" class="form-input" placeholder="UserName" name="userName" value="<?php echo $getuser['userName']  ?>"/>
          </div>
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input required type="email" class="form-input" placeholder="Email" name="email" value="<?php echo $getuser['email']  ?>"/>
          </div>
          <div class="form-group form-group-1">
            <i class="fas fa-key"></i>
            <input  type="password" class="form-input" placeholder="Để Trống nếu không thay đổi mật khẩu" name="password"/>
            <div id="eye">
              <i class="far fa-eye"></i>
            </div>
          </div>
          <div class="form-group form-group-1">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input 
              type="password"
              class="form-input"
              placeholder="Để Trống nếu không thay đổi mật khẩu" 
              name="rePass"
            />
            <div id="eye">
              <i class="far fa-eye"></i>
            </div>
          </div>
          <?php if( $getuser['state']==1)
          {
            
           ?>
          
          <label for="2" style="color:azure">Admin</label>
          <input required type="radio" name="state" value="2" class="2">
          <label for="1" style="color:azure">User</label>
          <input required type="radio" name="state" value="1" class="1" checked="checked">
          <?php }
          else if( $getuser['state']==2)
          {

          
          
          ?> 
          <label for="2" style="color:azure">Admin</label>
          <input required type="radio" name="state" value="2" class="2" checked="checked">
          <label for="1" style="color:azure">User</label>
          <input required type="radio" name="state" value="1" class="1">

              <?php } ?>



          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" value="UPDATE" class="form-submit" />
        </form>
      </div>
    </div>
  </body>

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $lastName=$_POST['lastName'];
  $firstName=$_POST['firstName'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $userName=$_POST['userName'];
  $rePass=$_POST['rePass'];
  if($rePass===$password)
  { 
    $user=new user;
    $update=$user->update_user($_POST);
    echo "<script>window.location='user_list.php';</script>";
  }
  else
  {
    echo "Update Fail";
  }
  

}
else{
  echo "Update Fail";
}


?>
