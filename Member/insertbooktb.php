<?php

    include '../connectdb.php';

    $login_id = $_POST['login_id'];
    $zone_id = $_POST['zone_id'];    
    $tb_number = $_POST['tb_number'];
    $tb_chair = $_POST['tb_chair'];
    $tb_date = $_POST['tb_date'];
    $tb_time = $_POST['tb_time'];
    $tb_status = $_POST['tb_status'];
   

//insert Data
  $sql = " INSERT INTO booktb (login_id,zone_id,tb_number,tb_chair,tb_date,tb_time,tb_status)
           VALUES ('$login_id','$zone_id','$tb_number','$tb_chair','$tb_date','$tb_time','$tb_status')";
  
  $result = mysqli_query($dbcon,$sql);
if ($result) {
    header("Location: ../Member/booktb.php");
}else {
  echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
 ?>
