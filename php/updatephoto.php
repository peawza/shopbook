<?php
require_once('condbbook.php');


if (isset($_POST['submitphoto'])) {


    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);

    $url = '../img/profile/' . $newname;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
        $sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $_SESSION["ID"] . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $delete = $row['User_Photo'];
        $b = "..\img\profile\ " . $delete;
        $deetefile = preg_replace("[ ]", "", $b);

        if ($row['User_Photo'] == 'profile.png') {
        } else {
            unlink($deetefile);
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
    print_r($_FILES['file']);
    echo '</pre>';

    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);

    $url = '../img/product/' . $newname;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
        $sql = "SELECT * FROM `product` WHERE `Product_ID`= '" . $_POST['idproductphoto'] . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $delete = $row['Product_Photo'];
        $b = "..\img\product\ " . $delete;
        $deetefile = preg_replace("[ ]", "", $b);


        if (unlink($deetefile)) {
        } else {
            echo 'ไม่เจอ';
        }



        $sqlupdatephoto = "UPDATE `product` SET `Product_Photo` = '" . $newname . "' WHERE `product`.`Product_ID` = '" . $_POST['idproductphoto'] . "'";
        $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);


        header('location:../product.php');
    } else {
        echo 'ไม่มีการอัพเดทข้อมูล';
    }
}