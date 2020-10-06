<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    require_once('php/condbbook.php');
    include('include\importcss.php');
    include('include\navber.php');
    /*
    echo '<pre>';
    echo 'get';
    print_r($_GET);
    echo ' post';
    print_r($_POST);
    echo 'SESSION';
    print_r($_SESSION);
    echo '<pre>';
*/

    //print_r($_SESSION);
    //$_SESSION['ses_php_var'] = $_GET['sendVal'];
    //$_SESSION['ses_php_var'] = $_POST['sendVal'];
    //$_SESSION['Typeid'] = $_POST['Typeid'];

    //print_r($_GET);

    $i = 1;
    //echo ($_GET['Order_id']);
    $code = sprintf('O-%04d', $_GET['Order_id']);
    //echo ($code);

    /*
    [returnamount] => 1
    [idproduct] => 5
    [productname] => sadsazzz
    [productphoto] => 9091657504068.png
    [daterent] => 2020-09-30
    [detereturn] => 2020-10-20    
    */

    if (isset($_POST["add_to_returnproduct"])) {
        if (isset($_SESSION["returnbook"])) {
            $item_array_id = array_column($_SESSION["returnbook"], "item_id");
            if (!in_array($_GET["id"], $item_array_id)) {
                $count = count($_SESSION["returnbook"]);
                $item_array = array(
                    'item_id'            =>    $_POST["idproduct"],
                    'item_name'            =>    $_POST["productname"],
                    'item_amount'        =>    $_POST["returnamount"],
                    'item_price' => $_POST['productprice'],
                    'item_photo' => $_POST['productphoto'],
                    'item_daterent' =>     $_POST['daterent'],
                    'item_detereturn' =>     $_POST['detereturn'],
                    'item_rentamount' =>     $_POST['rentamount']

                );
                $_SESSION["returnbook"][$count] = $item_array;
                echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
                echo '<script>window.location="returnproduct.php?Order_id=' . $_GET['Order_id'] . '"</script>';
            } else {
                echo '<script>alert("มีสินค้านี้อยู่ในตะกร้าสินค้าแล้ว")</script>';
            }
        } else {
            $item_array = array(
                'item_id'            =>    $_POST["idproduct"],
                'item_name'            =>    $_POST["productname"],
                'item_amount'        =>    $_POST["returnamount"],
                'item_price' => $_POST['productprice'],
                'item_photo' => $_POST['productphoto'],
                'item_daterent' =>     $_POST['daterent'],
                'item_detereturn' =>     $_POST['detereturn'],
                'item_rentamount' =>     $_POST['rentamount']
            );
            $_SESSION["returnbook"][0] = $item_array;
            echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
            echo '<script>window.location="returnproduct.php?Order_id=' . $_GET['Order_id'] . '"</script>';
        }
    }

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["returnbook"] as $keys => $values) {
                if ($values["item_id"] == $_GET["id"]) {
                    unset($_SESSION["returnbook"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="returnproduct.php?Order_id=' . $_GET['Order_id'] . '"</script>';
                }
            }
        }
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

                    echo '<script>window.location="returnproduct.php?Order_id=' . $_GET['Order_id'] . '"</script>';
                }
            }
        }
    }




    ?>
</head>

