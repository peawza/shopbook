<?php
require_once('condbbook.php');

if (isset($_POST['submitUpdateUser']) && isset($_SESSION['ID'])) {

    $sqlUpdate = "UPDATE `user` SET 
    `User_Firstname` = '" . $_POST['fname'] . "' ,
    `User_Lastname` = '" . $_POST['lname'] . "' ,
    `User_Telephonenumber` = '" . $_POST['phone'] . "',
    `User_Email` = '" . $_POST['email'] . "'     
    WHERE `user`.`User_ID` = '" . $_SESSION['ID'] . "'";

    $result = $conn->query($sqlUpdate) or die($conn->error);

    if ($result) {

        echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
        header('Refresh:0; url=../profile.php');
    } else {

        echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
        header('Refresh:0; url=../profile.php');
    }
} else {
    header('location:../index.php');
}
