<?php

$host = "localhost";
$user = "root";
$pass = "123456789";
$dbname = "hueanfaikham";
$conn = mysqli_connect($host,$user,$pass,$dbname);

if(mysqli_connect_errno()){
		echo "Connect failed: ".mysqli_connect_error();
		exit();
}else{
	//echo "Connect ok";	
}

mysqli_set_charset($conn,"utf8");

?>