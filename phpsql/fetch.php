<?php

include('condbbookNs.php');
if (isset($_POST["typeproduct_id"])) {
     $query = "SELECT * FROM producttype WHERE `Type_ID` = '" . $_POST["typeproduct_id"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
}

if (isset($_POST["product_ID"])) {
     $query = "SELECT * FROM `product` WHERE `product`.`Product_ID` = '" . $_POST["product_ID"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
}







if (isset($_POST["ordersalesid"])) {
     $query = "SELECT * FROM `ordersales` WHERE Ordersales_ID = '" . $_POST["ordersalesid"] . "'";
     $result = mysqli_query($connect, $query);
     $row = mysqli_fetch_array($result);
     echo json_encode($row);
}