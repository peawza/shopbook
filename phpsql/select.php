<?php
require_once('../php/condbbook.php');
if (isset($_POST["typeproduct_id"])) {

     $output = '';
     $query = "SELECT * FROM producttype WHERE `Type_ID` = '" . $_POST["typeproduct_id"] . "'";
     $result = mysqli_query($connect, $query);
     $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
     while ($row = mysqli_fetch_array($result)) {
          $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">' . $row["Type_Name"] . '</td>  
                </tr>  
               
           ';
     }
     $output .= '  
           </table>  
      </div>  
      ';
     echo $output;
}



if (isset($_POST["product_ID"])) {

     $output = '';

     $query = "SELECT * FROM `product`,`producttype` WHERE `product`.`Type_ID` = `producttype`.`Type_ID` AND  `product`.`Product_ID` = '" . $_POST["product_ID"] . "'";
     $result = mysqli_query($conn, $query);
     $output .= '  
     <div class="table-responsive">  
          <table class="table table-bordered">';
     while ($row = mysqli_fetch_array($result)) {
          $x = "img\product\ " . $row["Product_Photo"];
          $YOYO =  preg_replace("[ ]", "", $x);
          $output .= '  
               <tr>  
                    <td width="30%"><label>รหัสสินค้า</label></td>  
                    <td width="70%">' . $row["Product_ID"] . '</td>  
               </tr>  
               
          
          <tr>  
                    <td width="30%"><label>ชื่อสินค้า</label></td>  
                    <td width="70%">' . $row["Product_Name"] . '</td>  
               </tr>  
               <tr>  
                    <td width="30%"><label>ประเภทสินค้า</label></td>  
                    <td width="70%">' . $row["Type_Name"] . '</td>  
               </tr> 
               <tr>  
                    <td width="30%"><label>ราคาซื้อหนังสือมา</label></td>  
                    <td width="70%">' . $row["product_buy"] . '   บาท</td>  
               </tr>  
               <tr>  
                    <td width="30%"><label>ราคาเช่าหนังสือ</label></td>  
                    <td width="70%">' . $row["Product_Price"] . '   บาท</td>  
               </tr>  
               <tr>  
                    <td width="30%"><label>จำนวนสินค้า</label></td>  
                    <td width="70%">' . $row["Product_Balance"] . ' </td>  
               </tr>  
               <tr>  
                    <td width="30%"><label>จำนวนวันที่ให้เช้าหนังสือ</label></td>  
                    <td width="70%">' . $row["Product_rentday"] . ' </td>  
               </tr>
               
               <tr>
                    <td width="30%"><label>รายละเอียดสินค้า</label></td>  
                    <td width="70%"><textarea class="form-control" id="detail" name="detail" rows="10" disabled
                         >' . $row["Product_Details"] . '</textarea></td> 

               </tr> 

               <tr> 
                    <td width="30%"><label>รูปสินค้า</label></td>  
                    <td width="70%"><img src="' . $YOYO . '" alt=""' . $row["Product_Photo"] . '""
                         class="img-fluid img-product "></img>
                         
                         
                         </td> 
                         
               </tr> 
               
          
          ';
     }
     $output .= '  
          </table>  
     </div>  
     ';
     echo $output;
}




if (isset($_POST["ordersalesid"])) {



     $sumquantity = 0;
     $total = 0;
     $totaldelivery = 0;

     $output = '';
     $queryorder = "SELECT * FROM `orderrent`,`product` WHERE `orderrent`.`orderrent_productid`= `product`.`Product_ID` AND`orderrent_ID`='" . $_POST["ordersalesid"] . "'";
     $resultorder = mysqli_query($conn, $queryorder);
     $originalDatetoday = date("d/m/Y");



     $output .= ' <div class="container py-4">

     <div class="container">
         <div class="card shopping-cart">
             <div class="card-header bg-dark ">
                 <div class="row">
                     <div class="text-light col-3">
                     <h5>
                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                         รายการเช่าหนังสือ </h5>
                     </div>
                     <div class="col-8 text-right "><h4  style="color:rgb(255, 255, 255)">วันที่ ' . $originalDatetoday . '</h4></div>
                     
                 </div>

             </div>
             <div class="card-body"> ';
     while ($rowoder = mysqli_fetch_array($resultorder)) {
          $x = "img\product\ " . $rowoder["Product_Photo"];
          $YOYO =  preg_replace("[ ]", "", $x);

          $originalDate = $rowoder["orderrent_returndate"];
          $newDate = date("d / m / Y", strtotime($originalDate));

          $output .= '
<div class="row">
    <div class="col-12 col-sm-12 col-md-2 text-center">
        <img class="img-responsive" src="' . $YOYO . '" alt="prewiew" width="120" height="80">
    </div>
    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
        <h5 class="product-name"><strong>' . $rowoder["Product_Name"] . '</strong></h5>
        <h5 class="product-name"><strong>คืนก่อนวันที่ ' . $newDate . '</strong></h5>
        <h4>
            <small></small>
        </h4>
    </div>
    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">

        <div class="col-6 col-sm-6 col-md-6 py-1">

            <h6> <strong>' . $rowoder["orderrent_amount"] . ' <span class="text-muted"> เล่ม</span></strong></h6>
        </div>
        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
            <h6>รวม <strong>' . $rowoder["orderrent_totalprice"] . ' <span class="text-muted">
                        บาท</span></strong></h6>
        </div>


    </div>
</div>



<hr>

';
          $sumquantity = $sumquantity + $rowoder["orderrent_amount"];
     }




     $mama = 0;
     $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`
AND`orders_id`='" . $_POST["ordersalesid"] . "'";
     $resultorders = mysqli_query($conn, $selectordersales);
     $rowordersales = $resultorders->fetch_assoc();




     $output .= '

<hr>


<div class=" text-right ml-3  " style="margin: 10px">
    เช่าทั้งหมด: <b>' . $sumquantity . ' เล่ม</b>
</div>


<div class=" text-right ml-3 " style="margin: 10px">

    รวมทั้งหมด: <b>' . $rowordersales['orders_renttotal'] . ' บาท</b>
</div>

<hr>
<hr>
<hr>
';





     $output .= '
<form action="php\insert.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group">


            <table class="table table-bordered">
                <tr>
                    <td width="30%"><label>ที่อยู่ของลูกค้า</label></td>
                    <td width="70%"> ' . $rowordersales['Order_addressuser'] . '
                    </td>
                </tr>


        </div>


        ';


     $output .= '

        </table> ';
     echo $output;
}