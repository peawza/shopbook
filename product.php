<?php



require_once('php\condbbook.php');


?>


<link rel="icon" href="img\index\logo.png">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สินค้า</title>
    <?php

    include('include\importcss.php');
    include('include\navber.php');


    ?>
</head>


<body>




    <div class="container-fluid py-3">
        <div class="text-right">
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    เพิ่มหนังสือใหม่
                </a>

            </p>
        </div>

        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="php/insert.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">ชื่อหนังสือ</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nameproduct" name="nameproduct"
                                    placeholder="ชื่อสินค้า" required>
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
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">ราคาหนังสือที่ซื้อมา</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="productbuy" name="productbuy" min="1"
                                    placeholder="ราคาหนังสือที่ซื้อมา" max='9999999' required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">บาท</label>
                        </div>



                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">ราคาเช่าหนังสือ</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="price" name="price" min="1"
                                    placeholder="ราคาเช่าหนังสือ" max='9999999' required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">บาท</label>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">จำนวนสินค้า</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="unit" step="1" name="unit" min="1"
                                    max='99999' placeholder="จำนวนสินค้า" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">เล่ม</label>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword"
                                class="col-sm-2 col-form-label py-2">จำนวนวันที่ให้เช่าหนังสือ</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="rentday" step="1" name="rentday" min="1"
                                    max='99999' placeholder="จำนวนวันที่ให้เช่า" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">วัน</label>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="py-2">รายละเอียดหนังสือ</label>
                            <textarea class="form-control" id="detail" name="detail" rows="5"
                                placeholder="รายละเอียดหนังสือ" required></textarea>
                        </div>

                        <div class="form-group row ">

                            <label class="col-sm-1 py-2">รูปหนังสือ</label>
                            <div class="custom-file col-sm-5" data-callback=" PhotoChcallback">
                                <input type="file" class="custom-file-input product-file" id="file"
                                    aria-describedby="inputGroupFileAddon01" name="file">
                                <label class=" custom-file-label product-label" for="inputGroupFile01">เลือกไฟล์</label>
                            </div>
                        </div>
                        <figure class="figure d-none text-center m-2">
                            <img id="imgproduct" alt="product" class="figure-img img-fluid ">
                        </figure>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Close
                        </button>
                        <button type="submit" name="submitproduct" id="submitproduct" class="btn btn-primary"
                            disabled>Save
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

            $strKeyword = null;


            ?>

            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" <div
                class="form-group row">
                <label for="inputPassword" class="col-2 col-form-label py-2 ">ค้นหาชื่อหนังสือ</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="txtKeyword" name="txtKeyword"
                        placeholder="ค้นหาชื่อหนังสือ" maxlength="50" value="<?php echo $strKeyword; ?>">
                </div>
                <div class="col-3">
                    <input class="btn btn-light" type="submit" value="Search">
                </div>
        </div>
        </form>

        <?php
        if (isset($_POST["txtKeyword"])) {

            $strKeyword = $_POST["txtKeyword"];
            $keyword =  ($strKeyword);

            $selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Product_Name` LIKE '%" . $keyword . "%'  ORDER BY `product`.`Type_ID` ASC";
            $resultproduct = mysqli_query($conn, $selectproduct);
            $selectproduct2 = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Product_Name` LIKE '%" . $keyword . "%' ORDER BY `product`.`Type_ID` ASC ";
            $resultproduct2 = mysqli_query($conn, $selectproduct);
            $ckrow = mysqli_fetch_array($resultproduct2);

            if (!isset($ckrow)) {


        ?>
        <div class="col-7 text-center mx-auto ml-2">
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                !!!! ไม่พบหนังสือที่ค้นหาในระบบ
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>


        <?php

                $selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID`  ORDER BY `product`.`Type_ID`";
                $resultproduct = mysqli_query($conn, $selectproduct);
            }
        } else {

            $selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID`  ORDER BY `product`.`Type_ID`";
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
                            <th width="12%" class="text-center"></th>
                            <th width="18%" class="text-center">ชื่อสินค้า</th>
                            <th width="10%" class="text-center">ประเภทสินค้า</th>
                            <th width="7%" class="text-center">ราคาซื้อหนังสือ</th>
                            <th width="7%" class="text-center">ราคาเช่า</th>
                            <th width="7%" class="text-center">จำนวนคงเหลือ</th>
                            <th width="12%" class="text-center"></th>
                            <th width="12%" class="text-center"></th>
                            <th width="6%" class="text-center"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php





                        while ($rowproduct = mysqli_fetch_array($resultproduct)) {
                        ?>
                        <tr>
                            <th width="12%" class="text-center"><img class="img-responsive"
                                    src="img\product\<?php echo $rowproduct["Product_Photo"] ?>"
                                    alt="<?php echo $rowproduct["Product_Photo"] ?>" width="120" height="80"></th>

                            <th><?php echo $rowproduct["Product_Name"] ?></th>
                            <td><?php echo $rowproduct["Type_Name"] ?></td>
                            <td class="text-right"><?php echo $rowproduct["product_buy"] ?></td>
                            <td class="text-right"><?php echo $rowproduct["Product_Price"] ?></td>
                            <td class="text-right"><?php echo $rowproduct["Product_Balance"] ?></td>
                            <td>
                                <div class="mx-auto text-center">
                                    <input type="button" name="edit" value="รายละเอียด"
                                        id="<?php echo $rowproduct["Product_ID"]; ?>"
                                        class="btn btn-info  btn-sm  view_dataproduct" />
                                </div>
                            </td>
                            <td>
                                <div class="mx-auto text-center">
                                    <input type="button" name="edit" value="แก้ไขข้อมูลสินค้า"
                                        id="<?php echo $rowproduct["Product_ID"]; ?>"
                                        class="btn btn-info  btn-sm  edit_dataproduct" />
                                    <div class="py-1"></div>
                                    <a href="updatephoto.php?product_ID=<?php
                                                                            echo $rowproduct["Product_ID"];
                                                                            ?>"
                                        class="btn btn-info  btn-sm  edit_dataphoto">
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

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">ราคาหนังสือที่ซื้อมา</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="productbuy2" name="productbuy2"
                                    placeholder="ราคาหนังสือที่ซื้อมา" min="1" max="9999999" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">บาท</label>
                        </div>


                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">ราคาเช่าหนังสือ</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="price2" name="price2"
                                    placeholder="ราคาเช่าหนังสือ" min="1" max="9999999" required>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">บาท</label>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">จำนวนสินค้า</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="unit2" name="unit2"
                                    placeholder="จำนวนสินค้า" required min="1" max="9999">
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">เล่ม</label>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword"
                                class="col-sm-2 col-form-label py-2">จำนวนวันที่ให้เช่าหนังสือ</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="rentday2" name="rentday2"
                                    placeholder="จำนวนสินค้า" required min="1" max="9999">
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2">วัน</label>
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



            </div>

        </div>
    </div>
</div>




<script>

</script>