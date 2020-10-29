<?php
require_once('php\condbbook.php');


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

    ?>
</head>


<body>

    <div class="container py-3">

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


            $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`AND`user`.`User_ID` = '" . $_SESSION['ID'] . "'AND `user`.`User_Firstname`LIKE'%" . $keyword . "%' ";
            $resultordersales = mysqli_query($conn, $selectordersales);




            $selectordersales2 = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`AND`user`.`User_ID` = '" . $_SESSION['ID'] . "' AND `user`.`User_Firstname`LIKE'%" . $keyword . "%'";
            $resultordersales2 = mysqli_query($conn, $selectordersales2);
            $ckrow = mysqli_fetch_array($resultordersales2);



            if (!isset($ckrow)) {


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

                $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`  AND`user`.`User_ID` = '" . $_SESSION['ID'] . "'";
                $resultordersales = mysqli_query($conn, $selectordersales);
            }
        } else {

            $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID` AND`user`.`User_ID` = '" . $_SESSION['ID'] . "' ";
            $resultordersales = mysqli_query($conn, $selectordersales);
        }


        ?>


    </div>


    </div>

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


                        while ($rowordersales = mysqli_fetch_array($resultordersales)) {
                            if ($rowordersales['orders_iscomplete'] == 0) {
                        ?>
                        <tr>
                            <th><?php
                                        $code = sprintf('O-%04d', $rowordersales['orders_id']);
                                        echo $code ?>
                            </th>
                            <th><?php echo $rowordersales["User_Firstname"] . ' ' . $rowordersales['User_Lastname'] ?>
                            </th>
                            <td><?php echo $rowordersales["Order_addressuser"]  ?></td>



                            <td class=" text-right"><?php echo $rowordersales["orders_sumtotal"] ?> บาท</td>


                            <?php
                                    if ($rowordersales["orders_iscomplete"] == 0) {
                                    ?>
                            <td>
                                <div class="mx-auto text-center">
                                    <input type="button" name=" " value="หนังสือยังคืนไม่หมด"
                                        class="btn btn-danger  btn-sm  " />
                                </div>
                            </td>

                            <td></td>

                            <td>

                                <div class="mx-auto text-center">
                                    <input type="button" name="edit" value="รายละเอียด"
                                        id="<?php echo $rowordersales["orders_id"]; ?>"
                                        class="btn btn-info  btn-sm  view_dataordersales" />

                                </div>


                            </td>

                            <td>


                            </td>

                            <td>


                            </td>
                            <?php
                                    }


                                    ?>



                            <?php




                            }
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




<div id="add_dataordersalesTransfermoney_Modal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ชำระเงิน</h4>
            </div>
            <div class="modal-body">

                <form action="php/update.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">ยอดเงินที่ต้องชำระ</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="mony" name="mony" placeholder="จำนวนเงิน"
                                    disabled>
                            </div>
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">บาท</label>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">จำนวนเงินที่โอนมา</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="inputmony" name="inputmony"
                                    placeholder="จำนวนเงิน" min="0" required>
                            </div>
                            <label for=" inputPassword" class="col-sm-2 col-form-label py-2 ">บาท</label>
                        </div>
                    </div>


                    <label for="inputPassword" class="col-sm-2 col-form-label py-2 ">สลิปโอนเงิน</label>


                    <div class="custom-file col-sm-5" data-callback=" PhotoChcallback">
                        <input type="file" class="custom-file-input product-file" id="file"
                            aria-describedby="inputGroupFileAddon01" name="file">
                        <label class=" custom-file-label product-label" for="inputGroupFile01">เลือกไฟล์</label>
                    </div>

                    <figure class="figure d-none text-center m-2">
                        <img id="imgproduct" alt="product" class="figure-img img-fluid ">
                    </figure>


                    <script>
                    $(".product-file").on("change", function() {


                        var filename = $(this)
                            .val()
                            .split("\\")
                            .pop();
                        $(this)
                            .siblings(".product-label")
                            .html(filename);

                        if (this.files[0]) {
                            var reader = new FileReader();
                            $(".figure").addClass("d-block");
                            reader.onload = function(e) {

                                $("#imgproduct")
                                    .attr("src", e.target.result)
                                    .width(800)
                                    .height(600);
                            };
                            reader.readAsDataURL(this.files[0]);
                            $("#submitordersalesTransfermoneyuser").removeAttr("disabled");
                        }
                    });
                    </script>




                    <br>
                    <br>



                    <input type="hidden" name="idorder" id="idorder" />
                    <input type="hidden" name="idorder_mony" id="idorder_mony">
                    <input type="hidden" name="idorder2" id="idorder2" value="5000" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="submitordersalesTransfermoneyuser"
                            id="submitordersalesTransfermoneyuser" class="btn btn-primary" disabled>บันทึก</button>
                    </div>
                </form>



            </div>

        </div>
    </div>
</div>