<?php
require_once('php\condbbook.php');
//$connect = mysqli_connect("localhost", "root", "", "testing");
//$connect = mysqli_connect("localhost", "root", "", "shop");
//$query = "SELECT * FROM producttype ORDER BY `Type_ID` DESC"; // แก้ที่อยู่
//$result = mysqli_query($conn, $query);


//$rowordersales = mysqli_fetch_array($resultproduct);
/*
echo '<pre>';
//print_r($resultproduct);
$rowordersales = mysqli_fetch_array($resultproduct);
print_r($rowordersales);
//echo $rowordersales["Type_Name"];

while ($rowordersales = mysqli_fetch_array($resultproduct)) {
    echo "<br>";
    echo ($rowordersales["Ordersales_ID"]);
}
echo '</pre>';
*/

//print_r($_SESSION);
if(isset()){
    foreach ($_SESSION["returnbook"] as $keys => $values) {
        unset($_SESSION["returnbook"][$keys]);
        //echo '<script>window.location="../shopproduct.php"</script>';
        //
    }
}


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

    <div class="container py-3">

        <div class="py-3">


            <?php
            ini_set('display_errors', 1);
            error_reporting(~0);
            //echo $_POST;
            $strKeyword = null;


            ?>

            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" <div
                class="form-group row">
                <label for="inputPassword" class="col-2 col-form-label py-2 ">ค้นหาชื่อสินค้า</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="txtKeyword" name="txtKeyword"
                        placeholder="ค้นหาชื่อสินค้า" maxlength="50" value="<?php echo $strKeyword; ?>">
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
            //$selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Product_Name` LIKE '%" . $keyword . "%' ";
            //$resultproduct = mysqli_query($conn, $selectproduct);

            $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`AND `user`.`User_Firstname`LIKE'%" . $keyword . "%' ";
            $resultordersales = mysqli_query($conn, $selectordersales);




            $selectordersales2 = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`AND `user`.`User_Firstname`LIKE'%" . $keyword . "%'";
            $resultordersales2 = mysqli_query($conn, $selectordersales2);
            $ckrow = mysqli_fetch_array($resultordersales2);



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

                $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID` ";
                $resultordersales = mysqli_query($conn, $selectordersales);
            }
        } else {

            //$selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` ORDER BY `product`.`Product_Name` ASC";
            //$resultproduct = mysqli_query($conn, $selectproduct);
            $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID` ";
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
                        
                        */


                        while ($rowordersales = mysqli_fetch_array($resultordersales)) {
                            if ($rowordersales['orders_iscomplete'] == 0 or $rowordersales['orders_iscomplete'] == 1) {
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
                                    <input type="button" name=" " value="ยังไม่คืนหนังสือ"
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
                                <div class="mx-auto text-center">
                                    <a href="returnproduct.php?Order_id=<?php
                                                                                    echo $rowordersales["orders_id"];
                                                                                    ?>"
                                        class="btn btn-secondary mb-2  mx-auto text-center">
                                        คืนหนังสือ
                                    </a>
                                </div>

                            </td>

                            <td>

                            </td>
                            <?php
                                    }


                                    ?>

                            <?php
                                    if ($rowordersales["orders_iscomplete"] == 1) {
                                    ?>
                            <td>
                                <div class="mx-auto text-center">
                                    <input type="button" name=" " value="คืนหนังสือบางส่วน"
                                        class="btn btn-warning  btn-sm  " />
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
                                <div class="mx-auto text-center">
                                    <a href="returnproduct.php?Order_id=<?php
                                                                                    echo $rowordersales["orders_id"];
                                                                                    ?>"
                                        class="btn btn-secondary mb-2  mx-auto text-center">
                                        คืนหนังสือ
                                    </a>
                                </div>

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
                        //เพิ่มรูปสินค้า ตลาส product-file-input
                        /* console.log(
                          $(this)
                            .val()
                            .split("\\")
                            .pop()
                        );*/

                        var filename = $(this)
                            .val()
                            .split("\\")
                            .pop();
                        $(this)
                            .siblings(".product-label") /// แก้ตรงนี้
                            .html(filename);

                        if (this.files[0]) {
                            var reader = new FileReader();
                            $(".figure").addClass("d-block");
                            reader.onload = function(e) {
                                //console.log(reader);
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


                <!--
                    <form method="post" id="update_form" action="php/update.php">
                    <label>ชื่อสินค้า</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />

                   <input type="hidden" name="Ordersales_ID" id="Ordersales_ID" />
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
$(".updateimgproduct-input").on("change", function() {
    // เปลี่ยนรูปโปรไฟล์ใหม่ custom-file-input
    /* console.log(
      $(this)
        .val()
        .split("\\")
        .pop()
    );*/

    var filename = $(this)
        .val()
        .split("\\")
        .pop();
    $(this)
        .siblings(".custom-file-label") /// แก้ตรงนี้
        .html(filename);

    if (this.files[0]) {
        var reader = new FileReader();
        $(".figure").addClass("d-block");
        reader.onload = function(e) {
            //console.log(reader);
            $("#imgprofile")
                .attr("src", e.target.result)
                .width(800)
                .height(600);
        };
        reader.readAsDataURL(this.files[0]);
        $("#submitphotoproduct").removeAttr("disabled");
    }
});
</script>