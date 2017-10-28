<?php

    include '../connectdb.php';

    $tb_number = $_POST['number'];
    $tb_numchair = $_POST['numchair'];
    $tb_status =$_POST['status'];
    $zone_id =$_POST['tbzonetable'];


//insert Data
  $sql = " INSERT INTO tables (tb_number,tb_numchair,tb_status,zone_id)
           VALUES ('$tb_number','$tb_numchair','$tb_status','$zone_id')";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../table/frominserttable.php");
  //  echo "บันทึกข้อมูลเรียบร้อย";
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }

 ?>

