<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    //echo "111111111111111111111111";
    include('include/importcss.php'); // เรียกใช่ไฟล์ include css    
    ?>
    <title>HOME</title>
</head>

<?php
require_once("php/connect.php");

//$sql = "SELECT * FROM `warranty` ORDER BY `warranty`.`Warranty_ID` ASC";
//$query = mysqli_query($conn, $sql);
?>
<?php
include('include/navber.php');
// เรียกใช่ไฟล์ include navber
?>
</head>

<body>
    <?php
    //echo '<pre>', print_r($_POST), '</pre>';
    ?>
    <div class="container-fluid py-5">

        <div class="card ">
            <div class="header py-3">
                <h4 class="title text-center">ประเภทการรับประกัน</h4>
                <a href="typeproduct.php" class="ml-4"><i class="fas fa-redo-alt"></i> รีเซ็ต</a>
            </div>
            <div class="content">
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">


                        <div class="container">

                            <thead>
                                <th width="10%"><b>รหัสประเภทสินค้า</b></th>
                                <th width="50%" class="text-center"><b>ประเภทการรับประกัน</b></th>
                                <th width="20%" class="text-center"><b>จำนวนวันรับประกัน</b></th>
                                <th width="10%"><b></b></th>
                                <th width="10%"><b></b></th>

                            </thead>
                            <tbody>

                                <?php
                                //Warranty_ID
                                //Warranty_Name
                                //Warranty_Day

                                $sql = "SELECT * FROM `warranty` ORDER BY `warranty`.`Warranty_ID` ASC";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <div class="">
                                        <td class="text-sm-right px-5"><?php echo $row["Warranty_ID"]; ?></td>
                                    </div>

                                    <td class="text-sm-left px-5"><?php echo $row["Warranty_Name"]; ?></td>
                                    <td class="text-sm-left px-5"><?php echo $row["Warranty_Day"]; ?></td>

                                    <td>
                                        <div class="container">
                                            <input type="button" name="edit" value="แก้ไขการรับประกัน"
                                                id="<?php echo $row["Warranty_ID"]; ?>"
                                                class="btn btn-info  btn-sm  edit_data-Warranty" />

                                        </div>


                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="php/delete.php?Warranty_ID=<?php
                                                                                    echo $row["Warranty_ID"];
                                                                                    ?>" style="color:#000000" ">
                                            <i class=" fas fa-trash-alt"></i></a>
                                        </div>


                                    </td>

                                </tr>
                                <?php
                                }
                                ?>



                            </tbody>
                            </form>
                        </div>

                    </table>
                </div>

            </div>
        </div>
        <div class="card my-4">

            <div class="header py-3">
                <h4 class="title text-center">เพิ่มประเภทการรับประกัน</h4>
            </div>
            <div class="container-fluid">
                <form action="php/insert.php" method="post">


                    <div class="form-row mx-sm-3 mb-2">


                        <label for="exampleFormControlInput1">ชื่อประเภทการรับกันสินค้า</label>
                        <input type="text" class="form-control mb-2 my-2 " id="namewarranty" name="namewarranty"
                            placeholder="ประเภทการรับประกันสินค้า" maxlength="50" required>

                        <div class="form-group row py-2">
                            <label for="exampleFormControlInput1" class="col-6 py-4">จำนวนวันรับประกัน</label>
                            <input type="number" class="form-control mb-2 my-2 col-4" id="daywarranty"
                                name="daywarranty" placeholder="จำนวนวัน" maxlength="4" min="1" required>
                            <label for="exampleFormControlInput1" class="col-2 py-4">วัน</label>
                        </div>



                    </div>
                    <button type="submit" class="btn btn-success btn-lg  float-right  mb-2  mx-3 my-1 px-5 "
                        id="addtype" name="insertwarranty">บันทึกประเภทการรับกันสินค้า</button>

                </form>

            </div>

        </div>



    </div>



    <!-- 555555555555555555555555555555   -->
    <div id="dataModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ประเภทการรับประกันสินค้า</h4>
                </div>
                <div class="modal-body" id="employee_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title mx-auto">แก้ไขประเภทการรับประกันสินค้า</h4>
                    <button type="button" class="close  mr-auto" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="post" id="Warranty" action="php/update.php">
                        <label>ชื่อประเภทสินค้า</label>
                        <input type="text" name="name" id="name" class="form-control" maxlength="70" />
                        <br />
                        <label>ชื่อประเภทสินค้า</label>
                        <input type="number" name="day" id="day" class="form-control" maxlength="70" min="1" />


                        <input type="hidden" name="Warrantyid2" id="Warrantyid2" class="form-control" maxlength="70" />

                        <input type="hidden" name="Warrantyid" id="Warrantyid" />
                        <div class="py-3"> </div>
                        <div>
                            <input type="submit" name="updatewarranty" id="updatewarranty" value="อัพเดท"
                                class="btn btn-success " />
                        </div>
                        <div class="py-3"></div>
                    </form>
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('include/importjavascript.php'); // เรียกใช่ไฟล์ include javascript
    ?>
</body>

</script>

</html>