<html>
<head>
<link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/jquery.js"></script>
        <script src="js/uikit.min.js"></script>

<title></title>
</head>
<body>


?>
<?php
include('connection.php');						  
   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
   mysqli_set_charset($conn, "utf8");

  $UserID =$_GET['UserID'];
$qry_user = "SELECT * FROM room WHERE UserID='$UserID'";
   $m = mysqli_query($conn,$qry_user);
	?>	
      <?php
	 while ($result = mysqli_fetch_array($m)) 
	{
	?>		

 <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
       <div class="uk-grid" data-uk-grid-margin>
         <div class="uk-width-medium-5-8">
           <article class="uk-article">
               <form class="uk-panel uk-panel-box uk-form">
              <center><img src="img/logo.png" width="200" height="200" border="0"></center>
                 <center><font size = "2">เลขที่ 383 หมู่ 9 บ้านโพนไทร ถนนเลย-เชียงคาน ตำบลเมือง อำเภอเมืองจังหวัดเลย 42000 </font></center>
                 <center><font size = "2">เบอร์โทรติดต่อ 0898438951 </font></center><br>
                 <center><font size = "4">ใบเเจ้งหนี้</font></center><p align = "right">เลขที่ใบเสร็จ <?php echo$result["UserID"];?></p> 
				 <p align = "left"><font size = "2"> เดือน : <?php echo$result["Month"];?></font></p>
                 <p align = "left"><font size = "2"> <b>ชื่อ : <?php echo$result["Name"];?></b></font></p><h3>สถานะ:<?php echo$result["room_c"];?></h3>
                      <table class="uk-table uk-table-hover" border="1">
                            <tr>
                               <th width="15%">ห้อง</th>
                               <th width="30%">รายการ</th>
                               <th width="15%">จำนวน/หน่วย</th>
                               <th width="20%">ราคา/หน่วย</th>
                               <th width="20%">เป็นเงิน</th>
                            </tr>
                                 <tr>
                                   <td rowspan="4"><?php echo$result["Status"];?></td>
                                   <td>ค่าไฟ:</td><td><?php echo $result["fire_unit"];?></td><td>8</td><td><?php echo $result["total_fire"];?></td>
                                </tr>
                                <tr>
                                  <td>ค่าน้ำ:</td><td><?php echo $result["water_unit"];?></td><td>30</td><td><?php echo $result["total_water"];?></td>
                               </tr>
                               <tr>
                                 <td>ค่าเช่า:</td><td></td><td></td><td><?php echo $result["Rates"];?></td>
                              </tr>
                              <tr>
                                <td>อื่นๆ:</td><td></td><td></td><td></td>
                             </tr>
                                <tfoot>
                                    <tr>
                                    <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>รวม</td><td><?php echo $result["total"];?></b></td>
                                    </tr>
                               </tfoot>
                        </table>
						<b>เลขที่ใบเสร็จ  <?php echo$result["UserID"];?></b>
                        <p align = "left"><font size = "2"> หมายเหตุ </font></p>
                        <p align = "left"><font size = "2">-จ่ายไม่เกินวันที่ 5 ของทุกเดือน</font></p>
                        <p align = "right"><font size = "2"> ลงชื่อ ..................................... </font></p>
                        <p align = "right"><font size = "2"> &nbsp;&nbsp;(......................................)</font></p>
                        <p align = "right"><font size = "2"> ผู้รับเงิน &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></p>
               </form>
           </article>
         </div>
       </div>
</center>
		<SCRIPT LANGUAGE="JavaScript">
		function printPage() {
		if (window.print)
		window.print()
		else
		alert("Sorry, your browser doesn't support this feature.");
		}
		</SCRIPT>

		<title>......</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<LINK href="test.css" type="text/css" rel=stylesheet>

		</head>
		<body >
		<input type="button" name="Button" value="พิมพ์เอกสาร" onclick="javascript:printPage();">
		</body>
		<?php
						}
           ?>
		<?php
		mysqli_close($conn);
		?>
  </center>
</body>
</html>
 </body>
 </html>
