<?php
session_start();
include("connects.php");

$delect = $_GET['pidDelect'];
$sql="DELETE FROM `product` WHERE `product`.`pid` = '$delect'";
echo "<meta http-equiv='refresh' content='0;url=indext.php'>";
if (!mysqli_query($conn,$sql)){
echo "<script type='text/javascript'>alert('Delete Incomplete');";
echo "<meta http-equiv='refresh' content='0;url=indext.php'>";
}
?>