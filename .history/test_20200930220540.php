<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<?php
$datestart = "2016-11-22";
$dateend = "2016-11-23";

$calculate = strtotime("$dateend") - 5;
//$summary = floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
echo "$calculate วัน";
echo "<br>";
?>

<?php
$datetoday = date("Y-m-d");
$date1 = date_create($datetoday);
$date2 = date_create("2013-12-12");
$diff = date_diff($date1, $date2);
echo $diff->format("%R%a days");
echo "<br>";



//'" . date("Y-m-d") . "'
$day = 230;
echo "<br>";
echo Date("Y-m-d", strtotime("  '" . $day . "' Day")); // 2013-02-28


<body></body>

</html>