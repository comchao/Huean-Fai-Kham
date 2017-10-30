<?php

include_once("config.php");
require '../connectdb.php';

if(!isset($_SESSION))
{
    session_start();

}
$login_id  = $_POST['login_id'];
$id_report  = $_POST['id_report'];

$type  = $_POST['type'];
$tb_id  = $_POST['tb_id'];


//จองโต๊ะ
if($_POST['type'] == "0"){

    $sql = "UPDATE report SET 	status = '2' 
WHERE id_report = $id_report";
    $results = mysqli_query($dbcon,$sql);

    $sql_tbtable = "UPDATE tbtable SET tb_status = '1'
WHERE tb_id = $tb_id";
    $results_tbtable = mysqli_query($dbcon,$sql_tbtable);


    if ($results&$results_tbtable) {
        header("Location: reservations_in.php?id_report=$id_report&login_id=$login_id&tb_id=$tb_id");
    }else {
        echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}

//จองโต๊ะ+อาหาร
if($_POST['type'] == "1"){

    $sql = "UPDATE report SET 	status = '2' 
WHERE id_report = $id_report";
    $results = mysqli_query($dbcon,$sql);

    $sql_tbtable = "UPDATE tbtable SET tb_status = '1'
WHERE tb_id = $tb_id";
    $results_tbtable = mysqli_query($dbcon,$sql_tbtable);


    if ($results&$results_tbtable) {
        header("Location: reservations_in.php?id_report=$id_report&login_id=$login_id&tb_id=$tb_id");
    }else {
        echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}

//สั่งอาหารพร้อมกลับบ้าน
if($_POST['type'] == "2"){

    echo $login_id.'<br>';
    echo $id_report.'<br>';
    echo $type.'<br>';
    echo $tb_id.'<br>';


    $sql = "UPDATE report SET 	status = '2'
WHERE id_report = $id_report";
    $results = mysqli_query($dbcon,$sql);
    if ($results) {
        header("Location: reservations_in.php?id_report=$id_report&login_id=$login_id&tb_id=$tb_id");
    }else {
        echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}








$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>





</body>
</html>
