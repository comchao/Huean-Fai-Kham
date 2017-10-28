<?php

mysql_connect("localhost","root","123456789");
mysql_select_db("hueanfaikham");

  $Total = 0;
  $SumTotal = 0;

 /* $strSQL = "
	INSERT INTO orders (order_id,order_menu,login_id,tb_date,Email)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_POST["txtName"]."','".$_POST["txtAddress"]."','".$_POST["txtTel"]."','".$_POST["txtEmail"]."') 
  ";
  mysql_query($strSQL) or die(mysql_error());

  $strOrderID = mysql_insert_id();*/
 
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		  
		$strSQL = "SELECT * FROM product WHERE pid = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
		$objResult = mysql_fetch_array($objQuery);
		$Total = $_SESSION["strQty"][$i] * $objResult["price"];	  
			 $strSQL = "
				INSERT INTO orders
				VALUES
				('','".$_SESSION["strProductID"][$i]."','".$_SESSION['login_id']."',now(),now(),				
				'".$Total."','".$_SESSION['name']."') 
			  ";
			  mysql_query($strSQL) or die(mysql_error());
	  }
  }

mysql_close();

session_destroy();

header("location:finish_order.php?OrderID=".$strOrderID);
?>

<?php /* This code download from www.ThaiCreate.Com */ ?>