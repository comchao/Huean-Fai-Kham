<?php
@session_start();
include '../connectdb.php';
?>
<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
<title>ยืนยันการสั่งอาหาร</title>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../Main/assets/css/main.css" />
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
    width: 20%;
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
              width: 80%;
                  }
                  th, td {
              text-align: left;
              padding: 10px;
                         }
                  tr:nth-child(even){background-color: #f2f2f2}
                  th {
              background-color: #4CAF50;
              color: white;
                     }
        </style>
        <style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button2 {background-color: #008CBA;} /* Blue */
  </style>

</head>
<body id="page1">
<?php include '../indexMain/css/popup.css' ?>
<div class="#">
  <div class="#">
    <div class="">
      <div class="main zerogrid">
<!-- header -->
        <header>
          <?php include "../secure/tapmember.php" ?>
        </header>

<?php
mysql_connect("localhost","root","123456789");
mysql_select_db("hueanfaikham");
?>
<!-- Content -->
<center>
    <section>
                      <!--<table border="lpx">-->
                      <form name="form1" method="post" action="save_checkout.php">
                       <table> 
                        <h4>รายการอาหารทั้งหมดที่สั่ง</h4>
                          <tr>
                            <th>รหัสอาหาร</th>
                            <th>ชื่ออาหาร</th>
                            <th>ราคา</th>
                            <th>จำนวน(จาน)</th>
                            <th>รวมราคา</th>
                          </tr>
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
		<td><?php echo $_SESSION["strProductID"][$i];?></td>
		<td><?php echo $objResult["name"];?></td>
		<td><?php echo $objResult["price"];?></td>
		<td><?php echo $_SESSION["strQty"][$i];?></td>
		<td><?php echo number_format($Total,2);?></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>
รหัสลูกค้า : 
  <?php
        echo $_SESSION['login_id'] ; 
  ?> <br>
  ชื่อลูกค้า : 
  <?php
        echo $_SESSION['name']."      ".$_SESSION['lname']; 
  ?> <br>

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
    <td><?php echo "ชื่ออาหาร : ".$objResult["name"]; ?></td>
    <td><?php echo "| "." ราคา : ".$objResult["price"];?></td>
    <td><?php echo "| "." จำนวน : ".$_SESSION["strQty"][$i];?></td><br>
    </tr>
    <?php
    }
  }
  ?>
  <br>
  รวมทั้งหมด = <?php echo number_format($SumTotal,2);?> บาท
   <br>

 <?php
    $sql_tbzonetable = "SELECT * FROM tblogin";
    echo $_SESSION['login_username'] ; 
  ?>
วันที่/เวลา :
<?php

date_default_timezone_set("Asia/Bangkok");
//echo date_default_timezone_get();

  $date = date("d-m-Y");
    $time = date("H:i:s");
     
    echo $date." / ".$time;
    ?>
<br>
  <tr>
    <button class="btn info">ยืนยันการสั่งจอง</button>
  </tr>
</body>
</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>