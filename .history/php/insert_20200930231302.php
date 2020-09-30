<?php
//require_once('connect.php');
require_once('condbbook.php');

//echo '<pre>';

//print_r($_POST);


//print_r($_FILES['file']); // ชื่อ NAME ใน HTML
/*
 [item_id] => 46
                    [item_name] => sadas
                    [item_price] => 500.00
                    [item_quantity] => 1
                    [item_photo] => 8990127046103.jpg
                    [item_Balance] => 123

*/
//echo '</pre>';


if (isset($_POST['submitcart'])) {
    echo '<pre>';
    print_r($_SESSION);
    print_r($_POST);
    echo '</pre>';

    /*
    Array
(
    [addressuser] => asdasdas
    [Delivery] => 1
    [Totalprice] => 42
    [phone] => 0970562607
    [nameusersend] => ศุภชัย  แจ้งอรุณ
    [tel] => 12345
    [submitcart] => 
)
    
    */

    $sqlid = "SELECT orders_id  FROM `orders` ORDER BY `orders_id` DESC LIMIT 1";
    $resultid = $conn->query($sqlid);
    $row = $resultid->fetch_assoc();
    //$adressusersend = $_POST['nameusersend'] . '<br>' . $_POST['addressuser'] . '<br>เบอร์โทรติดต่อ  ' . $_POST['tel'];
    $adressusersend = $_POST['addressuser'];
    if (mysqli_num_rows($resultid) == 1) {
        //$code = sprintf('P-%04d', $row['Ordersales_ID']);
        //echo $code; // P-0001
        //echo '<br>';
        //echo $row['Ordersales_ID'];
        //echo '<br>';
        //echo $row['Ordersales_ID'] + 1;
        /*
        Array
            (
                [addressuser] => หฟดหดฟหดกฟหด
                [Totalprice] => 2464
                [phone] => 0970562607
                [UserID] => 4
                [tel] => 0970562607
                [submitcart] => 
            )   
        INSERT INTO `orderrent`(`orderrent_id`, `orderrent_productid`, `orderrent_amount`, `orderrent_rentdate`, `orderrent_returndate`, `orderrent_status`) 
        VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
        $sqlinsertorder = ("INSERT INTO `ordersales`(`Ordersales_ID`, `Delivery_ID`, `User_ID`, `Ordersales_address`,
    `Ordersales_Totalprice`, `Ordersales_Day`, `Ordersales_Status`) VALUES
    ('" . $OrderID . "','" . $_POST['Delivery'] . "','" . $_SESSION["ID"] . "','" . $adressusersend . "','" .
            $_POST['Totalprice'] . "','" . date("Y-m-d") . "','รอการชำระเงิน')");
        
        
        */


        $OrderID = $row['orders_id'] + 1;

        $sqlinsertorder = ("INSERT INTO `orders`(`orders_id`, `User_ID`, `Order_addressuser`, `orders_renttotal`,
         `orders_returntotal`, `orders_sumtotal`, `orders_iscomplete`) 
        VALUES ('" . $OrderID . "','" . $_POST['UserID'] . "','" . $adressusersend . "',
        '" . $_POST['Totalprice'] . "','0','" . $_POST['Totalprice'] . "','0')");

        $resultinsertorder = $conn->query($sqlinsertorder);



        if (isset($resultinsertorder)) {
            echo 'บันทึกสำเร็จ';
        } else {
            echo 'บันทึกไม่สำเร็จ';
        }
        //INSERT INTO `ordersalesdetail`(`ordersalesDetail_ID`, `product_ID`, `ordersalesDetail_unit`) VALUES ([value-1],[value-2],[value-3])

        //
        $totalBalance = 0;
        $sumprice = 0;
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {

            //SELECT `Product_ID`, `Product_Balance` FROM `product` WHERE 1
            //UPDATE `product` SET `Product_Balance` = '100' WHERE `product`.`Product_ID` = 50;
            //echo "<br>  ID " . $values["item_id"] . "<br>";

            //echo "<br> ค่าหัก = " . $values["item_quantity"] . "<br>";

            $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct = $conn->query($sqlselectproduct);
            $rowselectproduct = $resultselectproduct->fetch_assoc();
            //print_r($rowselectproduct);
            //echo "<br> ก่อนหัก" . $rowselectproduct['Product_Balance'] . "<br>";


            $totalBalance = $rowselectproduct['Product_Balance'] - $values["item_quantity"];

            echo " ผลลัพ=" . $totalBalance;
            echo " ผลลัพ=" . $rowselectproduct['Product_rentday'];
            $day = $rowselectproduct['Product_rentday'];
            $daytotal = "+ " . $day . " day";
            echo ($daytotal);
            echo "<br>";
            echo Date("Y-m-d", strtotime($daytotal));
            $returndate = Date("Y-m-d", strtotime($daytotal)); // 2013-02-28
            echo $returndate;


            $sumprice =  $values["item_price"] * $values["item_quantity"];
            //echo " ผลลัพราคา=" . $totalBalance;
            //echo 'IDวัน' . $rowselectproduct['Warranty_ID'];

            //$sqlselectWarranty = ("SELECT `Warranty_ID`, `Warranty_Name`, `Warranty_Day` FROM `warranty` WHERE `Warranty_ID`='" . $rowselectproduct['Warranty_ID'] . "'");
            //$resultselectWarranty = $conn->query($sqlselectWarranty);
            //$rowselectWarranty = $resultselectWarranty->fetch_assoc();
            //echo 'วัน' . $rowselectWarranty['Warranty_Day'];




            //อัพเดทสินค้า
            $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $values["item_id"] . "';");
            $resultupdateproduct = $conn->query($sqlupdateproduct);


            $sqlselectproduct1 = ("SELECT `Product_ID`, `Product_Balance` FROM `product` WHERE `product`.`Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct1 = $conn->query($sqlselectproduct1);
            $rowselectproduct1 = $resultselectproduct1->fetch_assoc();

            //echo "<br>" . $rowselectproduct1['Product_Balance'] . "<br>";


            /*
            $sqlinsertorderdetail = ("INSERT INTO `orderrent`(`orderrent_id`, `orderrent_productid`, `orderrent_amount`, `orderrent_totalprice`, `orderrent_rentdate`, `orderrent_returndate`, `orderrent_status`) 
            VALUES ('" . $OrderID . "','" . $values["item_id"] . "','" . $values["item_quantity"] . "','" . $sumprice . "','".$date."','".$returndate."','0')");
        
        */  /*
            $sqlinsertorderdetail = ("INSERT INTO `ordersalesdetail`(`ordersalesDetail_ID`, `product_ID`, `ordersalesDetail_unit`, `ordersalesdetailWarrantyday`, `ordersalesdetail_ price`) VALUES
                ('" . $OrderID . "','" . $values["item_id"] . "','" . $values["item_quantity"] . "','" . $rowselectWarranty['Warranty_Day'] . "','" . $sumprice . "')");
                */
            $resultinsertorderdetail = $conn->query($sqlinsertorderdetail);
            if (isset($resultinsertorderdetail)) {
                //echo '1234';
            } else {
                //echo '0000';
            }
        }


        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            unset($_SESSION["shopping_cart"][$keys]);
            //echo '<script>window.location="../shopproduct.php"</script>';
            echo "<script> alert('บันทึกข้อมูลสำเสร็จ'); </script>";
        }
    } else {
        $OrderID = 1;
        //echo $OrderID;
        $sqlinsertorder = ("INSERT INTO `ordersales`(`Ordersales_ID`, `Delivery_ID`, `User_ID`, `Ordersales_address`,
        `Ordersales_Totalprice`, `Ordersales_Day`, `Ordersales_Status`) VALUES
        ('" . $OrderID . "','" . $_POST['Delivery'] . "','" . $_SESSION["ID"] . "','" . $_POST['addressuser'] . "','" .
            $_POST['Totalprice'] . "','" . date("Y-m-d") . "','รอการชำระเงิน')");
        $resultinsertorder = $conn->query($sqlinsertorder);



        if (isset($resultinsertorder)) {
            //echo '5555555555555';
        } else {
            //echo '111111111111';
        }
        //INSERT INTO `ordersalesdetail`(`ordersalesDetail_ID`, `product_ID`, `ordersalesDetail_unit`) VALUES ([value-1],[value-2],[value-3])
        //
        $totalBalance = 0;
        $sumprice = 0;
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {

            //SELECT `Product_ID`, `Product_Balance` FROM `product` WHERE 1
            //UPDATE `product` SET `Product_Balance` = '100' WHERE `product`.`Product_ID` = 50;
            // echo "<br>  ID " . $values["item_id"] . "<br>";

            //echo "<br> ค่าหัก = " . $values["item_quantity"] . "<br>";

            $sqlselectproduct = ("SELECT * FROM `product` WHERE `Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct = $conn->query($sqlselectproduct);
            $rowselectproduct = $resultselectproduct->fetch_assoc();
            //print_r($rowselectproduct);
            // echo "<br> ก่อนหัก" . $rowselectproduct['Product_Balance'] . "<br>";


            $totalBalance = $rowselectproduct['Product_Balance'] - $values["item_quantity"];
            //echo " ผลลัพ=" . $totalBalance;

            $sumprice =  $values["item_price"] * $values["item_quantity"];
            //echo " ผลลัพราคา=" . $totalBalance;
            //echo 'IDวัน' . $rowselectproduct['Warranty_ID'];

            $sqlselectWarranty = ("SELECT `Warranty_ID`, `Warranty_Name`, `Warranty_Day` FROM `warranty` WHERE `Warranty_ID`='" . $rowselectproduct['Warranty_ID'] . "'");
            $resultselectWarranty = $conn->query($sqlselectWarranty);
            $rowselectWarranty = $resultselectWarranty->fetch_assoc();
            //echo 'วัน' . $rowselectWarranty['Warranty_Day'];





            $sqlupdateproduct = ("UPDATE `product` SET `Product_Balance` = '" . $totalBalance . "' WHERE `product`.`Product_ID` = '" . $values["item_id"] . "';");
            $resultupdateproduct = $conn->query($sqlupdateproduct);

            $sqlselectproduct1 = ("SELECT `Product_ID`, `Product_Balance` FROM `product` WHERE `product`.`Product_ID` = '" . $values["item_id"] . "'");

            $resultselectproduct1 = $conn->query($sqlselectproduct1);
            $rowselectproduct1 = $resultselectproduct1->fetch_assoc();

            //echo "<br>" . $rowselectproduct1['Product_Balance'] . "<br>";



            $sqlinsertorderdetail = ("INSERT INTO `ordersalesdetail`(`ordersalesDetail_ID`, `product_ID`, `ordersalesDetail_unit`, `ordersalesdetailWarrantyday`, `ordersalesdetail_ price`) VALUES
                ('" . $OrderID . "','" . $values["item_id"] . "','" . $values["item_quantity"] . "','" . $rowselectWarranty['Warranty_Day'] . "','" . $sumprice . "')");
            $resultinsertorderdetail = $conn->query($sqlinsertorderdetail);
            if (isset($resultinsertorderdetail)) {
                //echo '1234';
            } else {
                //echo '0000';
            }
        }
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            unset($_SESSION["shopping_cart"][$keys]);
            //echo '<script>window.location="../shopproduct.php"</script>';
        }
    }
}








