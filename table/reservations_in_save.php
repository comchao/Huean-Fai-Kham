<?php
//include '../sesstion.php';
require '../connectdb.php';
//ชื่อโต๊ะ
$id_table = $_POST['id_table'];
//วันที่
$tb_date = $_POST['tb_date'];
//เวลา
$tb_time = $_POST['tb_time'];
//โซนโต๊ะ
$zone_id = $_POST['zone_id'];

$id_status = $_POST['id_status'];

$login_id = $_POST['login_id'];



$query = "INSERT INTO booktb(id_table,tb_date,tb_time,zone_id,id_status,login_id)
            VALUES('$id_table','$tb_date','$tb_time','$zone_id','$id_status','$login_id')";
$result = mysqli_query($dbcon,$query);

$sql = "UPDATE tbtable SET tb_status='0' WHERE tb_id=$id_table";

$results = mysqli_query($dbcon,$sql);
if ($result) {
    session_start();
    $_SESSION['login_id']   = $_POST['login_id'];
    header("Location: index.php");
}else {
    echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
mysqli_close($dbcon);


?>
