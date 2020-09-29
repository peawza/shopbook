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




    <div class="container-fluid py-3">
        <div class="text-right">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    เพิ่มสินค้าใหม่
                </a>
                <!--
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Button with data-target
            </button>

            -->
            </p>
        </div>

        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="php/insert.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">ชื่อหนังสือ</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nameproduct" name="nameproduct" placeholder="ชื่อสินค้า" required>
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="exampleFormControlSelect1" class="py-2 col-sm-2">เลือกประเภทสินค้า</label>
                            <select class="form-control col-sm-5 mx-3" id="typeproduct" name="typeproduct" required>
                                <option value="" selected>กรุณาเลือกประเภทสินค้า</option>

                                <?php
                                $selectTypeproduct = "SELECT * FROM producttype";
                                $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                                while ($row = mysqli_fetch_array($resultTypeproduct)) { ?>
                                    <option value="<?php echo $row["Type_ID"]; ?>"><?php echo $row["Type_Name"]; ?></option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>
                        <input type="hidden" name="warrantyproduct" id="warrantyproduct" value="4">


                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">ราคาเช่าหนังสือ</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="price" name="price" min="1" placeholder="ราคาสินค้า" max='9999999' required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">บาท</label>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">จำนวนสินค้า</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="unit" step="1" name="unit" min="1" max='99999' placeholder="จำนวนสินค้า" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">เครื่อง</label>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">จำนวนที่ให้เช่าหนังสือ</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="rentday" step="1" name="unit" min="1" max='99999' placeholder="จำนวนสินค้า" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">วัน</label>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="py-2">รายละเอียดสินค้า</label>
                            <textarea class="form-control" id="detail" name="detail" rows="5" placeholder="รายละเอียดสินค้า" required></textarea>
                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-1 py-2">รูปสินค้า</label>
                            <div class="custom-file col-sm-5" data-callback=" PhotoChcallback">
                                <input type="file" class="custom-file-input product-file" id="file" aria-describedby="inputGroupFileAddon01" name="file">
                                <label class=" custom-file-label product-label" for="inputGroupFile01">เลือกไฟล์</label>
                            </div>
                        </div>
                        <figure class="figure d-none text-center m-2">
                            <img id="imgproduct" alt="product" class="figure-img img-fluid ">
                        </figure>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Close
                        </button>
                        <button type="submit" name="submitproduct" id="submitproduct" class="btn btn-primary" disabled>Save
                            changes</button>
                    </div>

                </form>


            </div>
        </div>


    </div>








    <div class="container">

        <div class="py-3">


            <?php
            ini_set('display_errors', 1);
            error_reporting(~0);
            //echo $_POST;
            $strKeyword = null;


            ?>

            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" <div class="form-group row">
                <label for="inputPassword" class="col-2 col-form-label py-2 ">ค้นหาชื่อสินค้า</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="txtKeyword" name="txtKeyword" placeholder="ค้นหาชื่อสินค้า" maxlength="50" value="<?php echo $strKeyword; ?>">
                </div>
                <div class="col-3">
                    <input class="btn btn-light" type="submit" value="Search">
                </div>
        </div>
        </form>

        <?php
        if (isset($_POST["txtKeyword"])) {
            //echo $_POST["txtKeyword"];
            $strKeyword = $_POST["txtKeyword"];
            $keyword =  ($strKeyword);
            //echo $keyword;
            $selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Product_Name` LIKE '%" . $keyword . "%' ";
            $resultproduct = mysqli_query($conn, $selectproduct);
            $selectproduct2 = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Product_Name` LIKE '%" . $keyword . "%' ";
            $resultproduct2 = mysqli_query($conn, $selectproduct);
            $ckrow = mysqli_fetch_array($resultproduct2);

            if (!isset($ckrow)) {

                //echo 'ไม่พบสินค้า';
        ?>
                <div class="col-7 text-center mx-auto ml-2">
                    <div class="alert alert-danger alert-dismissible fade show " role="alert">
                        !!!! ไม่พบสินค้าที่ค้นหาในระบบ
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>


        <?php

                $selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` ORDER BY `product`.`Product_Name` ASC";
                $resultproduct = mysqli_query($conn, $selectproduct);
            }
        } else {

            $selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` ORDER BY `product`.`Product_Name` ASC";
            $resultproduct = mysqli_query($conn, $selectproduct);
        }
        ?>


    </div>


    </div>

    <div class="container-fluid py-2">
        <div class="card ">
            <h5 class="card-header text-center">จัดการสินค้า</h5>

            <div class="py-2">
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                        <tr>
                            <th width="25%" class="text-center">ชื่อสินค้า</th>
                            <th width="15%" class="text-center">ประเภทสินค้า</th>
                            <th width="15%" class="text-center">ราคา</th>
                            <th width=" 15%" class="text-center">จำนวนคงเหลือ</th>
                            <th width="12%" class="text-center"></th>
                            <th width="12%" class="text-center"></th>
                            <th width="6%" class="text-center"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php



                        /*        
                        echo '<pre>';
                        print_r($resultproduct);
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
                                    [0] => 31
                                    [Product_ID] => 31
                                    [1] => 37
                                    [Type_ID] => 37
                                    [2] => sdasd
                                    [Product_Name] => sdasd
                                    [3] => asdasd
                                    [Product_Details] => asdasd
                                    [4] => 1000000000.00
                                    [Product_Price] => 1000000000.00
                                    [5] => 23
                                    [Product_Balance] => 23
                                    [6] => 12213
                                    [Product_Photo] => 12213
                                    [7] => 2020-03-11
                                    [date_save] => 2020-03-11
                                    [8] => 2
                                    [Warranty_ID] => 2
                                    [9] => 37
                                    [10] => adsadqdas
                                    [Type_Name] => adsadqdas
                                )



                        */

                        while ($rowproduct = mysqli_fetch_array($resultproduct)) {
                        ?>
                            <tr>

                                <th><?php echo $rowproduct["Product_Name"] ?></th>
                                <td><?php echo $rowproduct["Type_Name"] ?></td>
                                <td><?php echo $rowproduct["Product_Price"] ?></td>
                                <td><?php echo $rowproduct["Product_Balance"] ?></td>
                                <td>

                                    <div class="mx-auto text-center">
                                        <input type="button" name="edit" value="รายละเอียด" id="<?php echo $rowproduct["Product_ID"]; ?>" class="btn btn-info  btn-sm  view_dataproduct" />

                                    </div>


                                </td>
                                <td>
                                    <div class="mx-auto text-center">
                                        <input type="button" name="edit" value="แก้ไขข้อมูลสินค้า" id="<?php echo $rowproduct["Product_ID"]; ?>" class="btn btn-info  btn-sm  edit_dataproduct" />
                                        <div class="py-1"></div>
                                        <a href="updatephoto.php?product_ID=<?php
                                                                            echo $rowproduct["Product_ID"];
                                                                            ?>" class="btn btn-info  btn-sm  edit_dataphoto">
                                            เปลี่ยนรูปสินค้า

                                        </a>

                                    </div>


                                </td>
                                <td>
                                    <div class="text-center">
                                        <a href="php/delete.php?product_ID=<?php
                                                                            echo $rowproduct["Product_ID"];
                                                                            ?>" style="color:#000000" ">
                                                            <i class=" fas fa-trash-alt"></i></a>
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
                                <input type="text" class="form-control" id="nameproduct2" name="nameproduct2" placeholder="ชื่อสินค้า" required>
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
                        <?php
                        /*  ปิดประเภทรับประกันสินค้า
                        
                        ?>

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

                        <?php
                        */

                        ?>

                        <input type="hidden" name="warrantyproduct2" id="warrantyproduct2" value="4">



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
                                <input type="number" class="form-control" id="price2" name="price2" placeholder="ราคาสินค้า" min="1" max="9999999" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">บาท</label>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">จำนวนสินค้า</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="unit2" name="unit2" placeholder="จำนวนสินค้า" required min="1" max="9999">
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">เครื่อง</label>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="py-2">รายละเอียดสินค้า</label>
                            <textarea class="form-control" id="detail2" name="detail2" rows="5" placeholder="รายละเอียดสินค้า" required></textarea>
                        </div>



                        <input type="hidden" name="idproduct" id="idproduct" />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submitproduct" id="submitproduct" class="btn btn-primary">บันทึก</button>
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