function Refresh($link)
{
    header('Refresh:0; url=../' . $link . '');
};

if (isset($_POST['submitproduct'])) {
    //echo '<pre>';
    //print_r($_POST);
    //print_r($_FILES['file']); // ชื่อ NAME ใน HTML
    //echo '</pre>';

    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);
    //print_r($newname);
    $url = '../img/product/' . $newname;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
        $sql = "INSERT INTO `product` ( `Type_ID`, `Product_Name`, `Product_Details`, `Product_Price`, `Product_Balance`, `Product_Photo`, `Product_datesave`, `Product_rentday`) 
                            VALUES ( '" . $_POST['typeproduct'] . "', '" . $_POST['nameproduct'] . "', '" . $_POST['detail'] . "',
                                                                                        '" . $_POST['price'] . "', '" . $_POST['unit'] . "', '" . $newname . "', '" . date("Y-m-d") . "', '" . $_POST['rentday'] . "');";
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



if (isset($_POST['insertwarranty'])) {
    //echo '<pre>';
    //print_r($_POST);
    //print_r($_FILES['file']); // ชื่อ NAME ใน HTML
    //echo '</pre>';

    //$temp = explode('.', $_FILES['file']['name']);
    //$newname = round(microtime(true) * 5678) . '.' . end($temp);
    //print_r($newname);
    //$url = '../img/product/' . $newname;
    //if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
    //}


    $sql = "INSERT INTO `warranty`( `Warranty_Name`, `Warranty_Day`) VALUES ('" . $_POST['namewarranty'] . "','" . $_POST['daywarranty'] . "')";
    $result = $conn->query($sql) or die($conn->error);


    if ($result) {
        Refresh('warranty.php');
        //header('Refresh:0; url=../login.php');
        echo "<script> alert('เพิ่มสินค้าสำเร็จ'); </script>";
    } else {
        echo "<script> alert('สมัคสมาชิกไม่ล้มเหลว กรุณาติดต่อคนดูแลระบบ'); </script>";
        Refresh('warranty.php');
    }
}




