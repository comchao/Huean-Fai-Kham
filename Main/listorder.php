<?php
  include '../session.php'; 
  include '../connectdb.php';


  /*$sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id ORDER BY news_id DESC";
  */$sql = "SELECT * FROM orders ORDER BY order_id ";
  $res_order = mysqli_query($dbcon,$sql);

?>
<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>รายการอาหารที่สั่ง</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<!-- แต่งสีตาราง-->
        <style>
            table {
              border: collapse;
              width: 100%;
                  }
                  th, td {
              text-align: left;
              padding: 20px;
                         }
                  tr:nth-child(even){background-color: #f2f2f2}
                  th {
              background-color: #4CAF50;
              color: white;
                     }
        </style>

		<div id="page-wrapper">

			<?php 
				include '../Main/menubar.php'; 
			?>


			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div id="content">

							<!-- Content -->
								<article>

									<h2>รายการหาอาหารที่ลูกค้าสั่ง</h2>

									<table>
								          <tr>
								          <th>วันที่สั่ง</th>
								          <th>เวลาที่สั่ง</th>
								          <th>รหัสอาหาร(order)</th>
								          <th>ชื่ออาหาร</th>
								          <th>ชื่อลูกค้า</th>
								          <th>ราคา</th>
								          <!--<th>แก้ไข</th>
								          <th>ลบ</th> -->
								        </tr>
								          <?php
								              while ($row_order = mysqli_fetch_array($res_order)) {
								           ?>
								        <tr>
								          <td><?php echo $row_order['tb_date']; ?></td>
								          <td><?php echo $row_order['tb_time']; ?></td>
								          <td><?php echo $row_order['order_menu']; ?></td>
								          <td><?php echo $row_order1['name']; ?></td>
								          <td><?php echo $row_order['firstname']; ?></td>
								          <td><?php echo $row_order['price']; ?></td>
								          
								          <!--
								          <td><a href="../Member/frm_update_member.php?id=<?= $row_member['login_id']; ?>">แก้ไข</a></td>
								          
								           <!-- ลบข้อมูลข่าว โดยเรียกไปยังฟอร์ม dalete โฟลเดอร์ News -->
								          <!-- <td><a href="../Member/delete_member.php?id=<?= $row_member['login_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');" >ลบ</a></td>
								       -->
								        </tr>
								          <?php } ?>
								      </table>
								      <center>
								      <a href="">ยกเลิกรายการอาหาร</a></center>
								</article>

						</div>
					</div>
				</div>

			
			</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>