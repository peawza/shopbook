<?php

$connect = mysqli_connect("localhost", "root", "1234", "shop");
if (!empty($_POST)) {

    print_r($_POST);
    $output = '';
    $message = '';
    $name = mysqli_real_escape_string($connect, $_POST["name"]);
  
    if ($_POST["typeproduct_id"] != '') {
      
        $query = "  
           UPDATE producttype  
           SET Type_Name ='$name'           
           WHERE Type_ID ='" . $_POST["typeproduct_id"] . "'";
      


        $message = 'Data Updated';

        
    } else {
       
        $query = "         
           INSERT INTO `producttype` (`Type_Name`) VALUES ('" . $name . "');
           ";
        $message = 'Data Inserted';

    }

    if (mysqli_query($connect, $query)) {

        $select_query = "SELECT * FROM producttype ORDER BY `Type_ID` DESC";
        $result = mysqli_query($connect, $select_query);
    }

}