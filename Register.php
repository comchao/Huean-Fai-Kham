<?php
  require 'connectdb.php';

  $login_firstname = $_POST['firstname'];
  $login_lastname = $_POST['lastname'];
  $login_email = $_POST['email'];
  $login_username = $_POST['username'];
  $login_password = $_POST['password'];
  $login_address = $_POST['address'];
  $login_phone = $_POST['phone'];

  if ($login_email == "admin") {
    echo "ห้ามใช้ username เป็น admin";
    exit;
  }
  //ป้องกันการ hack password เข้ารหัส รหัสผ่าน
  $salt = 'asdfasdf';
  $hash_login_password = hash_hmac('sha256',$login_password,$salt);

  $query = "INSERT INTO tblogin(login_firstname,login_lastname,login_address,login_username,login_password,login_email,login_phone)
            VALUES('$login_firstname','$login_lastname','$login_address','$login_username','$hash_login_password','$login_email','$login_phone')";
  $result = mysqli_query($dbcon,$query);
if ($result) {
  header("Location: secure/index.php");
}else {
  echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
mysqli_close($dbcon);
 ?>
