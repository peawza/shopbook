<?php

function Refresh($link)
{
    header('Refresh:0; url=../' . $link . '');
};
require_once('condbbook.php');

$password = $_POST['password'];

if (isset($_POST['submitUpdatepassword'])) {

    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE User_ID = ? ");
    $stmt->bind_param('s', $_SESSION['ID']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!empty($row)) {
        if (password_verify($password, $row['User_Password'])) {


            $hashed_password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE `user` SET `User_Password` = '" . $hashed_password . "'  WHERE `User_ID` = '" . $_SESSION['ID'] . "' ";

            $result = $conn->query($sqlUpdate) or die($conn->error);

            if ($result) {
                echo "<script> alert('แก้ไขรหัสผ่านสำเร็จ'); </script>";
                Refresh('prodile_editpassword.php');
            } else {
                Refresh('prodile_editpassword.php');
                echo "<script> alert('แก้ไขรหัสไม่ผ่านสำเร็จ' กรุณาติดต่อคนดูแลระบบ'); </script>";
            }
        } else {

            echo "<script> alert('รหัสผ่านผิด'); </script>";

            Refresh('prodile_editpassword.php');
        }
    } else {
        echo "<script> alert('ไม่พบ Username นี้ในระบบ'); </script>";
    }
} else {

    header('location:../index.php');
}
