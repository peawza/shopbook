<?php
/*
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
$sqlUpdate = "UPDATE `user` SET `User_Password` = '" . $hashed_password . "'  WHERE `User_ID` = '" . $_SESSION['ID'] . "' ";

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
            //header('location:../index.php');
        } else {
            //echo 'ไม่สำเร็จ';
            echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ โปรดติดต่อเจ้าหน้าที่'); </script>";
            //header('location:../index.php');
        }
    } else {
        echo "<script> alert('รหัสผ่านไม่ตรงกับอันเก่า'); </script>";
        //header('Refresh:0; url=../prodile_editpassword.php');
    }
} else {
    header('location:../index.php');
}

*/
function Refresh($link)
{
    header('Refresh:0; url=../' . $link . '');
};
require_once('condbbook.php');
print_r($_POST);
//$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['submitUpdatepassword'])) {
    // echo '<pre>', print_r($_POST), '</pre>';

    // echo $username;
    //echo $password;

    //$username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE User_ID = ? ");
    $stmt->bind_param('s', $_SESSION['ID']); // s - string  i- int b - bol 
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    //echo '<pre>', print_r($row), '</pre>';
    if (!empty($row)) {
        if (password_verify($password, $row['User_Password'])) {
            echo "<script> alert('ผ่าน'); </script>";

            $hashed_password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE `user` SET `User_Password` = '" . $hashed_password . "'  WHERE `User_ID` = '" . $_SESSION['ID'] . "' ";

            $result = $conn->query($sqlUpdate) or die($conn->error);
            //echo ('บันทึกได้');
            //print_r($response);
            if ($result) {
                echo "<script> alert('สมัครสมาชิกสำเร็จ'); </script>";
                Refresh('prodile_editpassword.php');
                //header('Refresh:0; url=../login.php');

            } else {
                Refresh('prodile_editpassword.php');
                echo "<script> alert('สมัครสมาชิกล้มเหลว กรุณาติดต่อคนดูแลระบบ'); </script>";
            }
            //echo 'ok';
            // session_start();

            //header('location:../index.php');
        } else {
            //echo 'ล้มเหลว';
            echo "<script> alert('รหัสผ่านผิด'); </script>";

            // header('Refresh:0; url=../login.php');
        }
    } else {
        echo "<script> alert('ไม่พบ Username นี้ในระบบ'); </script>";
        //header('Refresh:0; url=../login.php');
        //header('location:../login.php');
    }
} else {
    echo ('ล้มเหลว');
    //header('location:../index.php');
}