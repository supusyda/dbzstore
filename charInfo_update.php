<?php
include "inc/header.php";
include "class/charInfo_add.php";
$charInfo=new charInfoAdd;
if (!isset($_GET[('id')])|| $_GET[('id')]==NULL) {
    echo "<script>window.location='category.php';</script>";
}
else
{
    $id = $_GET[('id')];
    $charInfo=new charInfoAdd;
    $char=$charInfo->get_char($id);
}

?>
<div class="admin" style="padding-top:100px">
    <!-- <div class="admin-charInfo-add ">
    <form action="" class="ngocanh" method="post" enctype="multipart/form-data">
        <div class="row"    style="flex-direction: column;   display: flex;
  justify-content: center;
  align-items: center" >
        <input type="hidden" name="id" value="<?php echo $id?>">
        <label  for="charName">Nhập tên nhân vật</label>
        <input required type="text" name="name" id="charName" placeholder="VD:Vegito" value="<?php echo $char['charName'] ?>">
        <label for="form">Nhập Form nhân vật</label>
        <input required type="text" name="form" id="form" placeholder="VD:Super Saiyan" value="<?php echo $char['form'] ?>">
        <label for="powerlevel">Nhập Powerlevel nhân vật</label>
        <input required type="text" name="powerlevel" id="powerle   vel" placeholder="10000000" value="<?php echo $char['powerlevel'] ?>">
        <label for="details">Nhập Details nhân vật</label>
        <textarea required type="text" name="details" id="details"  placeholder="1" cols='30' rows='10'><?php echo $char['details'] ?></textarea>
        <label for="history">Nhập History nhân vật</label>
        <textarea required type="text" name="history" id="history" placeholder="1" cols='30'  rows='10'><?php echo $char['history'] ?></textarea>
        <input required multiple type="file" name='img' value="<?php echo $char['img'] ?>">
        <input required multiple type="file" name='subImg[]'>
        </div>
        

        <button type="submit">Gui</button>
    </form> -->



    <div class="admin-charInfo-add">
        <form action="" class="ngocanh" method="post" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td>Nhập tên nhân vật</td>
                        <td>
                            <input required type="text" name="name" id="charName" placeholder="VD:Vegito" value="<?php echo $char['charName'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập Form nhân vật</td>
                        <td>
                            <input required type="text" name="form" id="form" placeholder="VD:Super Saiyan" value="<?php echo $char['form'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập Powerlevel nhân vật</td>
                        <td>
                            <input required type="text" name="powerlevel" id="powerlevel" placeholder="10000000" value="<?php echo $char['powerlevel'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập Details nhân vật</td>
                        <td>
                            <textarea required type="text" name="details" id="details"><?php echo $char['details'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập History nhân vật</td>
                        <td>
                            <textarea required type="text" name="history" id="history"><?php echo $char['history'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input required multiple type="file" name='img'>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input required multiple type="file" name='subImg[]'>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Gửi</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    </div>
</div>



<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$update_product=$charInfo->update_char($_POST,$_FILES);
echo "<script>window.location='charInfo_list.php';</script>";
}



?>