<body>
    <div class="container-fluid py-2">
        <div class="card ">
            <h5 class="card-header text-center">รหัสเช่าสินค้า <?php echo $code; ?> ที่ยังไม่คืนหนังสือ</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">ลำดับ</th>
                            <th width="8%" class="text-center">ชื่อลูกค้า</th>
                            <th width="17%" class="text-center">ที่อยู่ลูกค้า</th>
                            <th width="10%" class="text-center">ชื่อหนังสือ</th>
                            <th width="9%" class="text-center">จำนวนที่เช่าหนังสือ</th>
                            <th width="15%" class="text-center">เช่าหนังสือวันที่</th>
                            <th width="11%" class="text-center">คืนหนังสือก่อนวันที่</th>
                            <th width="21%" class="text-center">คืนหนังสือ</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /*
                    [0] => 1
                    [orders_id] => 1
                    [1] => 4
                    [User_ID] => 4
                    [2] => ฟหดกหฟดกหฟด
                    [Order_addressuser] => ฟหดกหฟดกหฟด
                    [3] => 2464
                    [orders_renttotal] => 2464
                    [4] => 0
                    [orders_returntotal] => 0
                    [5] => 2464
                    [orders_sumtotal] => 2464
                    [6] => 0
                    [orders_iscomplete] => 0
                    [7] => 4
                    [8] => user
                    [User_Username] => user
                    [9] => $2y$10$fB6aRvLojb8vG3ukgnwcle6rynH6hiaSNAOSCfskrj2DL4A6y8HM6
                    [User_Password] => $2y$10$fB6aRvLojb8vG3ukgnwcle6rynH6hiaSNAOSCfskrj2DL4A6y8HM6
                    [10] => ศุภชัย
                    [User_Firstname] => ศุภชัย
                    [11] => แจ้งอรุณ
                    [User_Lastname] => แจ้งอรุณ
                    [12] => 0970562607
                    [User_Telephonenumber] => 0970562607
                    [13] => agileza_555@hotmail.com
                    [User_Email] => agileza_555@hotmail.com
                    [14] => 9091310863447.jpg
                    [User_Photo] => 9091310863447.jpg
                    [15] => 2020-09-26
                    [User_Createdate] => 2020-09-26
                    [16] => admin
                    [User_Type] => admin
                    [17] => 1
                    [orderrent_id] => 1
                    [18] => 4
                    [orderrent_productid] => 4
                    [19] => 1
                    [orderrent_amount] => 1
                    [20] => 1232
                    [orderrent_totalprice] => 1232
                    [21] => 2020-09-30
                    [orderrent_rentdate] => 2020-09-30
                    [22] => 2020-10-20
                    [orderrent_returndate] => 2020-10-20
                    [23] => 0
                    [orderrent_status] => 0
                    [24] => 4
                    [Product_ID] => 4
                    [25] => 3
                    [Type_ID] => 3
                    [26] => sadsazzz
                    [Product_Name] => sadsazzz
                    [27] => asdasd
                    [Product_Details] => asdasd
                    [28] => 1232
                    [Product_Price] => 1232
                    [29] => 113
                    [Product_Balance] => 113
                    [30] => 2
                    [Product_rentday] => 2
                    [31] => 9091656962219.png
                    [Product_Photo] => 9091656962219.png
                    [32] => 2020-09-30
                    [Product_datesave] => 2020-09-30
                                        
                        */
                        if (isset($_GET['Order_id'])) {
                            $orderid = $_GET['Order_id'];
                            $selectproduct = "SELECT * FROM `orders`,`user`,`orderrent`,`product` WHERE `user`.`User_ID`=`orders`.`User_ID`AND`orders`.`orders_id`= `orderrent`.`orderrent_id`AND `product`.`Product_ID`=`orderrent`.`orderrent_productid` AND`orderrent`.`orderrent_id`= '" . $orderid . "'";
                            $resulproduct = mysqli_query($conn, $selectproduct);
                            while ($rowproduct = mysqli_fetch_array($resulproduct)) {
                                if ($rowproduct['orderrent_status'] == 0) {
                                    # code...


                        ?>

                        <tr>
                            <th class="text-right"><?php
                                                                //$code = sprintf('O-%04d', $rowproduct['orders_id']);
                                                                echo $i; ?>
                            </th>
                            <th><?php echo $rowproduct["User_Firstname"] . ' ' . $rowproduct['User_Lastname'] ?>
                            </th>
                            <td><?php echo $rowproduct["Order_addressuser"]  ?></td>
                            <td><?php echo $rowproduct["Product_Name"]  ?></td>
                            <td class=" text-right"><?php echo $rowproduct["orderrent_amount"]  ?> </td>
                            <td class="text-center"><?php echo $rowproduct["orderrent_rentdate"]  ?></td>


                            <td class="text-center">


                                <?php echo $rowproduct["orderrent_returndate"]  ?></td>

                            <td class="text-center">
                                <form
                                    action="returnproduct.php?action=add&id=<?php echo $rowproduct["Product_ID"]; ?>&&Order_id=<?php echo $orderid  ?>"
                                    method="POST">

                                    <input class="form-control form-control-sm " type="Number" name="returnamount"
                                        id="returnamount" placeholder="จำนวนหนังสือที่คืน" min='0'
                                        max="<?php echo $rowproduct["orderrent_amount"]; ?>" required>
                                    <input type="hidden" name="idproduct" id="idproduct"
                                        value="<?php echo $rowproduct["Product_ID"]; ?>">
                                    <input type="hidden" name="productname" id="productname"
                                        value="<?php echo $rowproduct["Product_Name"]; ?>">
                                    <input type="hidden" name="productphoto" id="productphoto"
                                        value="<?php echo $rowproduct["Product_Photo"]; ?>">
                                    <input type="hidden" name="productprice" id="productprice"
                                        value="<?php echo $rowproduct["Product_Price"]; ?>">
                                    <input type="hidden" name="daterent" id="daterent"
                                        value="<?php echo $rowproduct["orderrent_rentdate"]; ?>">
                                    <input type="hidden" name="detereturn" id="detereturn"
                                        value="<?php echo $rowproduct["orderrent_returndate"]; ?>">
                                    <input type="hidden" name="rentamount" id="rentamount"
                                        value="<?php echo $rowproduct["orderrent_amount"]; ?>">



                                    <button type="submit" class="btn btn-info  btn-lg btn-block "
                                        id="add_to_returnproduct" name="add_to_returnproduct">คืนหนังสือ</button>



                                </form>




                            </td>










                        </tr>



                        <?php
                                    //}if($rowproduct['orderrent_status'] == 0) 
                                    $i++;
                                }
                                //echo '<pre>';
                                //print_r($rowproduct);
                                //echo '<pre>';
                                //while rowproduct = mysqli_fetch_array($resulproduct
                            }
                        } else {


                            echo '<script>window.location="rentproductall.php"</script>';
                        }


                        ?>
                    </tbody>
                    </thead>
                </table>



            </div>
        </div>
    </div>

    <br>
    <?php if (!empty($_SESSION["returnbook"])) {
    ?>
    <div class="container-fluid py-2">
        <div class="card ">
            <h5 class="card-header text-center">รหัสเช่าหนังสือ <?php echo $code; ?> หนังสือที่คืน</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">ลำดับ</th>
                            <th width="10%" class="text-center">รูปหนังสือ</th>
                            <th width="8%" class="text-center">ชื่อหนังสือ</th>
                            <th width="8%" class="text-center">ราคาหนังสือ</th>
                            <th width="12%" class="text-center">วันที่เช่า</th>
                            <th width="12%" class="text-center">วันที่ต้องคืน</th>
                            <th width="6%" class="text-center">จำนวนหนังสือที่เช่า</th>
                            <th width="6%" class="text-center">จำนวนหนังสือที่คืน</th>
                            <th width="8%" class="text-center">ค่าปรับทั้งหมด</th>
                            <th width="3%" class=""> </th>




                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($_SESSION["returnbook"])) {
                                $total = 0;
                                $sumquantity = 0;
                                $i = 0;
                                $z = 1;
                                /*
                                 [item_id] => 4
                                [item_name] => sadsazzz
                                [item_amount] => 1
                                [item_price] => 1232
                                [item_photo] => 9091656962219.png
                                [item_daterent] => 2020-09-30
                                [item_detereturn] => 2020-10-20
                                [item_rentamount] => 1
                                */
                                foreach ($_SESSION["returnbook"] as $keys => $values) {

                                    $originaldaterent = $values["item_daterent"];
                                    $newDaterent = date("d / m / Y", strtotime($originaldaterent));
                                    $originalDatereturn = $values["item_detereturn"];
                                    $newDatereturn = date("d / m / Y", strtotime($originalDatereturn));
                            ?>
                        <tr>

                            <th width="5%" class="text-center"><?php echo $z ?></th>
                            <th width="10%" class="text-center"><img class="img-responsive"
                                    src="img\product\<?php echo $values['item_photo'] ?>" alt="prewiew" width="120"
                                    height="80"></th>
                            <th width="8%" class="text-center"><?php echo $values["item_name"] ?></th>
                            <th width="8%" class="text-right"><?php echo $values["item_price"] ?> บาท</th>
                            <th width="12%" class="text-center"><?php echo $newDaterent ?></th>
                            <th width="12%" class="text-center"><?php echo $newDatereturn ?></th>
                            <th width="6%" class="text-center"><?php echo $values["item_rentamount"] ?></th>
                            <th width="6%" class="text-center"><?php echo $values["item_amount"] ?></th>
                            <th width="8%" class="text-center">ค่าปรับทั้งหมด</th>
                            <th width="3%" class=""><a
                                    href="returnproduct.php?action=delete&id=<?php echo $values["item_id"]; ?>&&. $_GET['Order_id'] .">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a></th>
                        </tr>
                        <?php
                                    $z++;
                                }
                            }
                            ?>
                    </tbody>
                    </thead>
                </table>



            </div>
        </div>
    </div>




    <?php } ?>



    <br>
    <?php if (!empty($_SESSION["returnbook"])) {
    ?>
    <div class="container ">

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
                                <h4 class="product-name"><strong><?php echo $values["item_name"] ?></strong>
                                </h4>
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
                                            title="Qty" class="qty" size="6">
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
                                                    <input type="button" value="+" class="plus">
                                                    <input type="button" value="-" class="minus">
                                        -->

                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 col-md-2 text-right">
                                    <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" class="btn
                                    btn-outline-danger btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
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


                        <div class="row">
                            <div class="col float-left text-left">
                                <button type=" submit" name="updatecart" id="updatecart" value="updatecart"
                                    class="btn btn-outline-secondary  btn-sm">
                                    คำนวนรายการสินค้าใหม่
                                </button>

                    </form>
                    <button type=" submit" name="deletecart" id="deletecart" value="deletecart"
                        class="btn btn-outline-secondary  btn-sm">
                        ลบสินค้าทั้งหมด
                    </button>

                </div>



                <div class="col float-right text-right">
                    <a href="cartsub.php" class="btn btn-success btn-sm ">สั่งซื้อสินค้า</a>
                </div>


            </div>


        </div>
        <div class="card-footer">

            <div class=" text-right ml-3  " style="margin: 10px">
                การสั่งซื้อ: <b><?php echo $sumquantity ?> รายการ</b>
            </div>
            <br>

            <div class=" text-right ml-3 " style="margin: 10px">

                รวมทั้งหมด: <b><?php echo $total ?> บาท</b>
            </div>
        </div>
    </div>
    </div>

    </div>
    <?php }

    ?>










</body>
<?php
include('include\importjavascript.php');
?>

</html>