<?php
require_once('connect.php');

if (isset($_POST['submitUpdateUser']) && isset($_SESSION['ID'])) {
    //echo 'มี';
    $sqlUpdate = "UPDATE `user` SET 
    `User_Firstname` = '" . $_POST['fname'] . "' ,
    `User_Lastname` = '" . $_POST['lname'] . "' ,
    `User_Telephonenumber` = '" . $_POST['phone'] . "',
    `User_Email` = '" . $_POST['email'] . "'     
    WHERE `user`.`User_ID` = '" . $_SESSION['ID'] . "'";

    $result = $conn->query($sqlUpdate) or die($conn->error);

    if ($result) {
        //echo 'แก้ไข้ข้อมูลสำเร็จ';
        echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
        header('Refresh:0; url=../profile.php');
    } else {
        //echo 'ไม่สำเร็จ';
        echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
        header('Refresh:0; url=../profile.php');
    }
} else {
    header('location:../index.php');
}
//echo '<pre>', print_r($_POST), '</pre>';

//echo $_SESSION['ID'];