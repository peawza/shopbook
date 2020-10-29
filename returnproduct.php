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




    $i = 1;

    $code = sprintf('O-%04d', $_GET['Order_id']);




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
                    'item_rentamount' =>     $_POST['rentamount'],
                    'item_productbuy' =>     $_POST['productbuy']

                );
                $_SESSION["returnbook"][$count] = $item_array;
                echo '<script>alert("เพิ่มรายการคืนหนังสือ")</script>';
                echo '<script>window.location="returnproduct.php?Order_id=' . $_GET['Order_id'] . '"</script>';
            } else {
                echo '<script>alert("มีรายการหนังสือนี้อยู่แล้ว")</script>';
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
                'item_rentamount' =>     $_POST['rentamount'],
                'item_productbuy' =>     $_POST['productbuy']
            );
            $_SESSION["returnbook"][0] = $item_array;
            echo '<script>alert("เพิ่มรายการคืนหนังสือ")</script>';
            echo '<script>window.location="returnproduct.php?Order_id=' . $_GET['Order_id'] . '"</script>';
        }
    }

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["returnbook"] as $keys => $values) {
                if ($values["item_id"] == $_GET["id"]) {
                    unset($_SESSION["returnbook"][$keys]);
                    echo '<script>alert("ยกเลิกรายการคืนหนังสือ")</script>';
                    echo '<script>window.location="returnproduct.php?Order_id=' . $_GET['Order_id'] . '"</script>';
                }
            }
        }
        if (isset($_POST["updatecart"])) {
            if ($_POST["updatecart"] == "updatecart") {

                $id = 0;
                $dataquantity = 0;



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
                            <th width="8%" class="text-center">รหัสหนังสือ</th>
                            <th width="10%" class="text-center">รูป</th>
                            <th width="20%" class="text-center">ชื่อหนังสือ</th>
                            <th width="9%" class="text-center">จำนวนที่เช่าหนังสือ</th>
                            <th width="15%" class="text-center">เช่าหนังสือวันที่</th>
                            <th width="11%" class="text-center">คืนหนังสือก่อนวันที่</th>
                            <th width="21%" class="text-center">คืนหนังสือ</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_GET['Order_id'])) {
                            $orderid = $_GET['Order_id'];
                            $selectproduct = "SELECT * FROM `orders`,`user`,`orderrent`,`product` WHERE `user`.`User_ID`=`orders`.`User_ID`AND`orders`.`orders_id`= `orderrent`.`orderrent_id`AND `product`.`Product_ID`=`orderrent`.`orderrent_productid` AND`orderrent`.`orderrent_id`= '" . $orderid . "'";
                            $resulproduct = mysqli_query($conn, $selectproduct);
                            while ($rowproduct = mysqli_fetch_array($resulproduct)) {
                                if ($rowproduct['orderrent_status'] == 0) {

                        ?>

                                    <tr>
                                        <th width="5% " class="text-right"><?php

                                                                            echo $i; ?>
                                        </th>
                                        <th width="8%" class="text-right"><?php echo $rowproduct["orderrent_productid"]  ?>
                                        </th>
                                        <th width="10%" class="text-center"><img class="img-responsive" src="img\product\<?php echo $rowproduct["Product_Photo"] ?>" alt="prewiew" width="120" height="80"></th>
                                        <td width="20%"><?php echo $rowproduct["Product_Name"]  ?></td>
                                        <td width="9%" class=" text-right"><?php echo $rowproduct["orderrent_amount"]  ?> </td>
                                        <td width="15%" class="text-center"><?php echo $rowproduct["orderrent_rentdate"]  ?></td>


                                        <td width="11%" class="text-center">


                                            <?php echo $rowproduct["orderrent_returndate"]  ?></td>

                                        <td width="21%" class="text-center">
                                            <form action="returnproduct.php?action=add&id=<?php echo $rowproduct["Product_ID"]; ?>&&Order_id=<?php echo $orderid  ?>" method="POST">

                                                <input class="form-control form-control-sm " type="Number" name="returnamount" id="returnamount" placeholder="จำนวนหนังสือที่คืน" min='0' max="<?php echo $rowproduct["orderrent_amount"]; ?>" required>
                                                <input type="hidden" name="idproduct" id="idproduct" value="<?php echo $rowproduct["Product_ID"]; ?>">
                                                <input type="hidden" name="productname" id="productname" value="<?php echo $rowproduct["Product_Name"]; ?>">
                                                <input type="hidden" name="productphoto" id="productphoto" value="<?php echo $rowproduct["Product_Photo"]; ?>">
                                                <input type="hidden" name="productprice" id="productprice" value="<?php echo $rowproduct["Product_Price"]; ?>">
                                                <input type="hidden" name="daterent" id="daterent" value="<?php echo $rowproduct["orderrent_rentdate"]; ?>">
                                                <input type="hidden" name="detereturn" id="detereturn" value="<?php echo $rowproduct["orderrent_returndate"]; ?>">
                                                <input type="hidden" name="rentamount" id="rentamount" value="<?php echo $rowproduct["orderrent_amount"]; ?>">
                                                <input type="hidden" name="productbuy" id="productbuy" value="<?php echo $rowproduct["product_buy"]; ?>">



                                                <button type="submit" class="btn btn-info  btn-lg btn-block " id="add_to_returnproduct" name="add_to_returnproduct">คืนหนังสือ</button>



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

                            ?>



                        <?php


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
                                <th width="8%" class="text-center">หนังสือหายปรับเล่มละ</th>
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
                                $totalall = 0;

                                $i = 0;
                                $z = 1;

                                foreach ($_SESSION["returnbook"] as $keys => $values) {
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

                                            $day--;
                                        }
                                    }
                                    $totalall += $total;


                            ?>
                                    <tr>

                                        <th width="5%" class="text-center"><?php echo $z ?></th>
                                        <th width="10%" class="text-center"><img class="img-responsive" src="img\product\<?php echo $values['item_photo'] ?>" alt="prewiew" width="120" height="80"></th>
                                        <th width="8%" class="text-center"><?php echo $values["item_name"] ?></th>
                                        <th width="8%" class="text-right"><?php echo $values["item_productbuy"] ?> บาท</th>
                                        <th width="12%" class="text-center"><?php echo $newDaterent ?></th>
                                        <th width="12%" class="text-center"><?php echo $newDatereturn ?></th>
                                        <th width="6%" class="text-center"><?php echo $values["item_rentamount"] ?></th>
                                        <th width="6%" class="text-center"><?php echo $values["item_amount"] ?></th>
                                        <th width="8%" class="text-right"><?php echo $total ?></th>
                                        <th width="3%" class=""><a href="returnproduct.php?action=delete&id=<?php echo $values["item_id"]; ?>&&Order_id=<?php echo $_GET['Order_id']; ?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a></th>
                                    </tr>
                            <?php
                                    $z++;
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>รวมทั้งหมด</th>
                                <th class="text-right"><?php echo $totalall
                                                        ?></th>
                                <th>บาท</th>
                            </tr>
                        </tfoot>



                        </thead>


                    </table>
                    <form action="php/insert.php?Order_id=<?php echo $_GET['Order_id'] ?>" method="POST">
                        <button type="submit" class="btn btn-success btn-lg  float-right  mb-2  mx-3 my-1 px-5 " id="insertreturnproduct" name="insertreturnproduct">ยืนยันการคืนหนังสือ</button>
                    </form>



                </div>
            </div>
        </div>




    <?php } ?>
















</body>
<?php
include('include\importjavascript.php');
?>

</html>