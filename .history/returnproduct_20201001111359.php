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
    //echo '<pre>';
    //print_r($_SESSION);
    //$_SESSION['ses_php_var'] = $_GET['sendVal'];
    //$_SESSION['ses_php_var'] = $_POST['sendVal'];
    //$_SESSION['Typeid'] = $_POST['Typeid'];
    //print_r($_POST);
    //print_r($_GET);
    //echo '<pre>';

    ?>
</head>

<body>
    <div class="container-fluid py-2">
        <div class="card ">
            <h5 class="card-header text-center">หนังสือที่ยังไม่คืน</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">รหัสเช่าสินค้า</th>
                            <th width="10%" class="text-center">ชื่อลูกค้า</th>
                            <th width="17%" class="text-center">ที่อยู่ลูกค้า</th>
                            <th width="10%" class="text-center">ชื่อหนังสือ</th>
                            <th width="9%" class="text-center">จำนวนที่เช่าหนังสือ</th>
                            <th width="15%" class="text-center">เช่าหนังสือวันที่</th>
                            <th width="11%" class="text-center">คืนหนังสือก่อนวันที่</th>
                            <th width="12%" class="text-center">สถานะ</th>
                            <th width="12%" class="text-center"></th>

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
                        ?>
                        <tr>
                            <th><?php
                                        $code = sprintf('O-%04d', $rowproduct['orders_id']);
                                        echo $code ?>
                            </th>
                            <th><?php echo $rowproduct["User_Firstname"] . ' ' . $rowproduct['User_Lastname'] ?>
                            </th>
                            <td><?php echo $rowproduct["Order_addressuser"]  ?></td>
                            <td><?php echo $rowproduct["Product_Name"]  ?></td>
                            <td><?php echo $rowproduct["orderrent_amount"]  ?></td>

                        </tr>



                        <?php
                                //echo '<pre>';
                                //print_r($rowproduct);
                                //echo '<pre>';
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