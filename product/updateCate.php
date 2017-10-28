<?php
    require '../connectdb.php';
    include '../connectdb.php';

    $category_id = $_POST['id'];
    $category_name = $_POST['name'];
    
//update Data
  $sql = "UPDATE category 
          SET category_name = '$category_name'
          WHERE category_id='$category_id'";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../product/frm_insertCategory.php");
    //  echo "บันทึกข้อมูลเรียบร้อย";
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }

 ?>


