<html>
<head>
<title></title>
</head>
<body>
<?php
session_start();

include("connects.php");
 
if($_POST["img"] == ""){
	$sql = "UPDATE product SET 
			name = '".$_POST["name"]."' ,
			price = '".$_POST["price"]."' 
			WHERE pid = '".$_GET["pidup"]."' ";
	 echo "Hello";
	}else{
		$sql = "UPDATE product SET 
			name = '".$_POST["name"]."' ,
			price = '".$_POST["price"]."' ,
			img = '".$_POST["img"]."' 
			WHERE pid = '".$_GET["pidup"]."' ";
		}






	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "Record update successfully";
	 echo '<meta http-equiv= "refresh" content="0; url = fromupdate.php"/>';
	}
	mysqli_close($conn);
?>
</body>
</html>