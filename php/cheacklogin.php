<?php
require_once('condbbook.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['submitlogin'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE User_Username = ? ");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!empty($row)) {
        if (password_verify($password, $row['User_Password'])) {


            $_SESSION['ID'] = $row['User_ID'];
            $_SESSION['Username'] = $row['User_Username'];
            $_SESSION['Photo'] = $row['User_Photo'];
            $_SESSION['Firstname'] = $row['User_Firstname'];
            $_SESSION['Lastname'] = $row['User_Lastname'];
            $_SESSION['Telephonenumber'] = $row['User_Telephonenumber'];
            $_SESSION['UserType'] = $row['User_Type'];
            $_SESSION['Email'] = $row['User_Email'];
            header('location:../index.php');
        } else {

            echo "<script> alert('รหัสผ่านผิด'); </script>";

            header('Refresh:0; url=../login.php');
        }
    } else {
        echo "<script> alert('ไม่พบ Username นี้ในระบบ'); </script>";
        header('Refresh:0; url=../login.php');
    }
} else {
    echo ('ล้มเหลว');
    header('location:../index.php');
}
