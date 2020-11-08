<?php
require_once('php\condbbook.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="icon" href="img/index/logo.png">
    <link rel="stylesheet" href="include/CSS/styles.css?v=<?php echo filemtime('include/CSS/styles.css'); ?>"
        type=" text/css">
    <title>ระบบร้านเช่าหนังสือ</title>
</head>

<body>
    <?php

    include('include/navber.php');
    ?>


    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div id="imglist" class="carousel-item active " data-interval="1000">

                <img src="img\index\headweb1.png" class="d-block  img-fluid imglist" alt="...">

            </div>
            <div id="imglist" class="carousel-item " data-interval="1000">

                <img src="img\index\headweb2.png" class="d-block  img-fluid  imglist" alt="...">


            </div>
            <div id="imglist" class="carousel-item " data-interval="1000">

                <img src="img\index\headweb3.png" class="d-block    img-fluid imglist" alt="...">
            </div>
            <div id="imglist" class="carousel-item " data-interval="1000">

                <img src="img\index\headweb4.png" class="d-block    img-fluid imglist" alt="...">
            </div>

        </div>



        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <?php

    function showtopproduct($tital, $sql)
    {

    ?>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?php echo ($tital) ?></h1>
    </div>
    <div class="container">
        <div class="card-deck mb-3 text-center">
            <?php
                include('phpsql\condbbookNs.php');
                $resultproduct = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_array($resultproduct)) {

                ?>


            <div class="card mb-4 shadow-sm ">
                <div class="card-header">
                    <div style="height: 50px">
                        <?php
                                $len = strlen($row['Product_Name']);
                                if ($len <= 30) {
                                ?>
                        <h5 class="my-0 font-weight-normal"><?php echo $row['Product_Name'] ?></h5>
                        <br>

                        <?php
                                }
                                ?>

                        <?php
                                $len = strlen($row['Product_Name']);
                                if ($len > 30) {
                                ?>
                        <h5 class="my-0 font-weight-normal"><?php echo $row['Product_Name'] ?></h5>
                        <?php
                                }



                                ?>
                    </div>


                </div>
                <div class="card-body">
                    <a href="product_detail.php?id_product=<?php echo $row['Product_ID'] ?>">
                        <img src="img\product\<?php echo $row['Product_Photo'] ?>" alt="Image"
                            class="cardproductindex img-fluid" height="300" width="300">
                    </a>
                    <div style="height: 90px">
                        <ul class="list-unstyled mt-3 mb-4">
                            <b>
                                <?php echo $row['Product_Name'] ?>
                            </b>
                            <li>เช่าได้ <?php echo $row['Product_rentday'] ?> วัน</li>
                            <li>ราคาเช่า <?php echo $row['Product_Price'] ?> บาท</li>

                        </ul>

                    </div>

                    <a href="product_detail.php?id_product=<?php echo $row['Product_ID'] ?>"
                        class="btn btn-lg btn-block btn-outline-primary">

                        ดูรายละเอียด
                    </a>
                </div>
            </div>

            <?php }
                ?>

        </div>

        <?php

    }

    showtopproduct('หนังสือใหม่', 'SELECT * FROM `product` ORDER BY `product`.`Product_datesave` DESC LIMIT 3');
    showtopproduct('หนังสือยอดนิยม', 'SELECT `orderrent`.`orderrent_productid`, SUM(`orderrent_amount`) AS amount, `product`.`Product_Photo`, `product`.`Product_rentday`, `product`.`Product_Name`, `product`.`Product_Price`, `product`.`Product_ID` FROM `orderrent`, `product` 
    WHERE `product`.`Product_ID` = `orderrent`.`orderrent_productid` 
    GROUP BY `product`.`Product_ID` 
    ORDER BY `amount` 
    DESC LIMIT 3');


        ?>


        <footer class="pt-4 my-md-5 pt-md-5 border-top">

            <p class="float-right"><a href="#">Back to top</a></p>
        </footer>
    </div>








    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>