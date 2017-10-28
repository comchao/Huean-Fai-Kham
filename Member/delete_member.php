<?php
    require '../connectdb.php';

    $login_id = $_GET['id'];

    $sql1_select = "SELECT login_id FROM tblogin WHERE login_id='$login_id";
    $row_select = mysqli_query($dbcon,$sql1_select);
    $result_member = mysqli_fetch_row($row_select );


    /*unlink('../news_image/'.$filename);*/

    $sql1 = "DELETE FROM tblogin WHERE login_id='$login_id'";
    $result1 = mysqli_query($dbcon,$sql1);

    if ($result1) {
       header("Location: ../Employee/Employee_Manage.php");
    }else {
      echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
 ?>
