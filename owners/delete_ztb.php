<?php
    require '../connectdb.php';

    $zone_id = $_GET['id'];

    $sql1_select = "SELECT zone_id FROM tbzonetable WHERE zone_id='$zone_id";
    $row_select1 = mysqli_query($dbcon,$sql1_select);
    $result_z = mysqli_fetch_row($row_select1 );


    /*unlink('../news_image/'.$filename);*/

    $sql1 = "DELETE FROM tbzonetable WHERE zone_id='$zone_id'";
    $result1 = mysqli_query($dbcon,$sql1);

    if ($result1) {
       header("Location: ../owners/fromInsertzonetb.php");
    }else {
      echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
 ?>
