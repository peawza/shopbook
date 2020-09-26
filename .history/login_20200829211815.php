<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> <!-- link เลือก css-->
    <link rel="stylesheet" href="node_modules/font-awesome5/css/fontawesome-all.css">
    <link rel="stylesheet" href="include/CSS/styles.css?v=<?php echo filemtime('include/CSS/styles.css'); ?>"
        type=" text/css">
    <!--

    <link rel="stylesheet" href="include/CSS/cssLogin.css">
-->
    <title>Document</title>

    <?php
    include('include/navber.php'); // เรียกใช่ไฟล์ include
    ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6  mt-5">
                <div class="card">
                    <div class="card-header text-center">
                        เข้าสู่ระบบ
                    </div>
                    <div class="card-body">

                        <form method="POST" action="php/cheacklogin.php">
                            <div class="form">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="far fa-user"></i></div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username" maxlength="30"
                                            id="username" name="username" required>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                    <div class="input-group mb-4 ">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password" maxlength="20" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-6">
                                        <div class="form-check mb-3">

                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                            <label class="form-check-label" for="autoSizingCheck">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>

                                    <a class="text-right col-5" href="register.php">สมัครสมาชิก</a>
                                </div>



                                <div class="col-auto">
                                    <button type="submit " name="submitlogin" id="submitlogin"
                                        class="btn btn-primary mb-2">ล็อคอิน</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <script src="node_modules/jquery/dist/jquery.min.js"></script> <!-- sc เลือก src -->
        <script src="node_modules/popper.js/dist/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>