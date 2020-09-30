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
?>

<?php
$date1 = date_create("2013-03-15");
$date2 = date_create("2013-12-12");
$diff = date_diff($date1, $date2);
echo $diff->format("%R%a days");

echo Date("Y-m-d", strtotime("2013-01-01 +1 Month -1 Day")); // 2013-01-31



echo Date("Y-m-d", strtotime("2013-01-31 +1 Month -3 Day")); // 2013-02-28



echo Date("Y-m-d", strtotime("2013-01-31 +2 Month")); // 2013-03-31



echo Date("Y-m-d", strtotime("2013-01-31 +3 Month -1 Day")); // 2013-04-30



echo Date("Y-m-d", strtotime("2013-12-31 -1 Month -1 Day")); // 2013-11-30



echo Date("Y-m-d", strtotime("2013-12-31 -2 Month")); // 2013-10-31



echo Date("Y-m-d", strtotime("2013-12-31 -3 Month")); // 2013-10-01



echo Date("Y-m-d", strtotime("2013-12-31 -3 Month -1 Day")); // 2013-09-30
?>

<body></body>

</html>