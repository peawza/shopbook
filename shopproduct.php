<?php
require_once("php/condbbook.php");



?>
<link rel="icon" href="img\index\logo.png">
<?php
include('include/navber.php');
?>

<?php




if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_GET["id"],
                'item_name'            =>    $_POST["hidden_name"],
                'item_price'        =>    $_POST["hidden_price"],
                'item_quantity'        =>    $_POST["quantity"],
                'item_photo' =>     $_POST['hidden_photo'],
                'item_Balance' =>     $_POST['hidden_Balance']

            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
        } else {
            echo '<script>alert("มีสินค้านี้อยู่ในตะกร้าสินค้าแล้ว")</script>';
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_GET["id"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"],
            'item_photo' => $_POST['hidden_photo'],
            'item_Balance' =>     $_POST['hidden_Balance']
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        echo '<script>alert("เพิ่มสินค้าลงในตะกร้าสินค้าแล้ว")</script>';
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="shopproduct.php"</script>';
            }
        }
    }
}










?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

    include('include/importcss.php');
    ?>
    <title>รายการสินค้า</title>
</head>


</head>

<body>

    <div class="container">

        <div class="py-3">


            <?php
            ini_set('display_errors', 1);
            error_reporting(~0);

            $strKeyword = null;


            ?>

            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" <div class="form-group row">
                <label for="inputPassword" class="col-2 col-form-label py-2 ">ค้นหาชื่อหนังสือ</label>
                <div class="col-7">
                    <input type="text" class="form-control" id="txtKeyword" name="txtKeyword" placeholder="ค้นหาชื่อหนังสือ" maxlength="50" value="<?php echo $strKeyword; ?>">
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

            $selectTypeproduct = "SELECT * FROM product  WHERE `product`.`Product_Name` LIKE '%" . $keyword . "%' ";
            $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
            $sql2 = "SELECT * FROM product  WHERE `product`.`Product_Name` LIKE '%" . $keyword . "%' ";
            $result2 = mysqli_query($conn,  $sql2);
            $ckrow = mysqli_fetch_array($result2);




            if (!isset($ckrow)) {


        ?>
                <div class="col-7 text-center mx-auto ml-2">
                    <div class="alert alert-danger alert-dismissible fade show " role="alert">
                        !!!! ไม่พบสินค้าที่ค้นหาในระบบ
                        <button type="button" class="close" -dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>


        <?php

                $selectproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` ORDER BY `product`.`Product_Name` ASC";
                $resultproduct = mysqli_query($conn, $selectproduct);

                if (isset($_GET['typeproduct'])) {

                    $selectTypeproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
                    $sql = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
                    $result = $conn->query($sql);
                    $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                    $rowresult = $result->fetch_assoc();
                } else {
                    $selectTypeproduct = "SELECT * FROM product   ";
                    $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                }
            }
        } else {

            if (isset($_GET['typeproduct'])) {

                $selectTypeproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
                $sql = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
                $result = $conn->query($sql);
                $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                $rowresult = $result->fetch_assoc();
            } else {
                $selectTypeproduct = "SELECT * FROM product   ";
                $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
            }
        }
        ?>


    </div>






    <?php




    if (isset($_GET['typeproduct'])) {


    ?>



        <div class="container-fluid py-2">
            <div class="card col-sm-auto col-md-auto">
                <div class="card-header">
                    ประเภทสินค้า <?php echo $rowresult['Type_Name']; ?>
                </div>
                <div class="card-body">
                    <div class="row">

                    <?php
                } else {

                    ?>

                        <div class="container-fluid py-2">
                            <div class="card">
                                <div class="card-header">
                                    <?php
                                    if (isset($_POST["txtKeyword"])) {
                                        echo 'ค้นหาสินค้า';
                                    } else {
                                        echo 'สินค้าทั้งหมด';
                                    }
                                    ?>


                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <?php
                                    }

                                    if (isset($_GET['typeproduct'])) {

                                        while ($row = mysqli_fetch_array($resultTypeproduct)) {
                                        ?>

                                            <section class="col-6 col-sm-4 col-xl-3 p-2">
                                                <form action="shopproduct.php?action=add&id=<?php echo $row["Product_ID"]; ?>&&typeproduct=<?php echo $_GET['typeproduct'] ?>" method="post">
                                                    <div class="card  cardphotoproduct  cardproduct">
                                                        <div class="container">
                                                            <div class="content-item cardphotoproduct">
                                                                <div class="photozoom  mx-auto">
                                                                    <a href=" product_detail.php?id_product=<?php echo $row['Product_ID'] ?>" class="warpper-card-img">
                                                                        <img class="card-img-top photoproductzoom img-fluid" src="img\product\<?php echo $row['Product_Photo'] ?>" alt="Card image Product">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body   py-2 ">
                                                            <h4 class="text-product" style="height: 90px">
                                                                <?php echo $row['Product_Name'] ?> </h4>
                                                            <strong class="text-price"> ราคา
                                                                <?php echo $row['Product_Price'] ?>
                                                                บาท </strong>
                                                            <div class=" py-2">
                                                                <input type="number" class="form-control col-3" id="quantity" name="quantity" value="1" min="1" max="<?php echo $row["Product_Balance"]; ?>">
                                                            </div>
                                                            <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />

                                                            <input type="hidden" name="hidden_price" value="<?php echo $row["Product_Price"]; ?>" />

                                                            <input type="hidden" name="hidden_photo" value="<?php echo $row['Product_Photo']; ?>" />

                                                            <input type="hidden" name="hidden_Balance" value="<?php echo $row['Product_Balance']; ?>" />
                                                            <div class="row py-4">

                                                                <a href="product_detail.php?id_product=<?php echo $row['Product_ID'] ?>" class="btn btn-secondary    btn-lg col-5 float-right textproduct text-center">
                                                                    <i class="fa fa-eye"></i>
                                                                    ดูรายละเอียด
                                                                </a>
                                                                <div class="col"></div>
                                                                <?php if (isset($_SESSION['UserType'])) {
                                                                    if ($_SESSION['UserType'] == 'admin') {
                                                                        # code...


                                                                ?>

                                                                        <button type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-success   btn-lg col-5 float-right textproduct text-center"><i class="fa fa-shopping-cart"></i>
                                                                            เช่าหนังสือ </button>


                                                                    <?php

                                                                    }
                                                                } else { ?>



                                                                <?php } ?>
                                                            </div>



                                                </form>
                                            </section>
                                        <?php
                                        }
                                    } else {
                                        while ($row = mysqli_fetch_array($resultTypeproduct)) {
                                        ?>

                                            <section class="col-6 col-sm-4 col-xl-3 p-2">
                                                <form action="shopproduct.php?action=add&id=<?php echo $row["Product_ID"]; ?>" method="post">
                                                    <div class="card  cardphotoproduct cardproduct">
                                                        <div class="container">
                                                            <div class="content-item cardphotoproduct">
                                                                <div class="photozoom  mx-auto">
                                                                    <a href=" product_detail.php?id_product=<?php echo $row['Product_ID'] ?>" class="warpper-card-img">
                                                                        <img class="card-img-top photoproductzoom img-fluid" src="img\product\<?php echo $row['Product_Photo'] ?>" alt="Card image Product">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body   py-2 ">
                                                            <h4 class="text-product" style="height: 90px">
                                                                <?php echo $row['Product_Name'] ?> </h4>
                                                            <strong class="text-price"> ราคา
                                                                <?php echo $row['Product_Price'] ?>
                                                                บาท </strong>
                                                            <div class=" py-2">
                                                                <input type="number" class="form-control col-3" id="quantity" name="quantity" value="1" min="1" max="<?php echo $row["Product_Balance"]; ?>">
                                                            </div>
                                                            <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />

                                                            <input type="hidden" name="hidden_price" value="<?php echo $row["Product_Price"]; ?>" />

                                                            <input type="hidden" name="hidden_photo" value="<?php echo $row['Product_Photo']; ?>" />

                                                            <input type="hidden" name="hidden_Balance" value="<?php echo $row['Product_Balance']; ?>" />
                                                            <div class="row  py-5 my-auto">

                                                                <a href="product_detail.php?id_product=<?php echo $row['Product_ID'] ?>" class="btn btn-secondary    btn-lg col-5 float-right textproduct text-center">
                                                                    <i class="fa fa-eye"></i>
                                                                    ดูรายละเอียด
                                                                </a>
                                                                <div class="col"></div>
                                                                <?php




                                                                if (isset($_SESSION)) {
                                                                    if (isset($_SESSION['UserType'])) {

                                                                        if (isset($_SESSION['ID']) and $_SESSION['UserType'] == 'admin') {
                                                                ?>

                                                                            <button type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-success   btn-lg col-5 float-right textproduct text-center"><i class="fa fa-shopping-cart"></i>
                                                                                เช่าหนังสือ </button>


                                                                        <?php
                                                                        } else { ?>



                                                                <?php }
                                                                    }
                                                                }
                                                                ?>
                                                            </div>



                                                </form>
                                            </section>
                                    <?php
                                        }
                                    }
                                    ?>

                                    </div>
                                </div>
                            </div>
                        </div>








                        <?php
                        include('include/importjavascript.php');
                        ?>
</body>






</script>

</html>