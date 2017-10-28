<?php 
  
  include '../connectdb.php';

    $zone_id = $_POST['id']; 
    $zone_name = $_POST['zonename'];
//update Data
  $sql = "UPDATE tbzonetable 
          SET   zone_name='$zone_name'
          WHERE zone_id='$zone_id'";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../owners/fromInsertzonetb.php");
    //  echo "บันทึกข้อมูลเรียบร้อย";
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }

 ?>
