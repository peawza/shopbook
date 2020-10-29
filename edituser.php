<?php
require_once("php/condbbook.php");
$UserID = ($_GET["UserID"]);

$sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $UserID . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<link rel="icon" href="img\index\logo.png">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include('include/importcss.php');
    ?>
    <title>จัดการสมาชิก</title>
    <?php

    include('include/navber.php');

    if (!isset($_SESSION["ID"])) {
        header('location:index.php');
    }
    $sql = "SELECT * FROM `user` WHERE `User_ID`= '" . $_GET["UserID"] . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    ?>
</head>

<body>
    <div class="container">
        <div class="jumbotron jumbotron-fluid ">
            <div class="container my-5">
                <h1 class="display-4 text-center">ประวัติส่วนตัว</h1>


            </div>
        </div>
    </div>
    <div class="container">
        <div class="py-3">

            <img src="img\profile\<?php echo $row['User_Photo']; ?>" alt="profile.png"
                class="img-profile rounded-circle ">

        </div>


        <form class="form" id="Formupdatausertype" method="post"
            action="php/updatetypeuser.php?user=<?php echo $UserID; ?> ">

            <label class="textprofile ">ชื่อของคุณ</label>
            <div class="row ">
                <div class="col">
                    <input type="text" class="form-control" placeholder="ชื่อ" id="fname"
                        value="<?php echo $row['User_Firstname']; ?> " name="fname" maxlength="30" disabled>

                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="นามสกุล" id="lname"
                        value="<?php echo $row['User_Lastname']; ?>" name="lname" maxlength="30" disabled>
                </div>
            </div>


            <div class="form-group">

                <label class="textprofile">เบอร์โทร</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="เบอร์โทร"
                    value="<?php echo $row['User_Telephonenumber']; ?> " " disabled>
                            </input>
            </div>

            <div class=" form-group ">
                                <label class=" textprofile">อีเมล </label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo $row['User_Email']; ?> " placeholder="email@example.com" disabled>
            </div>
            <div class=" form-group ">
                <label class=" textprofile">สถานะแอดมิน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <div class="dropdown">
                    <select name="Userlevel" id="Userlevel" class="form-control border-input" required>
                        <option value="" disabled selected>กรุณาเลือก</option>

                        <option value="admin" <?php if ($row['User_Type'] == 'admin') {
                                                    echo "selected='selected'";
                                                } ?>>admin</option>
                        <option value="user" <?php if ($row['User_Type'] == 'user') {
                                                    echo "selected='selected'";
                                                } ?>>user</option>
                    </select>
                </div>
            </div>
            <div class="container">
                <div class="row py-4 ">

                    <button type="submit" name="submitUpdate"
                        class=" btn btn-primary btn-lg col float-left">บันทึก</button>
                    <div class="col"></div>
                    <a href="manageuser.php" class="btn btn-secondary btn-lg col float-right">
                        ยกเลิก
                    </a>

                </div>

            </div>
        </form>



























        <?php
        include('include/importjavascript.php');
        ?>



</body>

</html>