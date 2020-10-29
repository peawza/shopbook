<?php
require_once('condbbook.php');
$userid = $_GET['UserID'];
echo $userid;

$sqldelete = "DELETE FROM `user` WHERE `user`.`User_ID` = '" . $userid . "'";
if ($conn->query($sqldelete) === TRUE) {

    header('Refresh:0; url=../manageuser.php');
} else {

    header('Refresh:0; url=../manageuser.php');
}
