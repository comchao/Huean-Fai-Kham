<?php
    require '../connectdb.php';
    include '../connectdb.php';

    $tb_id = $_POST['id'];
    $booktb_id = $_POST['booktb'];
    $tb_number = $_POST['number'];
    $tb_numchair = $_POST['numchair'];
    $tb_status = $_POST['status'];
    $zone_id = $_POST['tbzonetable'];
    
//update Data
  $sql = "UPDATE category 
          SET booktb_id  = '$booktb_id',
              tb_number = '$tb_number',
              tb_numchair   = '$tb_numchair',
              tb_status  = '$tb_status',
              zone_id  = '$zone_id'
          WHERE tb_id='$tb_id'";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../product/frm_insertCategory.php");
    //  echo "บันทึกข้อมูลเรียบร้อย";
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }

 ?>