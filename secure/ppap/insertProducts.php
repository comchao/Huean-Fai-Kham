<?php
include("connects.php");

$fileName = $_FILES["image"]["name"];
$fileType = $_FILES["image"]["type"];
$fileSize = $_FILES["image"]["size"];

$name = $_POST['name'];
$price =$_POST['price'];

$sql2 = "SELECT MAX(pid) FROM product";
$result = mysqli_query($conn,$sql2);

if ($result) {
    $row = mysqli_fetch_array($result);
} 
$nImag = $row['MAX(pid)'] +1;

$newFileName = "img/".$nImag.".jpg";

     if($name==""||$price==""){
			echo 'alert(" กรุณากรอกข้อมูลให้ครบ! ")';
			echo "<meta http-equiv='refresh' content='0;url=frominsertProduct.php'>";
	}else{
		$sql= "insert into product(name,price,img) values('$name','$price','$newFileName')";
		if (!mysqli_query($conn,$sql)){
  			die('Error: ' . mysqli_error($conn));
		}


		if($_FILES["image"]["error"]>0){
			echo "Return Code".$$_FILE["image"]."<br/>";	
		}else{			
					$newName = $nImag.".jpg";
					move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$newName);
					echo "Stored in:"."img/".$fileName;			
				}
	
		 }
	
mysqli_close($conn);
 echo '<meta http-equiv= "refresh" content="0; url = frominsertProduct.php"/>';

?>
