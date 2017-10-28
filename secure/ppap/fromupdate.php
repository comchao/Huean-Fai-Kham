

<head>
<title>DelectProduct</title>
<script src="" type="text/javascript"></script>
<link href="" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
@session_start();
include("connects.php");
	
$sql = "SELECT * from product ";
	
	if(!$result = mysqli_query($conn,$sql)){
		die('Error: '.mysqli_error($conn));
	}
	if(mysqli_num_rows($result)==0){
		echo "There is no data";
	}else{
			?>	 <br>
            <h2 align="center">รายการสินค้า</h2>
       			 <table align="center" border="1" class="show" align="center" width="50%">
       			 <tr>
           			<th>ชื่อสินค้า</th>
                    <th>รูปสินค้า</th>
                    <th>ราคา</th>
                 <th></th>
 				</tr>
		<?php
		while($data = mysqli_fetch_array($result,MYSQLI_BOTH)){
		?>
       <form  method="post"  action="updateProduct.php?pidup=<?php echo $data["pid"];?>">
        <tr>
      	   <td ><input type="text" name="name" id="name" autofocus value="<?php echo $data["name"];?> " style="width:100px; text-align:center ;"/> </td>  
           <td align="center"><?php echo '<img  src="'.$data["img"].'" width="100 height="100" '?>  <td align="center"> <input type="file" name="img" id="image" style="width:70px; text-align:center ;" /></td></td>  
           <td align="center"><input type="text" name="price" id="price" autofocus value=" <?php echo $data["price"];?> " style="width:80px; text-align:center ;"/> </td>            
           <td align="center"><input type="submit" id="update" name="update" value="Update"</a> </a></td>          
        </tr>
        
        </form>
		<?php }?>
		<?php }?>
         </table>
   
<a href="index.php	">กลับหน้าหลัก</a>
</body>
</html>