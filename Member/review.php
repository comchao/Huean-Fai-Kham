<?php

    include '../connectdb.php';

    $rv_text =$_POST['rvtext'];


//insert Data
  $sql = " INSERT INTO review (rv_text)
           VALUES ('$rv_text')";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../Member/frm_review.php");
  //  echo "บันทึกข้อมูลเรียบร้อย";
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }

 ?>
