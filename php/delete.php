<?php
require_once('connect.php');


/*
$sqldelete = "DELETE FROM `producttype` WHERE `producttype`.`Type_ID` = '" . $Type_ID . "'";
if ($conn->query($sqldelete) === TRUE) {
    //echo "Record deleted successfully";
    header('Refresh:0; url=../typeproduct.php');
} else {
    //echo "Error deleting record: " . $conn->error;
    header('Refresh:0; url=../typeproduct.php');
}*/

if (isset($_GET['Ordersales_ID'])) {
    $totalBalance = 0;
    //ลบสินค้า
    $Ordersales_ID = $_GET['Ordersales_ID'];
    //echo $Ordersales_ID;
    $sqlselectOrdersales = "SELECT * FROM `ordersalesdetail` WHERE `ordersalesDetail_ID` = '" . $Ordersales_ID . "'";
    $resultselectOrdersales = $conn->query($sqlselectOrdersales);
    //$rowselectOrdersales = $resultselectOrdersales->fetch_assoc();

    while ($rowselectOrdersales = mysqli_fetch_array($resultselectOrdersales)) {

        $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $rowselectOrdersales['product_ID'] . "'");
        $resultselectproduct = $conn->query($sqlselectproduct);
        $rowselectproduct = $resultselectproduct->fetch_assoc();
        //print_r($rowselectproduct);
        //echo "<br> ก่อนหัก" . $rowselectproduct['Product_Balance'] . "<br>";

        //echo '<br>' . $rowselectproduct['Product_Balance'] . '+' . $rowselectOrdersales['ordersalesDetail_unit'];
        $totalBalance = $rowselectproduct['Product_Balance'] + $rowselectOrdersales['ordersalesDetail_unit'];
        //echo '<br> รวม' . $totalBalance;
        $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $rowselectOrdersales['product_ID'] . "';");
        $resultupdateproduct = $conn->query($sqlupdateproduct);
    }



    $sqldelete = "DELETE FROM `ordersales` WHERE `Ordersales_ID`= '" . $Ordersales_ID . "'";
    if ($conn->query($sqldelete) === TRUE) {
        //echo "Record deleted successfully";
        header('Refresh:0; url=../oderproduct.php');
    } else {
        //echo "Error deleting record: " . $conn->error;
        header('Refresh:0; url=../oderproduct.php');
    }
}


if (isset($_GET['Ordersalesuser_ID'])) {
    $totalBalance = 0;
    //ลบสินค้า
    $Ordersales_ID = $_GET['Ordersalesuser_ID'];
    //echo $Ordersales_ID;
    $sqlselectOrdersales = "SELECT * FROM `ordersalesdetail` WHERE `ordersalesDetail_ID` = '" . $Ordersales_ID . "'";
    $resultselectOrdersales = $conn->query($sqlselectOrdersales);
    //$rowselectOrdersales = $resultselectOrdersales->fetch_assoc();

    while ($rowselectOrdersales = mysqli_fetch_array($resultselectOrdersales)) {

        $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $rowselectOrdersales['product_ID'] . "'");
        $resultselectproduct = $conn->query($sqlselectproduct);
        $rowselectproduct = $resultselectproduct->fetch_assoc();
        //print_r($rowselectproduct);
        //echo "<br> ก่อนหัก" . $rowselectproduct['Product_Balance'] . "<br>";

        //echo '<br>' . $rowselectproduct['Product_Balance'] . '+' . $rowselectOrdersales['ordersalesDetail_unit'];
        $totalBalance = $rowselectproduct['Product_Balance'] + $rowselectOrdersales['ordersalesDetail_unit'];
        //echo '<br> รวม' . $totalBalance;
        $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $rowselectOrdersales['product_ID'] . "';");
        $resultupdateproduct = $conn->query($sqlupdateproduct);
    }



    $sqldelete = "DELETE FROM `ordersales` WHERE `Ordersales_ID`= '" . $Ordersales_ID . "'";
    if ($conn->query($sqldelete) === TRUE) {
        //echo "Record deleted successfully";
        header('Refresh:0; url=..//oderproductuser.php');
    } else {
        //echo "Error deleting record: " . $conn->error;
        header('Refresh:0; url=..//oderproductuser.php');
    }
}


if (isset($_GET['product_ID'])) {
    //ลบสินค้า
    $product_ID = $_GET['product_ID'];
    //echo $product_ID;



    $sqldelete = "DELETE FROM `product` WHERE `product`.`Product_ID` = '" . $product_ID . "'";
    if ($conn->query($sqldelete) === TRUE) {
        //echo "Record deleted successfully";
        header('Refresh:0; url=../product.php');
    } else {
        //echo "Error deleting record: " . $conn->error;
        header('Refresh:0; url=../product.php');
    }
}


if (isset($_GET['Warranty_ID'])) {
    //ลบประเภทการรับประกัน
    $sqldeletecolumn = $_GET['Warranty_ID'];
    //echo $product_ID;



    $sqldelete = "DELETE FROM `warranty` WHERE `warranty`.`Warranty_ID` = '" . $sqldeletecolumn . "'";
    if ($conn->query($sqldelete) === TRUE) {
        //echo "Record deleted successfully";
        header('Refresh:0; url=../warranty.php');
    } else {
        //echo "Error deleting record: " . $conn->error;
        header('Refresh:0; url=../warranty.php');
    }
}