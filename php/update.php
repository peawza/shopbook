<?php



require_once('condbbook.php');

if (isset($_GET['Ordersales_ID'])) {
    echo $_GET['Ordersales_ID'];
    $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_Status`='รอการจัดส่งสินค้า'WHERE `Ordersales_ID` = '" . $_GET['Ordersales_ID'] . "' ";
    $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);


    header('location:../oderproduct.php');
}

if (isset($_GET['IDOrdersales'])) {
    echo $_GET['IDOrdersales'];
    echo $_GET['Packagenumber'];
    $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_Status`='กำลังจัดส่งสินค้า', `ordersales_Packagenumber` ='" . $_GET['Packagenumber'] . "'WHERE `Ordersales_ID` = '" . $_GET['IDOrdersales'] . "' ";
    $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);


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


        $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_ID`='" . $_POST['idorder'] . "',`ordersales_DayPayment`='" . date("Y-m-d") . "',`ordersales_Photopayment`='" . $newname . "',`ordersales_ Amountmoney`='" . $_POST['inputmony'] . "',`Ordersales_Status`='รอยืนยันการชำระเงิน',`ordersales_Paymentstatus`='โอนเงิน'WHERE `Ordersales_ID` = '" . $_POST['idorder'] . "' ";
        $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);

        header('location:../oderproduct.php');
    } else {
        echo 'ไม่มีการอัพเดทข้อมูล';
    }
}


if (isset($_POST['submitordersalesTransfermoneyuser'])) {


    $temp = explode('.', $_FILES['file']['name']);
    $newname = round(microtime(true) * 5678) . '.' . end($temp);
    $url = '../img/photopayment/' . $newname;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $url)) {


        $sqlupdatephoto = "UPDATE `ordersales` SET `Ordersales_ID`='" . $_POST['idorder'] . "',`ordersales_DayPayment`='" . date("Y-m-d") . "',`ordersales_Photopayment`='" . $newname . "',`ordersales_ Amountmoney`='" . $_POST['inputmony'] . "',`Ordersales_Status`='รอยืนยันการชำระเงิน',`ordersales_Paymentstatus`='โอนเงิน'WHERE `Ordersales_ID` = '" . $_POST['idorder'] . "' ";
        $sevasql = $conn->query($sqlupdatephoto) or die($conn->error);


        header('location:../oderproductuser.php');
    } else {
        echo 'ไม่มีการอัพเดทข้อมูล';
    }
}







if (isset($_POST['submitproduct'])) {



    $sql = "UPDATE `product` SET    `Type_ID`='" . $_POST['idproduct3'] . "',
                                    `Product_Name`='" . $_POST['nameproduct2'] . "',
                                    `Product_Details`='" . $_POST['detail2'] . "',
                                    `Product_Price`='" . $_POST['price2'] . "',
                                    `Product_Balance`='" . $_POST['unit2'] . "',
                                    `Product_datesave`='" . date("Y-m-d") . "',
                                    `Product_rentday`='" . $_POST['rentday2'] . "',
                                    `product_buy`='" . $_POST['productbuy2'] . "' WHERE `Product_ID` = '" . $_POST['idproduct'] . "' ";

    $result = $conn->query($sql) or die($conn->error);
    if ($result) {

        echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
        header('Refresh:0; url=../product.php');
    } else {

        echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
        header('Refresh:0; url=../product.php');
    }
}



if (isset($_POST['updatewarranty'])) {
    $sql = "UPDATE `warranty` SET `Warranty_Name`='" . $_POST['name'] . "',`Warranty_Day`='" . $_POST['day'] . "' WHERE `Warranty_ID` = '" . $_POST['Warrantyid'] . "'  ";

    $result = $conn->query($sql) or die($conn->error);
    if ($result) {

        header('Refresh:0; url=../warranty.php');

        echo "<script> alert('แก้ไขข้อมูลสำเร็จ'); </script>";
    } else {

        header('Refresh:0; url=../warranty.php');
        echo "<script> alert('แก้ไขข้อมูลไม่สำเร็จ'); </script>";
    }
}


if (isset($_POST['updateDelivery'])) {

    $sql = "UPDATE `delivery` SET `Delivery_Name`='" . $_POST['Deliveryname'] . "',`Delivery_Price`='" . $_POST['Price'] . "' WHERE `Delivery_ID` = '" . $_POST['Deliveryid'] . "'  ";

    $result = $conn->query($sql) or die($conn->error);
    if ($result) {

        header('Refresh:0; url=../delivery.php');
    } else {

        header('Refresh:0; url=../delivery.php');
    }
}