if (isset($_POST['insertdelivery'])) {
    //echo '<pre>';
    //print_r($_POST);
    //print_r($_FILES['file']); // ชื่อ NAME ใน HTML
    //echo '</pre>';

    //$temp = explode('.', $_FILES['file']['name']);
    //$newname = round(microtime(true) * 5678) . '.' . end($temp);
    //print_r($newname);
    //$url = '../img/product/' . $newname;
    //if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
    //}

    //[namedelivery] => aaaaaaaaaa
    //[moneydelivery] => 12
    //SELECT `Delivery_ID`, `Delivery_Name`, `Delivery_Price` FROM `delivery` WHERE 1

    $sql = "INSERT INTO `delivery`( `Delivery_Name`, `Delivery_Price`) VALUES ('" . $_POST['namedelivery'] . "','" . $_POST['moneydelivery'] . "')";
    $result = $conn->query($sql) or die($conn->error);


    if ($result) {
        Refresh('delivery.php');
        //header('Refresh:0; url=../login.php');
        echo "<script> alert('เพิ่มสินค้าสำเร็จ'); </script>";
    } else {
        echo "<script> alert('สมัคสมาชิกไม่ล้มเหลว กรุณาติดต่อคนดูแลระบบ'); </script>";
        Refresh('delivery.php');
    }
}