<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include('include/importcss.php'); // เรียกใช่ไฟล์ include css
    ?>
    <title>Profile</title>
    <?php
    require_once('php/connect.php');
    include('include/navber.php');
    //session_start();

    if (!isset($_SESSION["ID"])) {
        header('location:index.php');
    }
    $sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $_SESSION["ID"] . "'"; // alt  + 96
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    //echo $result->num_rows;
    if (!$result->num_rows) {
        header('location:index.php');
    }

    //print_r($row);
    ?>
</head>

<body>
    <div class="container">
        <div class="jumbotron jumbotron-fluid ">
            <div class="container my-5">
                <h1 class="display-4 text-center">แก้ไขรหัสผ่าน</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="py-3">

            <img src="img\profile\<?php echo $row['User_Photo']; ?>" alt="profile.png" class="img-profile rounded-circle ">
        </div>
    </div>


    <div class="card container">
        <div class="card-body">
            <form class="form" id="Formupdatapassword" method="post" action="php/updatepassword.php">
                <div class=" form-group ">
                    <label class=" textprofile">รหัสผ่านปัจจุบัน</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่านปัจจุบัน">
                </div>
                <div class=" form-group ">
                    <label class=" textprofile">รหัสผ่านใหม่</label>
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="รหัสผ่านใหม่">
                </div>
                <div class=" form-group ">
                    <label class=" textprofile">ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="ยืนยันรหัสผ่านใหม่">
                </div>

                <div class="container">
                    <div class="row py-4 ">
                        <button type="submit" name="submitUpdatepassword" class="btn btn-primary btn-lg col float-left">บันทึก</button>
                        <div class="col"></div>
                        <a href="profile.php" class="btn btn-secondary btn-lg col float-right">
                            ยกเลิก
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>





























    <?php
    include('include/importjavascript.php');
    ?>

</body>

</html>