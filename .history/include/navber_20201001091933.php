<nav class="navbar navbar-expand-lg  ">


    <a class="navbar-brand" href="index.php"><img src="img/index/logo.png" alt="img/index/logo.png"
            class="logo img-fluid"></a>
    <button class="navbar-toggler  btn-navber " type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon "><i class="fas fa-bars py-1"></i></span>


    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <?
        # ml-auto เลื่อนไปทางขวา
        // ข้อความนี้ก็ไม่ถูกแสดงผลเช่นกัน (รูปแบบที่2)
        ?>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle overflow-auto" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        สินค้า
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item " href="shopproduct.php">สินค้าทั้งหมด</a>
                        <?php

                        $conn = new mysqli('localhost', 'root', '1234', 'shopbook');
                        $conn->set_charset("utf8");
                        if (isset($_GET['typeproduct'])) {

                            $selectTypeproduct = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND `product`.`Type_ID` = '" . $_GET['typeproduct'] . "' ";
                            # code...
                        }
                        $selectTypeproduct = "SELECT DISTINCT `product`.`Type_ID` , `producttype`.`Type_Name` FROM `product`,`producttype` WHERE `product`. `Type_ID`= `producttype`.`Type_ID` ORDER BY `product`.`Type_ID` ASC";
                        $resultTypeproduct = mysqli_query($conn, $selectTypeproduct);
                        while ($row = mysqli_fetch_array($resultTypeproduct)) {
                            //echo $row["Type_ID"];
                            //  <a href="php/delete.php?Warranty_ID=<?php
                            // echo $row["Warranty_ID"];                           
                            //<i class=" fas fa-trash-alt"></i></a>
                            //shopproduct.php?typeproduct= <?php echo $row["id"]; 

                            //print_r($row);

                        ?>





                        <a class="dropdown-item"
                            href="shopproduct.php?typeproduct=<?php echo $row["Type_ID"]; ?> "><?php echo $row["Type_Name"];   ?></a>


                        <?php

                        }

                        ?>

                    </div>
                </li>


                <!--
                <li class=" nav-item ">
                    <a class=" nav-link" href="index.php">โปรโมชั่นสินค้า </a>
                </li>
                -->

            </ul>

            <ul class="navbar-nav ml-auto">
                <?php
                if (!isset($_SESSION['ID'])) {



                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">ลงชื่อเข้าใช้</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">สมัครสมาชิก</a>
                </li>


                <?php
                }
                if (isset($_SESSION['ID'])) {



                    if ($_SESSION['Username'] == 'Peawza') {
                        session_destroy();
                        header('location:index.php');
                    }



                ?>

                <?php
                    if ($_SESSION['UserType'] == 'user') {
                    ?>
                <li class="nav-item ">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> รายการสินค้า </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ยินดีต้อนรับคุณ <?php echo $_SESSION['Username']; ?> <img
                            src="img\profile\<?php echo $_SESSION['Photo']; ?>" alt="<?php echo $_SESSION['Photo']; ?>"
                            class="iconphoto img-fluid rounded-circle">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">ประวัติส่วนตัว</a>
                        <a class="dropdown-item" href="prodile_editpassword.php">แก้ไขรหัสผ่าน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="oderproductuser.php">รายงานสั่งซื้อสินค้า</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="php/logout.php">ออกจากระบบ</a>
                    </div>
                </li>
                <?php
                    }
                    ?>

                <?php
                    if ($_SESSION['UserType'] == 'admin') {
                    ?>
                <li class="nav-item ">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> รายการสินค้า </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        จัดการระบบ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="manageuser.php">จัดการสมาชิกในระบบ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="typeproduct.php">ประเภทสินค้า</a>
                        <!-- เอาประกันออก
                        <a class="dropdown-item" href="warranty.php">ประเภทการรับประกัน</a> 
                                           -->

                        <a class="dropdown-item" href="product.php">สินค้าในระบบ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="rentproductall.php">คืนหนังสือ</a>
                        <a class="dropdown-item" href="oderproduct.php">ตรวจสอบการสั่งซื้อสินค้า</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="totalsell.php">รายงานสรุปการขายสินค้า</a>
                        <a class="dropdown-item" href="totaltopsell.php">รายงานอันดับสินค้าขายดี</a>
                    </div>
                </li>



                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ยินดีต้อนรับคุณ <?php echo $_SESSION['Username']; ?> <img
                            src="img\profile\<?php echo $_SESSION['Photo']; ?>" alt="<?php echo $_SESSION['Photo']; ?>"
                            class="iconphoto img-fluid rounded-circle">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">ประวัติส่วนตัว</a>
                        <a class="dropdown-item" href="prodile_editpassword.php">แก้ไขรหัสผ่าน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="php/logout.php">ออกจากระบบ</a>
                    </div>
                </li>
                <?php
                    }
                    ?>

                <?php
                }
                ?>




            </ul>
        </div>

    </div>






    </div>






</nav>