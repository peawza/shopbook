<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="img\index\logo.png">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('include/importcss.php');
    ?>
    <title>ประวัติ</title>
    <?php

    require_once('php/condbbook.php');
    include('include/navber.php');


    if (!isset($_SESSION["ID"])) {
        header('location:index.php');
    }

    $sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $_SESSION["ID"] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    if (!$result->num_rows) {
        header('location:index.php');
    }

    ?>
</head>

<body>
    <div class="container py-5">
        <div class="jumbotron jumbotron-fluid ">
            <div class="container my-5">
                <h1 class="display-4 text-center">ประวัติส่วนตัว</h1>


            </div>
        </div>
    </div>

    <div class="container">

        <img src="img\profile\<?php echo $_SESSION['Photo']; ?>" alt="profile.png" class="img-profile rounded-circle ">



        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form">
                        <div class="form-group ">
                            <label class="textprofile">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control" id="user" name="user" disabled
                                value="<?php echo $row['User_Username']; ?>" placeholder="ชื่อผู้ใช้งาน">
                        </div>
                        <form>

                            <label class="textprofile ">ชื่อของคุณ</label>
                            <div class="row ">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="ชื่อ" maxlength="30"
                                        value="<?php echo $row['User_Firstname']; ?> " disabled name="fname" id="fname">

                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="นามสกุล" id="lname"
                                        maxlength="30" value="<?php echo $row['User_Lastname']; ?>" disabled
                                        name="lname" maxlength="30">
                                </div>
                            </div>

                        </form>

                        <div class="form-group ">
                            <label class="textprofile">เบอร์โทร</label>
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="เบอร์โทร"
                                maxlength="10" value="<?php echo $row['User_Telephonenumber']; ?> " disabled
                                pattern=" [0-9]{1,}">
                        </div>

                        <div class="form-group ">
                            <label class="textprofile">อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" disabled maxlength="30"
                                value="<?php echo $row['User_Email']; ?> " placeholder="email@example.com">
                        </div>


                </form>

                <div class="container">
                    <div class="row py-4 ">
                        <a href="profile_edit.php" class="btn btn-secondary float-right">แก้ไขข้อมูลส่วนตัว</a>
                    </div>

                </div>
            </div>
        </div>


    </div>















    <?php
    include('include/importjavascript.php'); // เรียกใช่ไฟล์ include javascript
    ?>



</body>

</html>