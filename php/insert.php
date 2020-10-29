<?php

require_once('condbbook.php');


if (isset($_POST['submitcart'])) {


    $sqlid = "SELECT orders_id  FROM `orders` ORDER BY `orders_id` DESC LIMIT 1";
    $resultid = $conn->query($sqlid);
    $row = $resultid->fetch_assoc();

    $adressusersend = $_POST['addressuser'];
    if (mysqli_num_rows($resultid) == 1) {




        $OrderID = $row['orders_id'] + 1;

        $sqlinsertorder = ("INSERT INTO `orders`(`orders_id`, `User_ID`, `Order_addressuser`, `orders_renttotal`,
         `orders_returntotal`, `orders_sumtotal`, `orders_iscomplete`) 
        VALUES ('" . $OrderID . "','" . $_POST['UserID'] . "','" . $adressusersend . "',
        '" . $_POST['Totalprice'] . "','0','" . $_POST['Totalprice'] . "','0')");

        $resultinsertorder = $conn->query($sqlinsertorder);



        if (isset($resultinsertorder)) {
        } else {
        }

        $totalBalance = 0;
        $sumprice = 0;
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {



            $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct = $conn->query($sqlselectproduct);
            $rowselectproduct = $resultselectproduct->fetch_assoc();



            $totalBalance = $rowselectproduct['Product_Balance'] - $values["item_quantity"];

            $day = $rowselectproduct['Product_rentday'];
            $daytotal = "+ " . $day . " day";

            $returndate = Date("Y-m-d", strtotime($daytotal));



            $sumprice =  $values["item_price"] * $values["item_quantity"];

            $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $values["item_id"] . "';");
            $resultupdateproduct = $conn->query($sqlupdateproduct);


            $sqlselectproduct1 = ("SELECT `Product_ID`, `Product_Balance` FROM `product` WHERE `product`.`Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct1 = $conn->query($sqlselectproduct1);
            $rowselectproduct1 = $resultselectproduct1->fetch_assoc();





            $sqlinsertorderdetail = ("INSERT INTO `orderrent`(`orderrent_id`, `orderrent_productid`, `orderrent_amount`, `orderrent_totalprice`, `orderrent_rentdate`, `orderrent_returndate`, `orderrent_status`) 
            VALUES ('" . $OrderID . "','" . $values["item_id"] . "','" . $values["item_quantity"] . "','" . $sumprice . "','" . date("Y-m-d") . "','" . $returndate . "','0')");


            $resultinsertorderdetail = $conn->query($sqlinsertorderdetail);
            if (isset($resultinsertorderdetail)) {

                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>window.location="../shopproduct.php"</script>';
                }
            } else {
                echo "สินค้าไม่ได้";
            }
        }
    } else {
        $OrderID = 1;

        $sqlinsertorder = ("INSERT INTO `orders`(`orders_id`, `User_ID`, `Order_addressuser`, `orders_renttotal`,
         `orders_returntotal`, `orders_sumtotal`, `orders_iscomplete`) 
        VALUES ('" . $OrderID . "','" . $_POST['UserID'] . "','" . $adressusersend . "',
        '" . $_POST['Totalprice'] . "','0','" . $_POST['Totalprice'] . "','0')");

        $resultinsertorder = $conn->query($sqlinsertorder);



        if (isset($resultinsertorder)) {
        } else {
        }

        $totalBalance = 0;
        $sumprice = 0;
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {



            $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct = $conn->query($sqlselectproduct);
            $rowselectproduct = $resultselectproduct->fetch_assoc();



            $totalBalance = $rowselectproduct['Product_Balance'] - $values["item_quantity"];

            echo " ผลลัพ=" . $totalBalance;

            echo "<br>";
            echo " ผลลัพวัน=" . $rowselectproduct['Product_rentday'];
            $day = $rowselectproduct['Product_rentday'];
            $daytotal = "+ " . $day . " day";
            echo "<br>";
            echo "<br>";
            echo ($daytotal);
            echo "<br>";
            echo Date("Y-m-d", strtotime($daytotal));
            echo "<br>";
            $returndate = Date("Y-m-d", strtotime($daytotal));
            echo $returndate;


            $sumprice =  $values["item_price"] * $values["item_quantity"];

            $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $values["item_id"] . "';");
            $resultupdateproduct = $conn->query($sqlupdateproduct);


            $sqlselectproduct1 = ("SELECT `Product_ID`, `Product_Balance` FROM `product` WHERE `product`.`Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct1 = $conn->query($sqlselectproduct1);
            $rowselectproduct1 = $resultselectproduct1->fetch_assoc();





            $sqlinsertorderdetail = ("INSERT INTO `orderrent`(`orderrent_id`, `orderrent_productid`, `orderrent_amount`, `orderrent_totalprice`, `orderrent_rentdate`, `orderrent_returndate`, `orderrent_status`) 
            VALUES ('" . $OrderID . "','" . $values["item_id"] . "','" . $values["item_quantity"] . "','" . $sumprice . "','" . date("Y-m-d") . "','" . $returndate . "','0')");

            $resultinsertorderdetail = $conn->query($sqlinsertorderdetail);
            if (isset($resultinsertorderdetail)) {

                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>window.location="../shopproduct.php"</script>';
                }
            } else {
            }
        }
    }
}








function Refresh($link)
{
    header('Refresh:0; url=../' . $link . '');
};

