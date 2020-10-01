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
    //print_r($_SESSION);
    //$_SESSION['ses_php_var'] = $_GET['sendVal'];
    //$_SESSION['ses_php_var'] = $_POST['sendVal'];
    //$_SESSION['Typeid'] = $_POST['Typeid'];
    //print_r($_POST);
    print_r($_GET);
    echo '<pre>';

    ?>
</head>

<body>
    <div class="container-fluid py-2">
        <div class="card ">
            <h5 class="card-header text-center">รายการหนังสือที่ยังไม่คืน</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">รหัสเช่าสินค้า</th>
                            <th width="10%" class="text-center">ชื่อลูกค้า</th>
                            <th width="17%" class="text-center">ที่อยู่ลูกค้า</th>
                            <th width="10%" class="text-center">ราคาเช่าหนังสือ</th>
                            <th width="9%" class="text-center">สถานะ</th>
                            <th width="18%" class="text-center"></th>
                            <th width="8%" class="text-center"></th>
                            <th width="12%" class="text-center"></th>
                            <th width="12%" class="text-center"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['Order_id'])) {
                            $orderid = $_GET['Order_id'];
                            $selectproduct = "SELECT * FROM `orders`,`user`,`orderrent` WHERE `user`.`User_ID`=`orders`.`User_ID`AND`orders`.`orders_id`= `orderrent`.`orderrent_id`AND `orderrent`.`orderrent_id`= '" . $orderid . "'";
                            $resulproduct = mysqli_query($conn, $selectproduct);
                            while ($rowproduct = mysqli_fetch_array($resulproduct)) {
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










</body>
<?php
include('include\importjavascript.php');
?>

</html>