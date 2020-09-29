<?php
require_once('php\condbbook.php');
//$connect = mysqli_connect("localhost", "root", "", "testing");
//$connect = mysqli_connect("localhost", "root", "", "shop");
//$query = "SELECT * FROM producttype ORDER BY `Type_ID` DESC"; // แก้ที่อยู่
//$result = mysqli_query($conn, $query);


//$rowproduct = mysqli_fetch_array($resultproduct);
/*
echo '<pre>';
//print_r($resultproduct);
$rowproduct = mysqli_fetch_array($resultproduct);
print_r($rowproduct);
//echo $rowproduct["Type_Name"];

while ($rowproduct = mysqli_fetch_array($resultproduct)) {
    echo "<br>";
    echo ($rowproduct["Product_ID"]);
}
echo '</pre>';

Array
(
    [nameproduct] => sadsazzz
    [addressuser] => ฟฟฟฟฟฟฟ
    [numberphone] => 0827957256
    [Delivery] => 1
    [Totalprice] => 700
    [submitcart] => 
)

Array ( [Delivery_ID] => 1 
[Delivery_Name] => EMS 
[Delivery_Price] => 200 )

*/
//echo '<pre>';
//print_r($_POST);
//echo $_POST['Delivery'];
//echo '</pre>';
//$sqlselect = ("SELECT `Delivery_ID`, `Delivery_Name`, `Delivery_Price` FROM `delivery` WHERE `Delivery_ID` = '" . $_POST['Delivery'] . "' ");
//$resultselect = $conn->query($sqlselect);
//$rowselect = $resultselect->fetch_assoc();
//print_r($rowselect);

print_r($_POST);



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="include/CSS/Csscart.css?v=<?php echo filemtime('include/CSS/styles.css'); ?>"
        type=" text/css">
    <?php


    include('include\importcss.php');
    include('include\navber.php');

    // echo '<pre>';
    //print_r($_SESSION);
    //echo '</pre>';



    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                if ($values["item_id"] == $_GET["id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }
    if (isset($_GET["act"])) {

        if (isset($_POST["updatecart"])) {
            if ($_POST["updatecart"] == "updatecart") {
                //echo '1234';
                $id = 0;
                $dataquantity = 0;

                // name="quantity<?php echo $quantity++ 

                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    if ($_SESSION["shopping_cart"][$keys]['item_id'] == $_POST["product_id" . $id++]) {

                        $_SESSION['shopping_cart'][$keys]['item_quantity'] = $_POST['quantity' . $dataquantity++];
                    }
                }
            }
        }
        if (isset($_POST["deletecart"])) {

            if ($_POST["deletecart"] = 'deletecart') {

                $pc = 0;
                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                    unset($_SESSION["shopping_cart"][$keys]);

                    echo '<script>window.location="shopproduct.php"</script>';
                }
            }
        }
    }


    ?>



    <?php
    $id = 0; //1
    $name = 0; //2
    $price = 0; //3                                        
    $quantity = 0; //4
    $photo = 0; //5
    $Balance = 0; //6



    ?>
</head>


