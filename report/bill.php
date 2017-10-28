<?php
    require 'connection.php';
	error_reporting(0);
	$Month = $_POST['Month'];
	$p = '%'.$Month.'%';
	
	$sql = "SELECT * FROM room WHERE Month LIKE '$p' and room_c LIKE 'ค้างชำระ' ORDER BY UserID DESC";
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
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
  <nav class="uk-navbar uk-margin-large-bottom">
                  <a class="uk-navbar-brand uk-hidden-small"><FONT COLOR=OrangeRed>ระบบจัดการหอพัก</FONT></a>
                  <ul class="uk-navbar-nav uk-hidden-small">
                      <li  class="uk-active">
                          <a href="index_news.php"><img src="img/b.png" width="17" height="17"> หน้าแรก</a>
                      </li>
                      <li>
                          <a href="index2.php"><img src="img/i.png" width="20" height="20"> การจัดการหอพัก</a>
                      </li>
                      <li>
                          <a href="rules_ad.php"> <img src="img/o.png" width="17" height="17"> กฎระเบียบ</a>
                      </li>
                      <li>
                          <a href="contact_ad.html"> <img src="img/t.png" width="17" height="17"> ติดต่อเรา</a>
                      </li> <li>
                          <a href="admin.php"> <img src="img/u.png" width="20" height="20"> เเก้ไขข้อมูลส่วนตัว</a>
                      </li>

                  </ul>
                  <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
                  <div class="uk-navbar-brand uk-navbar-center uk-visible-small">ระบบการจัดการหอพัก</div>
              </nav>
    
                  
   </head>
      <body>
		 <form action="bill.php"  method="POST" class="uk-panel uk-panel-box uk-form">
		  <center><h1>ใบแจ้งหนี้</h1></center>
		 <label>วัน/เดือน/ปี :</label><input type="Month" name="Month" />
		 <input name="submit" type="submit" id="submit" value="ค้นหา"> 
	  <br>
	  <table class="uk-table uk-table-hover" border="1">
	  <tr>
	                   <th  width="2%" bgcolor="#FFCC33">ห้อง</th>
                       <th  width="8%" bgcolor="#FFCC33">ชื่อ</th>
                       <th  width="4%" bgcolor="#FFCC33">วัน/เดือน/ปี</th>
						<th  width="4%" bgcolor="#FFCC33">รวมค่าไฟ</th>
						<th  width="3.7%" bgcolor="#FFCC33">รวมค่าน้ำ</th>
						<th  width="4%" bgcolor="#FFCC33">ค่าห้อง</th>
						<th  width="5%" bgcolor="#FFCC33">รวมทั้งหมด</th>
						<th  width="5%" bgcolor="#FFCC33" >สถานะ</th>
						<th  width="5%" bgcolor="#FFCC33">ปริ้น</th>
		</tr>	
		<?php
		    while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		?>
		<tr>
               <td bgcolor="#F0FFF0"><?php echo $row["Status"];?></td>
					<td bgcolor="#F0FFF0"><?php echo $row["Name"];?></td>
					<td bgcolor="#F0FFF0"><?php echo $row["Month"];?></td>
					<td bgcolor="#F0FFF0"align="right"><?php echo $row["total_fire"];?></td>
					<td bgcolor="#F0FFF0"align="right"><?php echo $row["total_water"];?></td>
					<td bgcolor="#F0FFF0"align="right"><?php echo $row["Rates"];?></td>
					<td bgcolor="#F0FFF0"align="right"><b><?php echo $row["total"];?><b></td>
					<td bgcolor="#F0FFF0" align="center"><?php echo $row["room_c"];?></td>
					<td align="center"><a href="pbbill.php?UserID=<?php echo $row["UserID"];?>"><img src="img/pri.png" width="37" height="37" border="1"></a></td>
			</tr>   
			<?php
			   }
			   ?>
		</table>
 </form>			   
			 		 
	  </body>
	  </html>
	  