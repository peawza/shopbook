<?php
require_once("php/connect.php");
$Product_ID = ($_GET["product_ID"]);
//$UserType = ($_GET["Userlevel"]);
//echo $Product_ID;
//echo $UserType;
//print_r($_POST);
$sql = "SELECT * FROM `product` WHERE `Product_ID`= '" . $Product_ID . "'"; // alt  + 96
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//echo '<pre>';
//print_r($row);
//echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('include/importcss.php'); // เรียกใช่ไฟล์ include css
    ?>
    <title>เปลียนรูปสินค้า</title>
    <?php
    //session_start();    
    include('include/navber.php');


    $sql = "SELECT * FROM `product` WHERE `Product_ID`= '" . $Product_ID . "'"; // alt  + 96
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    //echo $result->num_rows;  

    //print_r($row);
    ?>
</head>



<body>

    <?php

    //echo $row["Product_Photo"];


    ?>




    <p class="container-fluid py-3">
        <div class="card-header text-center">
            รูปสินค้าปัจจุบัน
        </div>
        <p class="card mb-3">
            <div class="text-center py-3">
                <img src="img\product\<?php echo $row['Product_Photo']; ?>" class="card-img-top imgproductupdate"
                    alt="...">
            </div>



            <p class="card-body">
                <div class="py-3 text-center mx-auto ">

                    <div class="container">
                        <div class="row py-4 ">

                            <a href="product.php" class="btn btn-secondary btn-lg col float-right">
                                ย้อนกลับ

                            </a>
                            <div class="col"></div>
                            <button type="button" class="btn btn-primary btn-lg col float-left " data-toggle="modal"
                                data-target="#exampleModal">
                                เปลี่ยนรูปภาพ
                            </button>
                        </div>

                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="php/updatephoto.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="custom-file " data-callback=" PhotoChcallback">
                                            <input type="file" class="custom-file-input updateimgproduct-input"
                                                id="file" aria-describedby="inputGroupFileAddon01" name="file">
                                            <label class=" custom-file-label" for="inputGroupFile01">เลือกไฟล์</label>
                                        </div>

                                        <figure class="figure d-none  ">
                                            <img id="imgprofile" alt="profile.png"
                                                class="figure-img img-fluid  mr-auto">
                                        </figure>
                                        <input type="hidden" name="idproductphoto" id="idproductphoto"
                                            value="<?php
                                                                                                                echo $Product_ID; ?>">


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="submitphotoproduct" id="submitphotoproduct"
                                            class="btn btn-primary" disabled>Save
                                            changes</button>
                                    </div>

                                </form>



                            </div>
                        </div>
                    </div>



                </div>
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <p class="card-text"><small class="text-muted"></small></p>
            </p>
        </p>
    </p>













    <?php
    include('include/importjavascript.php'); // เรียกใช่ไฟล์ include javascript
    ?>



</body>

</html>