<body>
    <?php if (!empty($_SESSION["shopping_cart"])) {
    ?>
    <div class="container py-4">

        <div class="container">
            <div class="card shopping-cart">
                <div class="card-header bg-dark ">
                    <div class="row">
                        <div class="text-light col-2">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            รายการสินค้า
                        </div>
                        <div class="col-8"></div>

                        <div class="text-right col-2">
                            <a href="shopproduct.php"
                                class="btn btn-outline-info btn-sm pull-right">เลือกซื้อสินค้าเพิ่มเติม</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="?act=update" method="post">
                        <?php
                            if (!empty($_SESSION["shopping_cart"])) {
                                $total = 0;
                                $totaldelivery = 0;

                                $sumquantity = 0;
                                $i = 0;
                                foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                            ?>

                        <!-- PRODUCT -->
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="img\product\<?php echo $values['item_photo'] ?>"
                                    alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong><?php echo $values["item_name"] ?></strong></h4>
                                <h4>
                                    <small></small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                    <h6><strong><?php echo $values["item_price"] ?> <span class="text-muted">
                                                บาท</span></strong></h6>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <div class="quantity">
                                        <input type="number" step="1" max="<?php echo $values["item_Balance"] ?>"
                                            min="1" value="<?php echo $values["item_quantity"] ?>"
                                            name="quantity<?php echo $i ?>" id="<?php echo $values["item_id"] ?>"
                                            title="Qty" class="qty" size="2" disabled>
                                        <input type="hidden" name="product_id<?php echo $i++ ?>"
                                            value="<?php echo $values["item_id"] ?>">
                                        <input type="hidden" name="price<?php echo $i ?>"
                                            value="<?php echo $values["item_price"] ?>">
                                        <input type="hidden" name="name<?php echo $i ?>"
                                            value="<?php echo $values["item_name"] ?>">
                                        <input type="hidden" name="photo<?php echo $i ?>"
                                            value="<?php echo $values["item_photo"] ?>">
                                        <input type="hidden" name="Balance<?php echo $i ?>"
                                            value="<?php echo $values["item_Balance"] ?>">
                                        <input type="hidden" name="side_name<?php echo $i ?>"
                                            value="<?php echo $values["item_Balance"] ?>">
                                        <!--
                                        side_name
                                        
                                        $_POST["product_id" . $id++])
                                                    'item_id'            =>    $_GET["id"],1
                                                    'item_name'            =>    $_POST["hidden_name"],2
                                                    'item_price'        =>    $_POST["hidden_price"],3
                                                    'item_quantity'        =>    $_POST["quantity"],4
                                                    'item_photo' =>     $_POST['hidden_photo'],5
                                                    'item_Balance' =>     $_POST['hidden_Balance']6
                                        -->
                                    </div>
                                </div>

                            </div>
                        </div>



                        <hr>
                        <?php
                                    $x = $i;

                                    $sumquantity = $sumquantity + $values["item_quantity"];
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    $totaldelivery = $total;
                                }
                                ?>


                        <?php
                            }

                            ?>
                        <!-- END PRODUCT -->

                        <div class=" text-right ml-3  " style="margin: 10px">
                            การสั่งซื้อ: <b><?php echo $sumquantity ?> รายการ</b>
                        </div>

                        <div class=" text-right ml-3 " style="margin: 10px">

                            ค่าสินค่า <b><?php echo $total ?> บาท</b>
                        </div>

                        <div class=" text-right ml-3 " style="margin: 10px">

                            รวมทั้งหมด: <b><?php echo $totaldelivery ?> บาท</b>
                        </div>

                    </form>

                    <hr>

                    <form action="php\insert.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group row">
                                <label for="inputPassword"
                                    class="col-sm-2 col-form-label py-2 ">ชื่อผู้รับสินค้า</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nameproduct" name="nameproduct"
                                        placeholder="ชื่อนามสกุล" value="<?php echo $_POST['nameproduct'] ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="py-2">ที่อยู่ในการส่งสินค้า</label>
                                <textarea class="form-control" id="addressuser2" name="addressuser2" rows="5"
                                    placeholder="ที่อยู่ในการส่งสินค้า"
                                    disabled><?php echo $_POST['addressuser'] ?></textarea>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">เบอร์โทรติดต่อ</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="numberphone" name="numberphone"
                                        placeholder="เบอร์โทรติดต่อ" value="<?php echo $_POST['numberphone'] ?>"
                                        disabled>
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="exampleFormControlSelect1" class="py-2 col-sm-2">เลือกการจัดส่ง</label>
                                <select class="form-control col-sm-5 mx-3" id="Delivery2" name="Delivery2" required
                                    disabled>
                                    <option value="" selected>กรุณาเลือกประเภทการจัดส่งสินค้า</option>

                                    <?php
                                        $selectDelivery = "SELECT `Delivery_ID`, `Delivery_Name`, `Delivery_Price` FROM `delivery`";
                                        $resultDelivery = mysqli_query($conn, $selectDelivery);
                                        while ($rowDelivery = mysqli_fetch_array($resultDelivery)) { ?>
                                    <option value="<?php echo $rowDelivery["Delivery_ID"]; ?>" <?php if ($rowDelivery["Delivery_ID"] == $_POST['Delivery']) {
                                                                                                            echo "selected='selected'";
                                                                                                        } ?>>
                                        <?php echo $rowDelivery["Delivery_Name"] . "   (" . $rowDelivery["Delivery_Price"] . ") บาท"; ?>
                                    </option>

                                    <?php
                                        }
                                        ?>

                                </select>
                            </div>
                            <input type="hidden" name="addressuser" id="addressuser"
                                value="<?php echo $_POST['addressuser'] ?>">
                            <input type="hidden" name="Delivery" id="Delivery" value="<?php echo $_POST['Delivery'] ?>">
                            <input type="hidden" name="Totalprice" id="Totalprice" value="<?php echo $totaldelivery ?>">
                            <input type="hidden" name="phone" id="phone" value="<?php echo $_POST['numberphone'] ?>">
                            <input type="hidden" name="nameusersend" id="nameusersend"
                                value="<?php echo $_POST['nameproduct'] ?>">
                            <input type="hidden" name="tel" id="tel" value="<?php echo $_POST['numberphone'] ?>">
                        </div>



                        <div class="modal-footer">

                            <a href="cartsubmit.php" class="btn btn-secondary">
                                ยกเลิกการสั่งซื้อ
                            </a>
                            <button type="submit" name="submitcart" id="submitcart"
                                class="btn btn-primary">ยืนยันการสั่งซื้อสินค้า
                            </button>
                    </form>
                </div>


            </div>
        </div>
    </div>



    </div>
    <div class="card-footer">

    </div>
    <?php } else {

        echo '<script>window.location="shopproduct.php"</script>';







    ?>
    <?php }
    ?>
</body>
<?php

include('include\importjavascript.php');
?>