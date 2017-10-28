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





$sql = "UPDATE report SET 	type = $type 
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
<!DOCTYPE html>
<html>

<?php echo $login_id; ?>
<?php echo $id_report; ?>


<input type="hidden" name="return_url" value="<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />


</body>
</html>
