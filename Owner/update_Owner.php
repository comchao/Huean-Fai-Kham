<?php
    require '../secure/connectdb.php';
    include '../secure/connectdb.php';

    $login_id = $_POST['login_id'];
    $login_firstname = $_POST['login_firstname'];
    $login_lastname = $_POST['login_lastname'];
    $login_address = $_POST['login_address'];
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];
    $login_email = $_POST['login_email'];
    $login_phone = $_POST['login_phone'];
    $login_status = $_POST['login_status'];

//update Data
  $sql = "UPDATE tblogin SET login_firstname='$login_firstname',login_lastname='$login_lastname'
          ,login_address='$login_address',login_username='$login_username'
          ,login_password='$login_password',login_email='$login_email',login_phone='$login_phone'
          ,login_status='$login_status' WHERE login_id='$login_id'";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../Owner/EditeData_Em.php");
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }
mysqli_close($dbcon);
 ?>
