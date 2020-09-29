<?php
require_once('php\connect.php');
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
*/





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

    //echo '<pre>';
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
                                }
                                ?>


                        <?php
                            }

                            ?>
                        <!-- END PRODUCT -->

                        <div class=" text-right ml-3  " style="margin: 10px">
                            การสั่งซื้อ: <b><?php echo $sumquantity ?> รายการ</b>
                        </div>
                        <br>

                        <div class=" text-right ml-3 " style="margin: 10px">

                            รวมทั้งหมด: <b><?php echo $total ?> บาท</b>
                        </div>

                    </form>

                    <hr>

                    <form action="cartsubmit.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="form-group row">
                                <label for="inputPassword"
                                    class="col-sm-2 col-form-label py-2 ">Userของผู้ใช้งานของลูกค้า</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">รหัสผ่าน</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" maxlength="20" required>
                                </div>


                            </div>

                        </div>
                        <input type="hidden" name="Totalprice" id="Totalprice" value="<?php echo $total ?>">
                </div>



                <div class="modal-footer">
                    <a href="cart.php" class="btn btn-secondary">
                        ยกเลิกการสั่งซื้อ
                    </a>


                    <button type="submit" name="submitcart" id="submitcart" class="btn btn-primary">ยืนยันผู้เช่าหนังสือ
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