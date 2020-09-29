<?php
require_once("php/condbbook.php");

//$sql = "SELECT * FROM `warranty` ORDER BY `warranty`.`Warranty_ID` ASC";
//$query = mysqli_query($conn, $sql);

?>


<?php




//เทส
//$connect = mysqli_connect("localhost", "root", "1234", "shop");

//echo ('<pre>');
//print_r($_POST);
//print_r($_GET["id_product"]);
//print_r($_GET);
//print_r($_SESSION);
//echo ('</pre>');

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
                echo '<script>window.location="product_detail.php"</script>';
            }
        }
    }
}








//เทส


?>


<?php
if (isset($_GET["id_product"])) {
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        //echo "111111111111111111111111";
        include('include/importcss.php');
        include('include\navber.php'); // เรียกใช่ไฟล์ include css    
        ?>
    <title>HOME</title>
</head>


</head>

<body>

    <style>
    .cardproduct {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .priceproduct {
        color: grey;
        font-size: 22px;
    }



    .card button:hover {
        opacity: 0.7;
    }

    .imgproductdetali {

        width: 800px;
        height: 620px;
    }
    </style>








    <body>

        <?php
            //echo '<pre>', print_r($_POST), '</pre>';

            $sql = "SELECT * FROM `product` WHERE `Product_ID`= '" . $_GET["id_product"] . "'"; // alt  + 96
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
        <div class="container-fluid py-4">
            <h2 style="text-align:center"></h2>

            <form
                action="product_detail.php?action=add&id=<?php echo $row["Product_ID"]; ?>&&typeproduct=<?php echo $row["Type_ID"] ?>"
                method="post">
                <div class="card py-3 ">
                    <div class="row">
                        <div class="col-6 ">
                            <img src="img\product\<?php echo $row['Product_Photo']; ?>" alt="Denim Jeans"
                                class="imgproductdetali">
                        </div>
                        <div class="col-5">
                            <h1><?php echo $row['Product_Name']; ?></h1>
                            <h6> รายละเอียดสินค้า</h6>
                            <br>
                            <p><?php echo $row['Product_Details']; ?>
                            </p>
                            <p class="priceproduct"><?php echo $row['Product_Price']; ?></p>
                            <div class="container ">
                                <div class="row">
                                    <h4 class="py-2">จำนวนสินค้าคงเหลือ</h4>
                                    &nbsp
                                    &nbsp
                                    <h4 class="py-2"><?php echo $row['Product_Balance']; ?></h4>
                                    &nbsp
                                    &nbsp
                                    <h4 class="py-2">เครื่อง</h4>
                                </div>

                            </div>

                            <div class="row">


                                <div class="container-fluid col-8">
                                    <div class="row">
                                        <h4 class="py-2">จำนวนสินค้าคงเหลือ</h4>
                                        &nbsp
                                        &nbsp
                                        <h4 class="py-2"><?php echo $row['Product_Balance']; ?></h4>
                                        &nbsp
                                        &nbsp
                                        <h4 class="py-2">เครื่อง</h4>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class=" py-2 float-right">
                                        <input type="number" class="form-control  float-right" id="quantity"
                                            name="quantity" value="1" min="1"
                                            max="<?php echo $row["Product_Balance"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>

                            <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />

                            <input type="hidden" name="hidden_price" value="<?php echo $row["Product_Price"]; ?>" />

                            <input type="hidden" name="hidden_photo" value="<?php echo $row['Product_Photo']; ?>" />

                            <input type="hidden" name="hidden_Balance" value="<?php echo $row['Product_Balance']; ?>" />

                            <?php if (isset($_SESSION['ID'])) {
                                ?>

                            <button type="submit" name="add_to_cart" value="Add to Cart"
                                class="btn btn-success   btn-lg col-5 float-right textproduct text-center"><i
                                    class="fa fa-shopping-cart"></i>
                                สั่งซื้อสินค้า </button>


                            <?php
                                } else { ?>

                            <a href="login.php"
                                class="btn btn-success   btn-lg col-5 float-right textproduct text-center">
                                <i class="fa fa-shopping-cart"></i>
                                สั่งซื้อสินค้า
                            </a>

                            <?php } ?>

            </form>





        </div>

















    </body>

    <?php
        include('include/importjavascript.php'); // เรียกใช่ไฟล์ include javascript
        ?>





    </script>

</html>

















<?php

} else {

    echo '<script>window.location="shopproduct.php"</script>';
}
?>