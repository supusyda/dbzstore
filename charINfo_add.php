<?php
include "inc/header.php";
include "class/charInfo_add.php";
$charInfo = new charInfoAdd;



?>

<div class="admin" style="padding-top:100px">
    <div class="admin-charInfo-add">
        <form action="" class="ngocanh" method="post" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td>Nhập tên nhân vật</td>
                        <td>
                            <input required type="text" name="name" id="charName" placeholder="VD:Vegito">
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập Form nhân vật</td>
                        <td>
                            <input required type="text" name="form" id="form" placeholder="VD:Super Saiyan">
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập Powerlevel nhân vật</td>
                        <td>
                            <input required type="text" name="powerlevel" id="powerlevel" placeholder="10000000">
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập Details nhân vật</td>
                        <td>
                            <textarea required type="text" name="details" id="details"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Nhập History nhân vật</td>
                        <td>
                            <textarea required type="text" name="history" id="history"></textarea>
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

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insert_product = $charInfo->insert_char($_POST, $_FILES);
    echo "<script>window.location='charInfo_list.php';</script>";
}

?>