if (isset($_POST['submitproduct'])) {


    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);

    $url = '../img/product/' . $newname;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
        $sql = "INSERT INTO `product` ( `Type_ID`, `Product_Name`, `Product_Details`, `Product_Price`, `Product_Balance`, `Product_Photo`, `Product_datesave`, `Product_rentday`,`product_buy`) 
                            VALUES ( '" . $_POST['typeproduct'] . "', '" . $_POST['nameproduct'] . "', '" . $_POST['detail'] . "',
                                                                                        '" . $_POST['price'] . "', '" . $_POST['unit'] . "', '" . $newname . "', '" . date("Y-m-d") . "', '" . $_POST['rentday'] . "','" . $_POST['productbuy'] . "');";
        $result = $conn->query($sql) or die($conn->error);
    }

    if ($result) {
        Refresh('product.php');

        echo "<script> alert('เพิ่มสินค้าสำเร็จ'); </script>";
    } else {
        echo "<script> alert('ล้มเหลว กรุณาติดต่อคนดูแลระบบ'); </script>";
        Refresh('product.php');
    }
}






if (isset($_POST['insertreturnproduct']) && isset($_GET['Order_id'])) {

    $totalall = 0;
    foreach ($_SESSION["returnbook"] as $keys => $values) {

        $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $values["item_id"] . "'");

        $resultselectproduct = $conn->query($sqlselectproduct);
        $rowselectproduct = $resultselectproduct->fetch_assoc();



        $totalBalance = $rowselectproduct['Product_Balance'] + $values["item_amount"];

        $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $values["item_id"] . "';");
        $resultupdateproduct = $conn->query($sqlupdateproduct);

        $total = 0;
        $originaldaterent = $values["item_daterent"];
        $newDaterent = date("d / m / Y", strtotime($originaldaterent));
        $originalDatereturn = $values["item_detereturn"];
        $newDatereturn = date("d / m / Y", strtotime($originalDatereturn));
        $newDatereturn1 = date("Y-m-d", strtotime($originalDatereturn));
        if ($values["item_rentamount"] == $values["item_amount"]) {
            $total += 0;
        } else {
            $calculate = $values["item_rentamount"] - $values["item_amount"];

            $returnamount = $values["item_amount"];
            $sumpriceproduct =  $values["item_productbuy"] * $calculate;

            if ($values["item_rentamount"] != $returnamount) {
                $sqlinserproductloss = ("INSERT INTO `productloss`( `Product_ID`, `productloss_amount`, `productloss_price`) VALUES ('" . $values["item_id"] . "','" . $calculate . "','" . $sumpriceproduct . "')");
                $resulinserproductloss = $conn->query($sqlinserproductloss);
            }

            while ($values["item_rentamount"] != $returnamount) {

                $total += $values["item_productbuy"];


                $returnamount++;
            }
        }


        $datetoday = date("Y-m-d");

        $datereturn = $newDatereturn1;

        $datetoday = date_create($datetoday);
        $convertdatereturn = date_create_from_format('Y-m-d', $datereturn);
        $convertdatereturn->getTimestamp();

        $diff = date_diff($datetoday, $convertdatereturn);

        if ($diff->format("%R") == "+") {
            $total += 0;
        } else {



            $day = $diff->format("%a");
            while ($day  != -1) {
                $total += 20;
                # code...
                $day--;
            }
        }
        $totalall += $total;


        $sqlreturnproduct = ("INSERT INTO `orderreturn`(`orderreturn_id`, `orderreturn_productid`, `orderreturn_amount`, `orderreturn_returnpricefine`, `orderreturn_returndate`) 
        VALUES ('" . $_GET['Order_id'] . "','" . $values["item_id"] . "','" . $values["item_amount"] . "','" . $total . "','" .  date("Y-m-d") . "')");
        $resultreturnproduct = $conn->query($sqlreturnproduct);


        $sqlupdaterent = ("UPDATE `orderrent` SET `orderrent_status`= '1' WHERE `orderrent_id`='" . $_GET['Order_id'] . "' AND `orderrent_productid`= '" . $values["item_id"] . "'");
        $resulupdaterent = $conn->query($sqlupdaterent);



        if (isset($resulupdaterent) and isset($resultreturnproduct) and isset($resultupdateproduct)) {

            foreach ($_SESSION["returnbook"] as $keys => $values) {
                unset($_SESSION["returnbook"][$keys]);
            }
        } else {
        }
    }
    $sqlselectorder = ("SELECT  `orders_renttotal` FROM `orders` WHERE `orders_id`='" . $_GET['Order_id'] . "'");
    $resulselectorder = $conn->query($sqlselectorder);
    $rowselectorder = $resulselectorder->fetch_assoc();
    $rent = $rowselectorder['orders_renttotal'];

    $sum = $rent + $totalall;


    $sqlupdateorder = ("UPDATE `orders` SET `orders_returntotal`='" . $totalall . "',`orders_sumtotal`='" . $sum . "' WHERE `orders_id`='" . $_GET['Order_id'] . "'");
    $resulupdateorder = $conn->query($sqlupdateorder);

    $sqlselectrent = ("SELECT `orderrent_status` FROM `orderrent` WHERE `orderrent_id`='" . $_GET['Order_id'] . "' AND `orderrent_status` = 0");
    $sqlupdateorder = ("UPDATE `orders` SET `orders_iscomplete` = 1  WHERE  `orders_id`='" . $_GET['Order_id'] . "'");
    $resulupdateorder = $conn->query($sqlupdateorder);

    $resulselectrent = $conn->query($sqlselectrent);
    $rowcount = mysqli_num_rows($resulselectrent);
    if ($rowcount == 0) {
        $sqlupdateorder = ("UPDATE `orders` SET `orders_iscomplete` = 2  WHERE  `orders_id`='" . $_GET['Order_id'] . "'");
        $resulupdateorder = $conn->query($sqlupdateorder);
    }
    echo "<script> alert('บันทึกข้อมูลสำเสร็จ'); </script>";
    echo '<script>window.location="../rentproductall.php"</script>';
}