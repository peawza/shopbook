<?php



require_once('connect.php');

if (isset($_GET['Ordersales_ID'])) {
    echo $_GET['Ordersales_ID'];
    $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_Status`='รอการจัดส่งสินค้า'WHERE `Ordersales_ID` = '" . $_GET['Ordersales_ID'] . "' ";
    //$sqlupdatephoto = "UPDATE `product` SET `Product_Photo` = '" . $newname . "' WHERE `product`.`Product_ID` = '" . $_POST['idproductphoto'] . "'";
    $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);
    //$_SESSION['Photo'] = $newname;

    header('location:../oderproduct.php');
}

if (isset($_GET['IDOrdersales'])) {
    echo $_GET['IDOrdersales'];
    echo $_GET['Packagenumber'];
    $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_Status`='กำลังจัดส่งสินค้า', `ordersales_Packagenumber` ='" . $_GET['Packagenumber'] . "'WHERE `Ordersales_ID` = '" . $_GET['IDOrdersales'] . "' ";
    //$sqlupdatephoto = "UPDATE `product` SET `Product_Photo` = '" . $newname . "' WHERE `product`.`Product_ID` = '" . $_POST['idproductphoto'] . "'";
    $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);
    //$_SESSION['Photo'] = $newname;

    header('location:../oderproduct.php');
}






if (isset($_POST['submitordersalesTransfermoney'])) {
    echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    print_r($_FILES['file']);
    echo '</pre>';

    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);
    $url = '../img/photopayment/' . $newname;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {

        //if ($row['User_Photo'] == 'profile.png') {
        //echo 'ไม่ลบ profile.png';
        //} else {
        //   unlink($deetefile);
        //unlink($deetefile);
        //echo 'ลบ';        
        //}
        /*
        UPDATE `ordersales` SET `Ordersales_ID`=[value-1],
        `Delivery_ID`=[value-2],`User_ID`=[value-3],
        `Ordersales_address`=[value-4],`Ordersales_Totalprice`=[value-5],
        `Ordersales_Day`=[value-6],`Ordersales_Status`=[value-7],
        `ordersales_Paymentstatus`=[value-8],`ordersales_DayPayment`=[value-9],
        `ordersales_ Amountmoney`=[value-10],`ordersales_Photopayment`=[value-11] WHERE 1
        */
        $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_ID`='" . $_POST['idorder'] . "',`ordersales_DayPayment`='" . date("Y-m-d") . "',`ordersales_Photopayment`='" . $newname . "',`ordersales_ Amountmoney`='" . $_POST['inputmony'] . "',`Ordersales_Status`='รอยืนยันการชำระเงิน',`ordersales_Paymentstatus`='โอนเงิน'WHERE `Ordersales_ID` = '" . $_POST['idorder'] . "' ";
        //$sqlupdatephoto = "UPDATE `product` SET `Product_Photo` = '" . $newname . "' WHERE `product`.`Product_ID` = '" . $_POST['idproductphoto'] . "'";
        $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);
        //$_SESSION['Photo'] = $newname;

        header('location:../oderproduct.php');
    } else {
        echo 'ไม่มีการอัพเดทข้อมูล';
    }
    /*
    Array
(
    [inputmony] => 20000
    [idorder] => 1
    [idorder_mony] => 742
    [idorder2] => 5000
    [submitordersalesTransfermoney] => 
)
Array
(
    [file] => Array
        (
            [name] => 11.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\phpA73E.tmp
            [error] => 0
            [size] => 14763
        )

)
    
    */
}


if (isset($_POST['submitordersalesTransfermoneyuser'])) {
    /* 
   echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    print_r($_FILES['file']);
    echo '</pre>';
    */

    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);
    $url = '../img/photopayment/' . $newname;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {

        //if ($row['User_Photo'] == 'profile.png') {
        //echo 'ไม่ลบ profile.png';
        //} else {
        //   unlink($deetefile);
        //unlink($deetefile);
        //echo 'ลบ';        
        //}
        /*
        UPDATE `ordersales` SET `Ordersales_ID`=[value-1],
        `Delivery_ID`=[value-2],`User_ID`=[value-3],
        `Ordersales_address`=[value-4],`Ordersales_Totalprice`=[value-5],
        `Ordersales_Day`=[value-6],`Ordersales_Status`=[value-7],
        `ordersales_Paymentstatus`=[value-8],`ordersales_DayPayment`=[value-9],
        `ordersales_ Amountmoney`=[value-10],`ordersales_Photopayment`=[value-11] WHERE 1
        */
        $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_ID`='" . $_POST['idorder'] . "',`ordersales_DayPayment`='" . date("Y-m-d") . "',`ordersales_Photopayment`='" . $newname . "',`ordersales_ Amountmoney`='" . $_POST['inputmony'] . "',`Ordersales_Status`='รอยืนยันการชำระเงิน',`ordersales_Paymentstatus`='โอนเงิน'WHERE `Ordersales_ID` = '" . $_POST['idorder'] . "' ";
        //$sqlupdatephoto = "UPDATE `product` SET `Product_Photo` = '" . $newname . "' WHERE `product`.`Product_ID` = '" . $_POST['idproductphoto'] . "'";
        $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);
        //$_SESSION['Photo'] = $newname;

        header('location:../oderproductuser.php');
    } else {
        echo 'ไม่มีการอัพเดทข้อมูล';
    }
    /*
    Array
(
    [inputmony] => 20000
    [idorder] => 1
    [idorder_mony] => 742
    [idorder2] => 5000
    [submitordersalesTransfermoney] => 
)
Array
(
    [file] => Array
        (
            [name] => 11.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\phpA73E.tmp
            [error] => 0
            [size] => 14763
        )

)
    
    */
}







