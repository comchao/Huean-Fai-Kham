<?php
include '../session.php'; 
?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
<title>รับออเดอร์</title>
<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../testhd/css/bootstraps.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

<!-- แต่งปุ่มสั่งซื้อ -->
<style>
.btns {
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
}
.btn {
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
}
.info {background-color: #2196F3;} /* Blue */
.info:hover {background: #0b7dda;}

.warning {background-color: #ff9800;} /* Orange */
.warning:hover {background: #e68a00;}
</style>

	<!-- แต่งสีตาราง-->
        <style>
            table {
              border: collapse;
              width: 50%;
                  }
                  th, td {
              text-align: center;
              padding: 10px;
                         }
                  tr:nth-child(even){background-color: #f2f2f2}
                  th {
              background-color: #4CAF50;
              color: white;
                     }
        </style>

</head>
	<body class="homepage">
		<div id="page-wrapper">

			<?php 
				include '../testhd/hder.php';  
			?>


<?php
mysql_connect("localhost","root","123456789");
mysql_select_db("hueanfaikham");
?>
<br> 
<!-- Content -->
<center>
	<section>
		<br>
		<!--<table border="lpx">-->
		<table>
			<form action="update.php" method="post">
		<h4>รายการอาหาร</h4>
		<tr>
			<th>รหัสอาหาร</th>
			<th>ชื่ออาหาร</th>
			<th>ราคา</th>
			<th>จำนวน(จาน)</th>
			<th>รวมราคา</th>
			<th>ลบ</th>
			</tr>

<!-- คำนวณเงิน -->
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM product WHERE pid = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
		$objResult = mysql_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?php echo $_SESSION["strProductID"][$i];?><input type="hidden" name="txtProductID<?php echo $i;?>" value="<?php echo $_SESSION["strProductID"][$i];?>"></td>
		<td><?php echo $objResult["name"];?></td>
		<td><?php echo $objResult["price"];?></td>
		<td>
			<select name="txtQty<?php echo $i;?>">
				<?php 
			
				for($qty=1;$qty<=20;$qty++)
			  {
					$sel = "";
					if($_SESSION["strQty"][$i] == $qty)
				  {
						$sel = "selected";
				  }
			  ?>
				<option value="<?php echo $qty;?>" <?php echo $sel;?>><?php echo $qty;?></option>
				<?php
			  }
			  ?>
			</select>
		</td>
		<td><?php echo number_format($Total,2);?></td>
        
        
		<td><a href="delete.php?Line=<?php echo $i;?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');" ><img src="../showcategory/b_drop.png" alt="" width="16" height="16" border="0" align="absmiddle" title="ลบข้อมูล" /></a> </td></td>
	  </tr>
	  
	  <?php
	  }
  }
  ?>
  
</table>

<table width="400"  border="0">
  <tr>
	  <td></td>
	  <td><input type="submit" class="btn warning" name="submit" value="อัพเดท" alt="อัพเดท" /></td>
	  <td align="right">รวมทั้งหมด <?php echo number_format($SumTotal,2);?> บาท</td>
  </tr>
  </table>
</form><br><a href="../testhd/Memshowdatafood.php">เลือกอาหารเพิ่ม</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a href="checkout.php">ยืนยัน</a>
<?php
	}
?>
<?php
mysql_close();
?>
</br>
</section>
</body>
</html>
