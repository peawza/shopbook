<?php
require_once('../php/condbbook.php');
if (isset($_POST["typeproduct_id"])) {

     $output = '';
     //$connect = mysqli_connect("localhost", "root", "1234", "shop");
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
          /*
            <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">' . $row["address"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">' . $row["gender"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Designation</label></td>  
                     <td width="70%">' . $row["designation"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Age</label></td>  
                     <td width="70%">' . $row["age"] . ' Year</td>  
                </tr>  
           */
     }
     $output .= '  
           </table>  
      </div>  
      ';
     echo $output;
}



if (isset($_POST["product_ID"])) {
     //<img src="img\product\8989182539223.jpg" alt=""' . $row["Product_Photo"] . '""
     //class="img-fluid "></img>
     //echo 'img\product\8989182539223.jpg ';



     $output = '';
     //$connect = mysqli_connect("localhost", "root", "1234", "shop");
     //$query = "SELECT * FROM producttype WHERE `Type_ID` = '" . $_POST["typeproduct_id"] . "'";
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
                    <td width="30%"><label>ราคาสินค้า</label></td>  
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
     //<img src="img\product\8989182539223.jpg" alt=""' . $row["Product_Photo"] . '""
     //class="img-fluid "></img>
     //echo 'img\product\8989182539223.jpg ';


     $sumquantity = 0;
     $total = 0;
     $totaldelivery = 0;

     $output = '';
     //$connect = mysqli_connect("localhost", "root", "1234", "shop");
     //$query = "SELECT * FROM producttype WHERE `Type_ID` = '" . $_POST["typeproduct_id"] . "'";
     //SELECT `orderrent_ID`, `product_ID`, `orderrent_unit`, `orderrentWarrantyday`, `orderrent_ price` FROM `orderrent` WHERE `orderrent_ID`=1
     $queryorder = "SELECT * FROM `orderrent`,`product` WHERE `orderrent`.`orderrent_productid`= `product`.`Product_ID` AND`orderrent_ID`='" . $_POST["ordersalesid"] . "'";
     $resultorder = mysqli_query($conn, $queryorder);


     $output .= ' <div class="container py-4">

     <div class="container">
         <div class="card shopping-cart">
             <div class="card-header bg-dark ">
                 <div class="row">
                     <div class="text-light col-2">
                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                         รายการสินค้า
                     </div>
                     <div class="col-8"></div>
                     
                 </div>

             </div>
             <div class="card-body"> ';
     while ($rowoder = mysqli_fetch_array($resultorder)) {
          $x = "img\product\ " . $rowoder["Product_Photo"];
          $YOYO =  preg_replace("[ ]", "", $x);
          $output .= '
          <div class="row">
                         <div class="col-12 col-sm-12 col-md-2 text-center">
                              <img class="img-responsive" src="' . $YOYO . '"
                                   alt="prewiew" width="120" height="80">
                         </div>
                         <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                         <h4 class="product-name"><strong>' . $rowoder["Product_Name"] . '</strong></h4>
                              <h4>
                                   <small></small>
                              </h4>
          </div>
          <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">

               <div class="col-6 col-sm-6 col-md-6 py-1">
                    
               <h6>  <strong>' . $rowoder["Product_Balance"] . ' <span class="text-muted"> เครื่อง</span></strong></h6>
               </div>
               <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                    <h6>รวม  <strong>' . $rowoder["orderrent_totalprice"] . ' <span class="text-muted">
                      บาท</span></strong></h6>
               </div>
               

          </div>
</div>



<hr>

';
          $sumquantity = $sumquantity + $rowodersales["orderrent_unit"];
          $total = $total + $rowodersales["orderrent_ price"];
     }


     //$sumquantity = $sumquantity + $values["item_quantity"];
     //$total = $total + ($values["item_quantity"] * $values["item_price"]);
     //$totaldelivery = $total + $rowselect['Delivery_Price'];

     $mama = 0;
     $selectordersales = "SELECT * FROM `orders`,`user` WHERE `user`.`User_ID`=`orders`.`User_ID`      
     AND`orders_id`='" . $_POST["ordersalesid"] . "'";
     $resultorders = mysqli_query($conn, $selectordersales);
     $rowordersales = $resultorders->fetch_assoc();



     //ต่อ
     $output .= ' 
     
<hr>


          <div class=" text-right ml-3  " style="margin: 10px">
          การสั่งซื้อ: <b>' . $sumquantity . ' รายการ</b>
</div>

<div class=" text-right ml-3 " style="margin: 10px">

    ค่าสินค้า <b>' . $total . ' บาท</b>
</div>

<div class=" text-right ml-3 " style="margin: 10px">

    รวมทั้งหมด: <b>' . $rowordersales['orders_renttotal'] . ' บาท</b>
</div>

<hr>
<hr>
<hr>
';




     ///ต่อ
     $output .= '
     <form action="php\insert.php" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
          <div class="form-group">
          

          <table class="table table-bordered">
          <tr> 
          <td width="30%"><label>ที่อยู่ในการจัดส่ง</label></td>  
          <td width="70%"> ' . $rowordersales['Order_addressuser'] . '        
               </td>                
          </tr> 
          

          </div>


    ';


     $output .= '                      
     
     </table> ';
     echo $output;
}