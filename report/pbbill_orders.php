<html>
<head>
<link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/jquery.js"></script>
        <script src="js/uikit.min.js"></script>

<title></title>
</head>
<body>


<?php
include('../connects.php');						  
   $conn = mysqli_connect($host,$user,$pass,$dbname);
   mysqli_set_charset($conn, "utf8");

  $order_id =$_GET['order_id'];
  $qry_user = "SELECT * FROM orders WHERE order_id='$order_id'";
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
                 <center><font size = "2">ที่อยู่ 176/1 ถนนชายโขง ต.เชียงคาน จ.เลย, อ.เชียงคาน, , 42110</font></center>
                 <center><font size = "2">176 Mu 6, Chai Khong Road, Chiang Khan, Loei, Chiang Khan , 42110</font></center>
                 <center><font size = "2">เบอร์โทรติดต่อ 042-822-109 และ 081-808-2826</font></center><br>
                 <center><font size = "4">ออเดอร์</font></center><p align = "right">เลขที่ใบเสร็จ <?php echo$result["order_id"];?></p> 
				 <p align = "left"><font size = "2"> วันที่ : <?php echo$result["tb_date"];?></font></p>
         <p align = "left"><font size = "2"> เวลา : <?php echo$result["tb_time"];?></font></p>
                 <p align = "left"><font size = "2"> <b>ชื่อ : <?php echo$result["firstname"];?></b></font></p><h3>สถานะ:<!--<?php echo$result["room_c"];?>--></h3>
                      <table class="uk-table uk-table-hover" border="1">

                            <tr>
                               <th width="15%">ออเดอร์</th>
                               <th width="30%">รายการอาหาร</th>
                               <th width="15%">จำนวน/จาน</th>
                               <th width="20%">ราคา/บาท</th>
                               <th width="20%">รวม</th>
                            </tr>
                                 <tr>
                                   <td rowspan="4"><?php echo$result["Status"];?></td>
                                   <td>s</td><td><?php echo $result["name"];?></td><td>
                                       s</td><td><?php echo $result["total_fire"];?></td>
                                </tr>
                                <tr>
                                  <td></td><td><?php echo $result["water_unit"];?></td><td>
                                      </td><td><?php echo $result["total_water"];?></td>
                               </tr>
                               <tr>
                                 <td>3</td><td></td><td></td><td><?php echo $result["Rates"];?></td>
                              </tr>
                              <tr>
                                <td>3</td><td></td><td></td><td></td>
                             </tr>
                                <tfoot>
                                    <tr>
                                    <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>รวม</td><td><?php echo $result["total"];?></b></td>
                                    </tr>
                               </tfoot>
                        </table>
						<b>เลขที่ใบเสร็จ  <?php echo$result["UserID"];?></b>
                        <p align = "left"><font size = "2"> หมายเหตุ </font></p>
                        <p align = "left"><font size = "2">กรุณาเก็บใบเสร็จเพื่อยืนยันการรับอาหารที่ร้าน(กรณีสั่งอาหารกลับบ้าน)</font></p>
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
