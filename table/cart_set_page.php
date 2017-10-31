<?php

require '../connectdb.php';

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


//หน้าจองแต่โต๊ะ
if($_POST['type'] == '0') {

    echo $_POST['id_table'].'<br>';
    echo $_POST['tb_date'].'<br>';;
    echo $_POST['tb_time'].'<br>';;
    echo $_POST['zone_id'].'<br>';;
    echo $_POST['login_id'].'<br>';;
    echo $_POST['id_report'].'<br>';;
    echo $_POST['type'].'<br>';


    $id_table = $_POST['id_table'];
//วันที่
    $tb_date = $_POST['tb_date'];
//เวลา
    $tb_time = $_POST['tb_time'];
//โซนโต๊ะ
    $zone_id = $_POST['zone_id'];

    $login_id = $_POST['login_id'];
    $id_report = $_POST['id_report'];

    $type = $_POST['type'];


    // insert  report to db
    $query_report = "INSERT INTO report(id_report,login_id,status,type)
             VALUES('$id_report','$login_id','0','$type')";
    $result_report = mysqli_query($dbcon, $query_report);

    // insert  booktb to db
    $query_booktb = "INSERT INTO booktb(id_table,tb_date,tb_time,zone_id,login_id,id_report)
              VALUES('$id_table','$tb_date','$tb_time','$zone_id','$login_id','$id_report')";
    $result_booktb = mysqli_query($dbcon, $query_booktb);

    // update  tbtable to db
    $query_tbtable = "UPDATE tbtable SET tb_status='0' WHERE tb_id=$id_table";
    $result_tbtable = mysqli_query($dbcon,$query_tbtable);

    // update  tbzonetable to db
    $query_tbzonetable = "UPDATE tbzonetable SET zone_status='0' WHERE zone_id=$zone_id";
    $result_tbzonetable = mysqli_query($dbcon,$query_tbzonetable);


    // update  order_status to db
    $query_order_status = "UPDATE tblogin SET order_status='1' WHERE login_id=$login_id";
    $result_order_status = mysqli_query($dbcon,$query_order_status);


    if ($result_booktb &$result_tbtable&$result_report&$result_tbzonetable&$result_order_status) {
        header("Location: user_order_tabel.php?login_id=$login_id&id_report=$id_report&type=$type");
    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}


//หน้าจองแต่โต๊ะ+อาหาร
if($_POST['type'] == '1') {

    echo $_POST['id_report'];
    $id_table = $_POST['id_table'];
//วันที่
    $tb_date = $_POST['tb_date'];
//เวลา
    $tb_time = $_POST['tb_time'];
//โซนโต๊ะ
    $zone_id = $_POST['zone_id'];

    $login_id = $_POST['login_id'];
    $id_report = $_POST['id_report'];

    $type = $_POST['type'];


    // insert  report to db
    $query_report = "INSERT INTO report(id_report,login_id,status,type)
             VALUES('$id_report','$login_id','0','$type')";
    $result_report = mysqli_query($dbcon, $query_report);

    // insert  booktb to db
    $query_booktb = "INSERT INTO booktb(id_table,tb_date,tb_time,zone_id,login_id,id_report)
              VALUES('$id_table','$tb_date','$tb_time','$zone_id','$login_id','$id_report')";
    $result_booktb = mysqli_query($dbcon, $query_booktb);

    // update  tbtable to db
    $query_tbtable = "UPDATE tbtable SET tb_status='0' WHERE tb_id=$id_table";
    $result_tbtable = mysqli_query($dbcon,$query_tbtable);

    // update  tbzonetable to db
    $query_tbzonetable = "UPDATE tbzonetable SET zone_status = '0' WHERE zone_id=$zone_id";
    $result_tbzonetable = mysqli_query($dbcon,$query_tbzonetable);


    // update  order_status to db
    $query_order_status = "UPDATE tblogin SET order_status='1' WHERE login_id=$login_id";
    $result_order_status = mysqli_query($dbcon,$query_order_status);


    if ($result_booktb &$result_tbtable&$result_report&$result_tbzonetable&$result_order_status) {

        $_SESSION['login_id']   = $_POST['login_id'];
        $_SESSION['id_report']   = $_POST['id_report'];

   header("Location: index.php?login_id=$login_id&id_report=$id_report&type=$type&zone_status=$zone_id");
    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}

//อาหารกลับบ้าน
if($_POST['type'] == '2') {

    echo$login_id = $_POST['login_id'];
    echo $id_report = $_POST['id_report'];
    echo  $type = $_POST['type'];




    if ( $_POST['login_id']) {

        $_SESSION['login_id']   = $_POST['login_id'];

        header("Location: index2.php?login_id=$login_id&id_report=$id_report&type=$type");
    } else {
        echo "เกิดข้อผิดพลาด";
    }


}



?>


</body>
</html>
