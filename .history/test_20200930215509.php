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
$summary = floor($calculate / 86400); // 86400 มาจาก 24*360 (1วัน = 24 ชม.)
echo "$summary วัน";
?>

<body></body>

</html>