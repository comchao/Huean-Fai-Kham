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





$sql = "UPDATE report SET 	status = '2' 
WHERE id_report = $id_report";

$results = mysqli_query($dbcon,$sql);
if ($results) {
    header("Location: reservations_in.php?id_report=$id_report&login_id=$login_id");
}else {
    echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
mysqli_close($dbcon);







$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>





</body>
</html>
