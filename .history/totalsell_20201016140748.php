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
*/



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    include('include\importcss.php');
    include('include\navber.php');

    //print_r($_SESSION);
    //$_SESSION['ses_php_var'] = $_GET['sendVal'];
    //$_SESSION['ses_php_var'] = $_POST['sendVal'];
    //$_SESSION['Typeid'] = $_POST['Typeid'];
    //print_r($_POST);
    ?>
</head>


<body>










    </div>

    <div class="container-fluid py-2">
        <div class="card ">
            <h5 class="card-header text-center">รายงานสรุปการขายสินค้า</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">ชื่อสินค้า</th>
                            <th width="15%" class="text-center"></th>
                            <th width="15%" class="text-center">ชื่อหนังสือ</th>
                            <th width="15%" class="text-center">หนังสือคงเหลือ</th>
                            <th width="12%" class="text-center">หนังสือที่หายไป</th>
                            <th width="12%" class="text-center">ค่าปรับหนังสือทั้งหมด</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php


                        $selectproduct = "SELECT `productloss`.`Product_ID`, `product`.`Product_Name`,`product`.`Product_Photo`,`product`.`Product_Balance`, SUM(`productloss`.`productloss_amount`) AS `amount`, SUM(`productloss`.`productloss_price`) AS `price` FROM `productloss`, `product` 
                        WHERE `productloss`.`Product_ID` = `product`.`Product_ID` 
                        GROUP BY `product`.`Product_ID`";
                        $resultproduct = mysqli_query($conn, $selectproduct);



                        while ($rowproduct = mysqli_fetch_array($resultproduct)) {
                            /*
                            echo '<pre>';
                            print_r($rowproduct);
                            echo '<pre>';                            
                            [0] => 3

                            [Product_ID] => 3
                            [1] => sadsazzza
                            [Product_Name] => sadsazzza
                            [2] => 9091656887235.png
                            [Product_Photo] => 9091656887235.png
                            [3] => 75
                            [Product_Balance] => 75
                            [4] => 2
                            [amount] => 2
                            [5] => 402
                            [price] => 402
                            
                            */
                        ?>
                        <tr>
                            <th><?php echo $rowproduct["Product_ID"] ?></th>
                            <th width="10%" class="text-center"><img class="img-responsive"
                                    src="img\product\<?php echo $rowproduct["Product_Photo"] ?>" alt="prewiew"
                                    width="120" height="80"></th>
                            <th><?php echo $rowproduct["Product_Name"] ?></th>
                            <td><?php echo $rowproduct["Product_Balance"] ?></td>
                            <td><?php echo $rowproduct["amount"] ?></td>
                            <td><?php echo $rowproduct["price"] ?></td>


                        </tr>

                        <?php
                        }
                        ?>

                    </tbody>


                </table>


            </div>
        </div>
    </div>




















    <?php
    include('include\importjavascript.php');
    ?>