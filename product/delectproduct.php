<?php
session_start();
include("../connects.php");


$delect = $_GET['pidDelect'];

//สำหรับลบภาพใน โฟลเดอร์ 
        $sql_show = mysqli_query($conn,"SELECT * FROM product Where pid = '$delect'");
        $row_pic = mysqli_fetch_array($sql_show);
        $filename = $row_pic['img'];
        $filename = $_SERVER['DOCUMENT_ROOT']."/HueanFaiKham/product/".$filename;  //รันบนโฮสจริงต้องลบ /HueanFaiKham ออก
        unlink($filename);

$sql="DELETE FROM `product` WHERE `product`.`pid` = '$delect'";
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
if (!mysqli_query($conn,$sql)){
echo "<script type='text/javascript'>alert('Delete Incomplete');";
echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>