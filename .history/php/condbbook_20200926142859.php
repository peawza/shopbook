<?php
//session_start();
$conn = new mysqli('localhost', 'root', '1234', 'shopbook');
$conn->set_charset("utf8");
//$conn->query('set name utf8');
//echo $conn->connect_error;
if ($conn->connect_errno) {
    die("conmection Failed" . $conn->connect_error);
} /*else {
    die("OK Database");
}*/

//$conndata = new mysqli('localhost', 'root', '1234', 'shop');