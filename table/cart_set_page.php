<?php

require '../connectdb.php';

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


//หน้าจองแต่โต๊ะ
if($_POST['type'] == '0') {

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




    if ($result_booktb &$result_tbtable&$result_report) {
        header("Location: user_order_tabel.php?login_id=$login_id&id_report=$id_report");
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




    if ($result_booktb &$result_tbtable&$result_report) {

        $_SESSION['login_id']   = $_POST['login_id'];
        $_SESSION['id_report']   = $_POST['id_report'];

        header("Location: index.php?login_id=$login_id&id_report=$id_report");
    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}

//อาหารกลับบ้าน
if($_POST['type'] == '3') {

    echo$login_id = $_POST['login_id'];
    echo $id_report = $_POST['id_report'];
    echo  $type = $_POST['type'];



    // insert  report to db
    $query_report = "INSERT INTO report(id_report,login_id,status,type)
             VALUES('$id_report','$login_id','0','$type')";
    $result_report = mysqli_query($dbcon, $query_report);

    if ($result_report) {

        $_SESSION['login_id']   = $_POST['login_id'];
        $_SESSION['id_report']   = $_POST['id_report'];

        header("Location: index.php?login_id=$login_id&id_report=$id_report");
    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}







/*
/$login_id  = $_POST['login_id'];
//$type  = $_POST['type'];
//
////ชื่อโต๊ะ
//$id_table = $_POST['id_table'];
////วันที่
//$tb_date = $_POST['tb_date'];
////เวลา
//$tb_time = $_POST['tb_time'];
////โซนโต๊ะ
//$zone_id = $_POST['zone_id'];*/
//
//
//
////สร้าง id_report
//$id_report;
//$sql = "SELECT MAX(id_report) FROM report";
//
//$res = mysqli_query($dbcon,$sql);
//
//$tb_total2 = 0;
//
//while ($row = mysqli_fetch_assoc($res2)) {
//    $id_report = $row2["id_report"]+1;
//
//}
//echo "สร้าง id_report=".$id_report;
//
//
//
//
//
////หน้าจองแต่โต๊ะ
//if($type== '0'){
//
//    header("Location: ?login_id=$login_id");
//
//    $query = "INSERT INTO booktb(id_table,tb_date,tb_time,zone_id,login_id)
//              VALUES('$id_table','$tb_date','$tb_time','$zone_id','$id_status','$login_id')";
//    $result = mysqli_query($dbcon,$query);
//
//    $results = mysqli_query($dbcon,$sql);
//    if ($result) {
//        session_start();
//        $_SESSION['login_id']   = $_POST['login_id'];
//        header("Location: index.php");
//    }else {
//        echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
//    }
//    mysqli_close($dbcon);
//}
////หน้าจองแต่โต๊ะ+อาหาร
//if($type== '1'){
//
//    header("Location: user_order_tabel_food.php?login_id=$login_id");
//}
//
//
////อาหารกลับบ้าน
//if($type== '2'){
//
//    header("Location: user_order_home.php?login_id=$login_id");
//}
//
//
//
//$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//?>


</body>
</html>
