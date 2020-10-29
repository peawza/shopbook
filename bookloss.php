<?php
require_once('php\condbbook.php');
?>


<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="img\index\logo.png">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานหนังสือหาย</title>
    <?php

    include('include\importcss.php');
    include('include\navber.php');


    ?>
</head>


<body>










    </div>

    <div class="container-fluid py-2">
        <div class="card ">
            <h5 class="card-header text-center">รายงานสรุปหนังสือหาย</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>

                            <th width="15%" class="text-center"></th>
                            <th width="10%" class="text-center">รหัสหนังสือ</th>
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

                        ?>
                        <tr>
                            <th width="10%" class="text-center"><img class="img-responsive"
                                    src="img\product\<?php echo $rowproduct["Product_Photo"] ?>"
                                    alt="<?php echo $rowproduct["Product_Photo"] ?>" width="120" height="80"></th>
                            <th class="text-right"><?php echo $rowproduct["Product_ID"] ?></th>

                            <th class="text-life"><?php echo $rowproduct["Product_Name"] ?></th>
                            <td class="text-right"><?php echo $rowproduct["Product_Balance"] ?>&nbsp เล่ม</td>
                            <td class="text-right"><?php echo $rowproduct["amount"] ?> &nbsp เล่ม</td>
                            <td class="text-right"><?php echo $rowproduct["price"] ?>&nbsp บาท</td>


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