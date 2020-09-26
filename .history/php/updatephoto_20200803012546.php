<?php
require_once('connect.php');


if (isset($_POST['submitphoto'])) {
    //echo '<pre>';
    //print_r($_POST);
    //print_r($_FILES['file']); // ชื่อ NAME ใน HTML
    //echo '</pre>';

    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);
    //print_r($newname);
    $url = '../img/profile/' . $newname;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
        $sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $_SESSION["ID"] . "'"; // alt  + 96
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        //echo '<pre>';
        //echo $result->num_rows;
        //print_r($row);
        //echo $row['User_Photo'];
        //echo '</pre>';
        $delete = $row['User_Photo'];
        $b = "..\img\profile\ " . $delete; // เร็วกว่า        
        $deetefile = preg_replace("[ ]", "", $b); // ถ้าเจอวรรคลบออก
        //echo $deetefile;

        if ($row['User_Photo'] == 'profile.png') {
            //echo 'ไม่ลบ profile.png';
        } else {
            unlink($deetefile);
            //echo 'ลบ';        
        }

        $sqlupdatephoto = "UPDATE `user` SET `User_Photo` = '" . $newname . "' WHERE `user`.`User_ID` = '" . $_SESSION['ID'] . "'";
        $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);
        $_SESSION['Photo'] = $newname;

        header('location:../index.php');
    } else {
        echo 'ไม่มีการอัพเดทข้อมูล';
    }
}

if (isset($_POST['submitphotoproduct'])) {
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES['file']); // ชื่อ NAME ใน HTML
    echo '</pre>';

    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);
    //print_r($newname);
    $url = '../img/product/' . $newname; // ย้ายไฟล
    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
        $sql = "SELECT * FROM `product` WHERE `Product_ID`= '" . $_POST['idproductphoto'] . "'"; // alt  + 96
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        //echo '<pre>';
        //echo $result->num_rows;
        //print_r($row);
        //echo $row['User_Photo'];
        //echo '</pre>';
        $delete = $row['Product_Photo'];
        $b = "..\img\product\ " . $delete; // เร็วกว่า      //อย่าเปลี่ยนชื่อไฟล   
        $deetefile = preg_replace("[ ]", "", $b); // ถ้าเจอวรรคลบออก
        //echo $deetefile;

        if (unlink($deetefile)) {
            // echo ("deleted $deetefile");
            //unlink($deetefile);
        } else {
            echo 'ไม่เจอ';
        }


        //if ($row['User_Photo'] == 'profile.png') {
        //echo 'ไม่ลบ profile.png';
        //} else {
        //   unlink($deetefile);
        //unlink($deetefile);
        //echo 'ลบ';        
        //}

        $sqlupdatephoto = "UPDATE `product` SET `Product_Photo` = '" . $newname . "' WHERE `product`.`Product_ID` = '" . $_POST['idproductphoto'] . "'";
        $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);
        //$_SESSION['Photo'] = $newname;

        header('location:../product.php');
    } else {
        echo 'ไม่มีการอัพเดทข้อมูล';
    }
}