<?php
//fetch.php  
$connect = mysqli_connect("localhost", "root", "1234", "shop");
if (isset($_POST["typeproduct_id"])) {
     $query = "SELECT * FROM producttype WHERE `Type_ID` = '" . $_POST["typeproduct_id"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
}

if (isset($_POST["product_ID"])) {
     $query = "SELECT * FROM `product` WHERE `product`.`Product_ID` = '" . $_POST["product_ID"] . "'";
     //$query = "SELECT * FROM `product`,`producttype` WHERE `product`.`Product_ID` = '" . $_POST["product_ID"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
     //echo json_encode($_POST["product_ID"]);
     //$x = '<label for="inputPassword" class="col-sm-2 col-form-label py-2">เครื่อง</label>';
     //echo $x;
}


if (isset($_POST["Warranty"])) {
     //SELECT `Warranty_ID`, `Warranty_Name`, `Warranty_Day` FROM `warranty` WHERE 1

     $query = "SELECT * FROM `warranty` WHERE Warranty_ID = '" . $_POST["Warranty"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
     //echo json_encode($_POST["product_ID"]);
     //$x = '<label for="inputPassword" class="col-sm-2 col-form-label py-2">เครื่อง</label>';
     //echo $x;
}



if (isset($_POST["Delivery"])) {
     //SELECT `Delivery_ID`, `Delivery_Name`, `Delivery_Day` FROM `Delivery` WHERE 1

     $query = "SELECT * FROM `delivery` WHERE Delivery_ID = '" . $_POST["Delivery"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
     //echo json_encode($_POST["product_ID"]);
     //$x = '<label for="inputPassword" class="col-sm-2 col-form-label py-2">เครื่อง</label>';
     //echo $x;
}

if (isset($_POST["ordersalesid"])) {
     //SELECT `Delivery_ID`, `Delivery_Name`, `Delivery_Day` FROM `Delivery` WHERE 1

     $query = "SELECT * FROM `ordersales` WHERE Ordersales_ID = '" . $_POST["ordersalesid"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
     //echo json_encode($_POST["product_ID"]);
     //$x = '<label for="inputPassword" class="col-sm-2 col-form-label py-2">เครื่อง</label>';
     //echo $x;
}