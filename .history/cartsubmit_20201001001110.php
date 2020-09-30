<?php
require_once('php\condbbook.php');
//$connect = mysqli_connect("localhost", "root", "", "testing");
//$connect = mysqli_connect("localhost", "root", "", "shop");
//$query = "SELECT * FROM producttype ORDER BY `Type_ID` DESC"; // แก้ที่อยู่
//$result = mysqli_query($conn, $query);


//$rowproduct = mysqli_fetch_array($resultproduct);

echo '<pre>';
//print_r($resultproduct);
//$rowproduct = mysqli_fetch_array($resultproduct);
//print_r($rowproduct);
//echo $rowproduct["Type_Name"];

//while ($rowproduct = mysqli_fetch_array($resultproduct)) {
//    echo "<br>";
//    echo ($rowproduct["Product_ID"]);
//}
print_r($_POST);
echo '</pre>';





$username = $_POST['name'];
$password = $_POST['password'];
$row;
if (isset($_POST['submitusercart'])) {
    echo '<pre>', print_r($_POST), '</pre>';

    // echo $username;
    //echo $password;

    $username = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE User_Username = ? ");
    $stmt->bind_param('s', $username); // s - string  i- int b - bol 
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    global $row;

    if (!empty($row)) {
        if (password_verify($password, $row['User_Password'])) {
            echo "<script> alert('ผ่าน'); </script>";
?>


<?php
        } else {
            //echo 'ล้มเหลว';
            echo "<script> alert('รหัสผ่านผิด'); </script>";

            header('Refresh:0; url=cartsub.php');
        }
    } else {
        //echo "<script> alert('ไม่พบ Username นี้ในระบบ'); </script>";
        //header('Refresh:0; url=login.php');
        //header('location:../login.php');
    }
} else {
    echo ('ล้มเหลว');
    header('location:../index.php');
}




        ?>