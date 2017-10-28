<?php

    include '../connectdb.php';

	$zone_name = $_POST['zonename'];

//insert Data
  $sql = " INSERT INTO tbzonetable (zone_name)
           VALUES ('$zone_name')";
  
  $result = mysqli_query($dbcon,$sql);
if ($result) {
  header("Location: ../owners/fromInsertzonetb.php");
}else {
  echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
mysqli_close($dbcon);
 ?>
