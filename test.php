<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<?php

echo "<br>";
$total = 0;
$datetoday = date("Y-m-d");
$datereturn = date_create("2020-09-10");
$datetoday = date_create($datetoday);

$diff = date_diff($datetoday, $datereturn);
echo $diff->format("%R");

if ($diff->format("%R") == "+") {
    echo 'hell';
} else {
    //echo '-';


    $day = $diff->format("%a");
    while ($day  != 0) {
        $total += 20;
        # code...
        $day--;
    }
    echo "ปรับ" . $total;
}
echo "<br>";
echo $diff->format("%a");
echo "<br>";
?>

<?php
/*
$datetoday = date("Y-m-d");
$date1 = date_create($datetoday);
$date2 = date_create("2013-12-12");
$diff = date_diff($date1, $date2);
echo $diff->format("%R%a days");
echo "<br>";



//'" . date("Y-m-d") . "'
$day = "5";
$daytotal = "+ " . $day . " day";
echo ($daytotal);
echo "<br>";
echo Date("Y-m-d", strtotime($daytotal)); // 2013-02-28
//echo Date("Y-m-d", strtotime("2013-01-31 +1 Month -3 Day")); // 2013-02-28
*/
?>

<body></body>

</html>