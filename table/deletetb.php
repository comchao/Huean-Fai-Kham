<?php
    require '../connectdb.php';

    $tb_id = $_GET['id'];

    $sql1_select = "SELECT tb_id FROM tbtable WHERE tb_id='$tb_id";
    $row_select = mysqli_query($dbcon,$sql1_select);
    $result_member = mysqli_fetch_row($row_select );


    /*unlink('../news_image/'.$filename);*/

    $sql1 = "DELETE FROM tbtable WHERE tb_id='$tb_id'";
    $result1 = mysqli_query($dbcon,$sql1);

    if ($result1) {
       header("Location: ../table/datatable.php");
    }else {
      echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
 ?>
