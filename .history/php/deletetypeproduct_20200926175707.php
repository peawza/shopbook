<?php
require_once('condbbook.php');
$Type_ID = $_GET['Type_ID'];
echo $Type_ID;

$sqldelete = "DELETE FROM `producttype` WHERE `producttype`.`Type_ID` = '" . $Type_ID . "'";
if ($conn->query($sqldelete) === TRUE) {
    echo "Record deleted successfully";
    header('Refresh:0; url=../typeproduct.php');
} else {
    echo "Error deleting record: " . $conn->error;
    header('Refresh:0; url=../typeproduct.php');
}