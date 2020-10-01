<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require_once('php/condbbook.php');
    include('include\importcss.php');
    include('include\navber.php');
    echo '<pre>';
    //print_r($_SESSION);
    //$_SESSION['ses_php_var'] = $_GET['sendVal'];
    //$_SESSION['ses_php_var'] = $_POST['sendVal'];
    //$_SESSION['Typeid'] = $_POST['Typeid'];
    //print_r($_POST);
    print_r($_GET);
    echo '<pre>';

    ?>
</head>

<body>
    <?php
    if (isset($_GET['Order_id'])) {
        $selectproduct = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`AND`order`.`orders_id`= `orderrent`.`orderrent_id `";
        $resulproduct = mysqli_query($conn, $selectproduct);
        while ($rowproduct = mysqli_fetch_array($resulproduct)) {
            echo '<pre>';
            print_r($rowproduct);

            echo '<pre>';
        }
    } else {


        echo 'null';
    }


    ?>










</body>
<?php
include('include\importjavascript.php');
?>

</html>