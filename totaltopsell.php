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
            <h5 class="card-header text-center">รายงานอันดับสินค้าขายดี 20 อันดับ</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="5" class="text-center">อันดับ</th>
                            <th width="20%" class="text-center">ชื่อสินค้า</th>
                            <th width="15%" class="text-center">ประเภทสินค้า</th>
                            <th width="15%" class="text-center">ราคา</th>
                            <th width="15%" class="text-center">จำนวนคงเหลือ</th>
                            <th width="12%" class="text-center">จำนวนที่ขายได้</th>
                            <th width="12%" class="text-center">เงินที่ขายได้</th>
                            <th width="6%" class="text-center"></th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;


                        $selectproduct = "SELECT `ordersalesdetail`.`product_ID`,`product`.`Product_Name`,producttype.Type_Name,product.Product_Price,product.Product_Balance, SUM(`ordersalesdetail`.`ordersalesDetail_unit`) `orderTotal`, SUM(`ordersalesdetail`.`ordersalesdetail_ price`) `orderTotalprice` FROM `ordersalesdetail`,`product` ,`producttype` WHERE `product`.`Product_ID`= `ordersalesdetail`.`product_ID` AND product.Type_ID= producttype.Type_ID GROUP BY product_ID ORDER BY `orderTotal` DESC LIMIT 20";
                        $resultproduct = mysqli_query($conn, $selectproduct);



                        while ($rowproduct = mysqli_fetch_array($resultproduct)) {
                        ?>
                        <tr>
                            <th><?php echo ($i++); ?></th>

                            <th><?php echo $rowproduct["Product_Name"] ?></th>
                            <td><?php echo $rowproduct["Type_Name"] ?></td>
                            <td><?php echo $rowproduct["Product_Price"] ?></td>
                            <td><?php echo $rowproduct["Product_Balance"] ?></td>
                            <td><?php echo $rowproduct["orderTotal"] ?></td>
                            <td><?php echo $rowproduct["orderTotalprice"] ?></td>
                            <td>

                                <div class="mx-auto text-center">
                                    <input type="button" name="edit" value="รายละเอียด"
                                        id="<?php echo $rowproduct["product_ID"]; ?>"
                                        class="btn btn-info  btn-sm  view_dataproduct" />

                                </div>


                            </td>

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
</body>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">รายละเอียดสินค้า</h4>
            </div>
            <div class="modal-body" id="detailproduct">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<div id="add_dataproduct_Modal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขสินค้า</h4>
            </div>
            <div class="modal-body">

                <form action="php/update.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">ชื่อสินค้า</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nameproduct2" name="nameproduct2"
                                    placeholder="ชื่อสินค้า" required>
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="exampleFormControlSelect1" class="py-2 col-sm-2">ประเภทสินค้า</label>
                            <select class="form-control col-sm-5 mx-3" id="idproduct3" name="idproduct3" required>
                                <option value="" selected>กรุณาเลือกประเภทสินค้า</option>
                                <?php
                                $selectwarranty = "SELECT * FROM producttype";
                                $resultwarranty = mysqli_query($conn, $selectwarranty);
                                while ($rowwarranty = mysqli_fetch_array($resultwarranty)) { ?>
                                <option value="<?php echo $rowwarranty["Type_ID"]; ?>">
                                    <?php echo $rowwarranty["Type_Name"]; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>


                        <div class=" form-group row">
                            <label for="exampleFormControlSelect1"
                                class="py-2 col-sm-2">เลือกประเภทการรับประกันสินค้า</label>
                            <select class="form-control col-sm-5 mx-3" id="warrantyproduct2" name="warrantyproduct2"
                                required>
                                <option value="" selected>กรุณาเลือกประเภทการรับประกันสินค้า</option>

                                <?php
                                $selectwarranty = "SELECT * FROM warranty";
                                $resultwarranty = mysqli_query($conn, $selectwarranty);
                                while ($rowwarranty = mysqli_fetch_array($resultwarranty)) { ?>
                                <option value="<?php echo $rowwarranty["Warranty_ID"]; ?>">
                                    <?php echo $rowwarranty["Warranty_Name"]; ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>


                        <!--


                         <div class=" form-group row">
                            <label for="exampleFormControlSelect1" class="py-2 col-sm-2">สินค้า</label>
                            <select class="form-control col-sm-5 mx-3" id="idproduct3" name="idproduct3" required>
                                <option value="" selected>กรุณาเลือกประเภทการรับประกันสินค้า</option>

                                <?php
                                $selectwarranty = "SELECT * FROM product";
                                $resultwarranty = mysqli_query($conn, $selectwarranty);
                                while ($rowwarranty = mysqli_fetch_array($resultwarranty)) { ?>
                                <option value="<?php echo $rowwarranty["Type_ID"]; ?>">
                                    <?php echo $rowwarranty["Type_ID"]; ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class=" form-group row">
                            <label for="exampleFormControlSelect1"
                                class="py-2 col-sm-2">เลือกประเภทการรับประกันสินค้า</label>
                            <select class="form-control col-sm-5 mx-3" id="warrantyproduct3" name="warrantyproduct3"
                                required>
                                <option value="" selected>กรุณาเลือกประเภทการรับประกันสินค้า</option>
                                <option value="2" selected>123</option>
                                <option value="4" selected>4533</option>
                                <option value="5" selected>4455</option>
                                <option value="6" selected>123456</option>

                            </select>
                        </div>
                        -->


                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">ราคาสินค้า</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="price2" name="price2"
                                    placeholder="ราคาสินค้า" min="1" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">บาท</label>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">จำนวนสินค้า</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="unit2" name="unit2"
                                    placeholder="จำนวนสินค้า" required min="1">
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">เครื่อง</label>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="py-2">รายละเอียดสินค้า</label>
                            <textarea class="form-control" id="detail2" name="detail2" rows="5"
                                placeholder="รายละเอียดสินค้า" required></textarea>
                        </div>



                        <input type="hidden" name="idproduct" id="idproduct" />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submitproduct" id="submitproduct"
                                class="btn btn-primary">บันทึก</button>
                        </div>
                </form>


                <!--
                    <form method="post" id="update_form" action="php/update.php">
                    <label>ชื่อสินค้า</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />

                   <input type="hidden" name="product_ID" id="product_ID" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
                
                    -->
            </div>

        </div>
    </div>
</div>




<script>

</script>