<?php
require_once('condbbook.php');



$UserID = ($_GET["user"]);



if (isset($_POST['submitUpdate'])) {

    $sqlUpdate = "UPDATE `user` SET 
            `User_Type` = '" . $_POST['Userlevel'] . "' 
                
            WHERE `user`.`User_ID` = '" . $UserID . "'";

    $result = $conn->query($sqlUpdate) or die($conn->error);

    if ($result) {

        echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
        header('Refresh:0; url=../manageuser.php');
    } else {

        echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
        header('Refresh:0; url=../manageuser.php');
    }
} else {
    echo 'ไม่เข้า';
    header('location:../index.php');
}