<?php
    require '../connectdb.php';

    $category_id = $_GET['id'];

    $sql1_select = "SELECT category_id FROM category WHERE category_id='$category_id";
    $row_select1 = mysqli_query($dbcon,$sql1_select);
    $result_z = mysqli_fetch_row($row_select1 );


    /*unlink('../news_image/'.$filename);*/

    $sql1 = "DELETE FROM category WHERE category_id='$category_id'";
    $result1 = mysqli_query($dbcon,$sql1);

    if ($result1) {
       header("Location: ../product/frm_insertCategory.php");
    }else {
      echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
 ?>
