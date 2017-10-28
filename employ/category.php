<?php
  require '../connectdb.php';
  include '../connectdb.php';

  $category_name = $_POST['name'];

  $query = "INSERT INTO category(category_name)
            VALUES('$category_name')";
  $result = mysqli_query($dbcon,$query);
if ($result) {
  header("Location: ../employ/frm_insertCategory.php?code=1");
}else {
  echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
mysqli_close($dbcon);
 ?>
