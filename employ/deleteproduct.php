<?php
    require '../connectdb.php';

    $pid = $_GET['id'];

    $sql_select = "SELECT img FROM product WHERE pid='$pid'";
    $res_select = mysqli_query($dbcon, $sql_select);
    $product_image = mysqli_fetch_row($res_select);
    $filename = $product_image[0];

    unlink('../product/img/'.$filename);

    $sql = "DELETE FROM product WHERE pid='$pid'";
    $result = mysqli_query($dbcon,$sql);

    if ($result) {
       header("Location: ../employ/frominsertProduct.php");
    }else {
      echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
    }
    mysqli_close($dbcon);
 ?>