if (isset($_POST['submitproduct'])) {
    /*
    
            Array
        (
                [nameproduct2] => sadsazzz
                [typeproduct2] => 36
                [warrantyproduct2] => 2
                [price2] => 200.00
                [unit2] => 3000
                [detail2] => dasd
                [idproduct] => 42
                [submitproduct] => 
        )

    */

    //echo '<pre>';
    //print_r($_POST);
    //echo '</pre>';
    $sql = "UPDATE `product` SET    `Type_ID`='" . $_POST['idproduct3'] . "',
                                    `Product_Name`='" . $_POST['nameproduct2'] . "',
                                    `Product_Details`='" . $_POST['detail2'] . "',
                                    `Product_Price`='" . $_POST['price2'] . "',
                                    `Product_Balance`='" . $_POST['unit2'] . "',
                                    `date_save`='" . date("Y-m-d") . "',
                                    `Warranty_ID`='" . $_POST['warrantyproduct2'] . "' WHERE `Product_ID` = '" . $_POST['idproduct'] . "' ";

    $result = $conn->query($sql) or die($conn->error);
    if ($result) {
        //echo 'แก้ไข้ข้อมูลสำเร็จ';
        echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
        header('Refresh:0; url=../product.php');
    } else {
        //echo 'ไม่สำเร็จ';
        echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
        header('Refresh:0; url=../product.php');
    }
}



if (isset($_POST['updatewarranty'])) {
    /*    
Array
(
    [name] => ผผผผผผผผผผ
    [day] => 2
    [Warrantyid2] => 1
    [Warrantyid] => 3
    [insert] => อัพเดท
)
    */

    //echo '<pre>';
    //print_r($_POST);
    //echo '</pre>';
    //UPDATE `warranty` SET `Warranty_ID`=[value-1],`Warranty_Name`=[value-2],`Warranty_Day`=[value-3] WHERE 1
    $sql = "UPDATE `warranty` SET `Warranty_Name`='" . $_POST['name'] . "',`Warranty_Day`='" . $_POST['day'] . "' WHERE `Warranty_ID` = '" . $_POST['Warrantyid'] . "'  ";

    $result = $conn->query($sql) or die($conn->error);
    if ($result) {
        //
        header('Refresh:0; url=../warranty.php');
        //echo 'แก้ไข้ข้อมูลสำเร็จ';
        echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
    } else {
        //echo 'ไม่สำเร็จ';
        header('Refresh:0; url=../warranty.php');
        echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
    }
}


if (isset($_POST['updateDelivery'])) {
    /*    
Array
(
    [name] => ผผผผผผผผผผ
    [day] => 2
    [Warrantyid2] => 1
    [Warrantyid] => 3
    [insert] => อัพเดท
)


Array
(
    [Deliveryname] => ฟหหหหหหหหหห
    [Price] => 200
    [Deliveryid] => 1
    [updateDelivery] => อัพเดท
)


    */

    //echo '<pre>';
    //print_r($_POST);
    //echo '</pre>';
    //UPDATE `delivery` SET `Delivery_ID`=[value-1],`Delivery_Name`=[value-2],`Delivery_Price`=[value-3] WHERE 1
    //UPDATE `delivery` SET `Delivery_Name`=[value-2],`Delivery_Price`=[value-3] WHERE 1   
    $sql = "UPDATE `delivery` SET `Delivery_Name`='" . $_POST['Deliveryname'] . "',`Delivery_Price`='" . $_POST['Price'] . "' WHERE `Delivery_ID` = '" . $_POST['Deliveryid'] . "'  ";

    $result = $conn->query($sql) or die($conn->error);
    if ($result) {
        //
        header('Refresh:0; url=../delivery.php');
        // echo 'แก้ไข้ข้อมูลสำเร็จ';
        //echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
    } else {
        //echo 'ไม่สำเร็จ';
        header('Refresh:0; url=../delivery.php');
        //echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
    }
}