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
    echo '<pre>';
    echo 'get';
    print_r($_GET);
    echo ' post';
    print_r($_POST);
    echo 'SESSION';
    print_r($_SESSION);
    echo '<pre>';

    //print_r($_SESSION);
    //$_SESSION['ses_php_var'] = $_GET['sendVal'];
    //$_SESSION['ses_php_var'] = $_POST['sendVal'];
    //$_SESSION['Typeid'] = $_POST['Typeid'];

    //print_r($_GET);

    $i = 1;
    //echo ($_GET['Order_id']);
    $code = sprintf('O-%04d', $_GET['Order_id']);
    //echo ($code);

    if (isset($_POST["add_to_returnproduct"])) {
        if (isset($_SESSION["returnbook"])) {
            $item_array_id = array_column($_SESSION["returnbook"], "item_id");
            if (!in_array($_GET["id"], $item_array_id)) {
                $count = count($_SESSION["returnbook"]);
                $item_array = array(
                    'item_id'            =>    $_GET["id"],
                    'item_name'            =>    $_POST["hidden_name"],
                    'item_price'        =>    $_POST["hidden_price"],
                    'item_quantity'        =>    $_POST["quantity"],
                    'item_photo' =>     $_POST['hidden_photo'],
                    'item_Balance' =>     $_POST['hidden_Balance']

                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
            } else {
                echo '<script>alert("มีสินค้านี้อยู่ในตะกร้าสินค้าแล้ว")</script>';
            }
        } else {
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["quantity"],
                'item_photo' => $_POST['hidden_photo'],
                'item_Balance' =>     $_POST['hidden_Balance']
            );
            $_SESSION["returnbook"][0] = $item_array;
            echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
        }
    }

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "delete") {
            foreach ($_SESSION["returnbook"] as $keys => $values) {
                if ($values["item_id"] == $_GET["id"]) {
                    unset($_SESSION["returnbook"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="product_detail.php"</script>';
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
                            <th width="10%" class="text-center">ชื่อลูกค้า</th>
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
                                        id="returnamount" placeholder="จำนวนหนังสือที่คืน" min='0' max="max="
                                        <?php echo $rowproduct["orderrent_amount"]; ?>" required>
                                    <input type="hidden" name="idproduct" id="idproduct"
                                        value="<?php echo $rowproduct["Product_ID"]; ?>">
                                    <input type="hidden" name="productname" id="productname"
                                        value="<?php echo $rowproduct["Product_Name"]; ?>">
                                    <input type="hidden" name="productphoto" id="productphoto"
                                        value="<?php echo $rowproduct["Product_Photo"]; ?>">



                                    <input type="hidden" name="daterent" id="daterent"
                                        value="<?php echo $rowproduct["orderrent_rentdate"]; ?>">
                                    <input type="hidden" name="detereturn" id="detereturn"
                                        value="<?php echo $rowproduct["orderrent_returndate"]; ?>">



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


                            echo 'null';
                        }


                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>










</body>
<?php
include('include\importjavascript.php');
?>

</html>