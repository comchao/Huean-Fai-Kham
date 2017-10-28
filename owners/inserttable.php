<?php
include("../connectdb.php");

	$tb_number = $_POST['number'];
	$tb_numchair = $_POST['numchair'];
	$tbzonetable = $_POST['tbzonetable'];


$sql2 = "SELECT MAX(tb_id) FROM tbtable";
$result = mysqli_query($dbcon,$sql2);

if ($result) {
    $row = mysqli_fetch_array($result);
} 
if($tb_number==""||$tb_numchair==""){
			echo 'alert(" กรุณากรอกข้อมูลให้ครบ! ")';
			echo "<meta http-equiv='refresh' content='0; url=fromInserttable.php'>";

	}else{
		$sql= "insert into tbtable(tb_number,tb_numchair,zone_id) values('$tb_number','$tb_numchair','$tbzonetable')";
		if (!mysqli_query($dbcon,$sql)){
  			die('Error: ' . mysqli_error($dbcon));
		}
	
	}
	
mysqli_close($dbcon);
 echo '<meta http-equiv= "refresh" content="0; url = fromInserttable.php"/>';

?>
