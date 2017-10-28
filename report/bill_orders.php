<?php
    require '../connects.php';
	error_reporting(0);
	$firstname = $_POST['firstname'];
	$p = '%'.$firstname.'%';
	
	$sql = "SELECT * FROM orders WHERE firstname LIKE '$p' and order_menu ORDER BY order_id DESC";
	 $result = mysqli_query($conn, $sql); 
?>

<html>

    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/jquery.js"></script>
        <script src="js/uikit.min.js"></script>
   <head>
  <body>
         
   </head>
      <body>
		 <form action="bill_orders.php"  method="POST" class="uk-panel uk-panel-box uk-form">
		  <center><h1>ออเดอร์ทั้งหมด</h1></center>
		 <label>วัน/เดือน/ปี :</label><input type="Month" name="Month" />
		 <input name="submit" type="submit" id="submit" value="ค้นหา"> 
	  <br>
	  <table class="uk-table uk-table-hover" border="1">
	  <tr>
	                   <th  width="2%" bgcolor="#FFCC33">รหัส</th>
                       <th  width="8%" bgcolor="#FFCC33">ออเดอร์เมนู</th>
                       <th  width="4%" bgcolor="#FFCC33">วัน/เดือน/ปี</th>
						<th  width="4%" bgcolor="#FFCC33">เวลา</th>
						<th  width="3.7%" bgcolor="#FFCC33">รหัสลูกค้า</th>
						<th  width="4%" bgcolor="#FFCC33">ชื่อลูกค้า</th>
						<th  width="5%" bgcolor="#FFCC33" >สถานะ</th>
						<th  width="5%" bgcolor="#FFCC33">ปริ้น</th>
		</tr>	
		<?php
		    while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		?>
		<tr>
               
					<td bgcolor="#F0FFF0"><?php echo $row["order_id"];?></td>
					<td bgcolor="#F0FFF0"><?php echo $row["order_menu"];?></td>
					<td bgcolor="#F0FFF0"align="right"><?php echo $row["tb_date"];?></td>
					<td bgcolor="#F0FFF0"align="right"><?php echo $row["tb_time"];?></td>
					<td bgcolor="#F0FFF0"align="right"><?php echo $row["login_id"];?></td>
					<td bgcolor="#F0FFF0"align="right"><b><?php echo $row["firstname"];?><b></td>
					<td bgcolor="#F0FFF0"><?php echo $row["Status"];?></td>
					<td align="center"><a href="pbbill_orders.php?order_id=<?php echo $row["order_id"];?>"><img src="img/print.png" width="37" height="37" border="1"></a></td>
			</tr>   
			<?php
			   }
			   ?>
		</table>
 </form>			   
			 		 
	  </body>
	  </html>
	  