<?php
//session_start();
require_once('condbbook.php');
echo $_SESSION['ID'];
print_r($_POST);
$username = $_SESSION['Username'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo ('<br>');
echo $hashed_password;
echo ('<br>');
$sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $_SESSION["ID"] . "'"; // alt  + 96
$result = $conn->query($sql);
$row = $result->fetch_assoc();
print_r($row['User_Password']);
//$sqlUpdate = "UPDATE `user` SET `User_Password` = '" . $hashed_password . "'  WHERE `User_ID` = '" . $_SESSION['ID'] . "' ";

//UPDATE `user` SET `User_Password` = '5' WHERE `user`.`User_ID` = 10;
//$sevasql = $conn->query($sqlupdatephoto) or die($conn->error);

if (isset($_POST['submitUpdatepassword']) && isset($_SESSION['ID'])) {
    //echo 'มี';
    $sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $_SESSION["ID"] . "'"; // alt  + 96
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo ('<br>');
    print_r($row);
    echo ('<br>');

    if (password_verify($hashed_password, $row['User_Password'])) {




        //$result = $conn->query($sqlUpdate) or die($conn->error);

        if ($result) {
            //echo 'แก้ไข้ข้อมูลสำเร็จ';
            echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
            header('location:../index.php');
        } else {
            //echo 'ไม่สำเร็จ';
            echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ โปรดติดต่อเจ้าหน้าที่'); </script>";
            header('location:../index.php');
        }
    } else {
        echo "<script> alert('รหัสผ่านไม่ตรงกับอันเก่า'); </script>";
        //header('Refresh:0; url=../prodile_editpassword.php');
    }
} else {
    header('location:../index.php');
}