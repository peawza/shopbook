<?php
//echo '<pre>', print_r($_POST), '</pre>';
//echo $_POST['typeproduct'];

require_once('connect.php');
$sqlinsert = "INSERT INTO `producttype` (`Type_Name`) VALUES ('" . $_POST['typeproduct'] . "');";
function Refresh($link)
{
    header('Refresh:0; url=../' . $link . '');
};

$result = $conn->query($sqlinsert) or die($conn->error);
if ($result) {
    Refresh('typeproduct.php');
    //header('Refresh:0; url=../login.php');
    echo "<script> alert('บันทึกประเภทสินค้าสำเร็จ'); </script>";
} else {
    echo "<script> alert('บันทึกประเภทสินค้าล้มเหลว กรุณาติดต่อคนดูแลระบบ'); </script>";
    Refresh('typeproduct.php');
}