<?php
require_once('condbbook.php');



if (isset($_GET['Ordersales_ID'])) {
    $totalBalance = 0;

    $Ordersales_ID = $_GET['Ordersales_ID'];

    $sqlselectOrdersales = "SELECT * FROM `ordersalesdetail` WHERE `ordersalesDetail_ID` = '" . $Ordersales_ID . "'";
    $resultselectOrdersales = $conn->query($sqlselectOrdersales);


    while ($rowselectOrdersales = mysqli_fetch_array($resultselectOrdersales)) {

        $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $rowselectOrdersales['product_ID'] . "'");
        $resultselectproduct = $conn->query($sqlselectproduct);
        $rowselectproduct = $resultselectproduct->fetch_assoc();

        $totalBalance = $rowselectproduct['Product_Balance'] + $rowselectOrdersales['ordersalesDetail_unit'];

        $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $rowselectOrdersales['product_ID'] . "';");
        $resultupdateproduct = $conn->query($sqlupdateproduct);
    }



    $sqldelete = "DELETE FROM `ordersales` WHERE `Ordersales_ID`= '" . $Ordersales_ID . "'";
    if ($conn->query($sqldelete) === TRUE) {

        header('Refresh:0; url=../oderproduct.php');
    } else {

        header('Refresh:0; url=../oderproduct.php');
    }
}


if (isset($_GET['Order_ID'])) {
    $totalBalance = 0;

    $Ordersales_ID = $_GET['Order_ID'];

    $sqlselectOrdersales = "SELECT * FROM `ordersalesdetail` WHERE `ordersalesDetail_ID` = '" . $Ordersales_ID . "'";
    $resultselectOrdersales = $conn->query($sqlselectOrdersales);


    while ($rowselectOrdersales = mysqli_fetch_array($resultselectOrdersales)) {

        $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $rowselectOrdersales['product_ID'] . "'");
        $resultselectproduct = $conn->query($sqlselectproduct);
        $rowselectproduct = $resultselectproduct->fetch_assoc();

        $totalBalance = $rowselectproduct['Product_Balance'] + $rowselectOrdersales['ordersalesDetail_unit'];

        $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $rowselectOrdersales['product_ID'] . "';");
        $resultupdateproduct = $conn->query($sqlupdateproduct);
    }



    $sqldelete = "DELETE FROM `ordersales` WHERE `Ordersales_ID`= '" . $Ordersales_ID . "'";
    if ($conn->query($sqldelete) === TRUE) {

        header('Refresh:0; url=..//oderproductuser.php');
    } else {

        header('Refresh:0; url=..//oderproductuser.php');
    }
}


if (isset($_GET['product_ID'])) {

    $product_ID = $_GET['product_ID'];




    $sqldelete = "DELETE FROM `product` WHERE `product`.`Product_ID` = '" . $product_ID . "'";
    if ($conn->query($sqldelete) === TRUE) {
        echo "<script> alert('ลบข้อมูลสำเร็จ'); </script>";

        header('Refresh:0; url=../product.php');
    } else {

        echo "<script> alert('Error deleting record'); </script>";
        header('Refresh:0; url=../product.php');
    }
}


if (isset($_GET['Warranty_ID'])) {

    $sqldeletecolumn = $_GET['Warranty_ID'];




    $sqldelete = "DELETE FROM `warranty` WHERE `warranty`.`Warranty_ID` = '" . $sqldeletecolumn . "'";
    if ($conn->query($sqldelete) === TRUE) {

        header('Refresh:0; url=../warranty.php');
    } else {

        header('Refresh:0; url=../warranty.php');
    }
}
