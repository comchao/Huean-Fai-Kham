<?php
//include '../sesstion.php';
require '../connectdb.php';


$zone_id= $_POST['zone_id'];
$tb_numchair = $_POST['tb_numchair'];
$tb_id = $_POST['tb_id'];
$tb_number = $_POST['tb_number'];
$tb_status = $_POST['tb_status'];


$sql = "UPDATE tbtable SET 
                          tb_numchair='$tb_numchair' ,
                          tb_number='$tb_number' ,
                           zone_id = '$zone_id' , 
                           tb_status='$tb_status'
                            WHERE tb_id= '$tb_id' ";

$results = mysqli_query($dbcon,$sql);
if ($results) {
    header("Location: ../owners/datatable.php");
}else {
    echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
mysqli_close($dbcon);


?>
