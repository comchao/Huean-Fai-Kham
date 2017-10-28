<?php
  include '../session.php'; 
  include '../connectdb.php';

  $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id ORDER BY news_id DESC";
  $res_news = mysqli_query($dbcon,$sql);

  $sql1 = "SELECT * FROM tblogin WHERE login_status = '0'";
  $row_member = mysqli_query($dbcon,$sql1);
  $result_member = mysqli_query($dbcon, $sql1);
  $num = mysqli_num_rows($result_member);
  
?>

<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>เฮือนฝ้ายคำ - พนักงาน</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
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
        <!-- แต่ง button เพิ่มข่าว -->
        <style>
			.btn {
			    border: none;
			    color: white;
			    padding: 2px 16px;
			    font-size: 16px;
			    cursor: pointer;
			}
			.success {background-color: #ffffff;} /* Green */
			.success:hover {background-color: #ffef26;}
		</style>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
		                       <header id="header">
		                          <a href="../Employee/Employee_Manage.php" class="logo"><strong>ร้านอาหาร :</strong> เฮือนฝ้ายคำ.
		                          </a>
		                          <ul class="icons">
		                            <li><a href="https://www.wongnai.com/restaurants/50236dn-เฮือนฝ้ายคำ" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
		                            <li><a href="https://www.facebook.com/sharer.php?u=https://www.wongnai.com/restaurants/50236dn-%E0%B9%80%E0%B8%AE%E0%B8%B7%E0%B8%AD%E0%B8%99%E0%B8%9D%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%B3" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
		                          </ul> 
		                      </header>

								<!-- Content -->
								<section>
									<header class="main">
										<h2>จัดการข่าวประชาสัมพันธ์</h2>
									</header>

									<br>
								      <!--เพิ่มข่าว-->
								      <table>
								        <input class="btn success" type="button" name="button" id="button" value="เพิ่มข่าวประชาสัมพันธ์"  onclick="window.location='../employ/frm_news.php'"  />
								        <br><br>
								          <tr>
								            <th>รหัสข่าว</th>
								            <th>หัวข้อข่าว</th>
								            <th>วันที่ประกาศ</th>
								            <th>ไฟล์แนบ</th>
								            <th>ประเภทข่าว</th>
								            <th>แก้ไข</th>
								            <th>ลบ</th>
								          </tr>
								              <?php
								                  while ($row_news = mysqli_fetch_assoc($res_news)) {
								              ?>
								          <tr>
								            <td><?php echo $row_news['news_id']; ?></td>
								            <td><?php echo $row_news['news_topic']; ?></td>
								            <td><?php echo $row_news['news_date']; ?></td>
								            <td>

								              <div class="responsive">
								                <div class="gallery">
								                  <a target="_blank" href=" <?php echo $row_news['news_filename']; ?> ">
								                    
								                    <!--<a data-lightbox="<?php echo $row_news['news_filename']; ?>"
								                       data-title="<?php echo $row_news['news_filename']; ?>" -->

								                       <a href="../news_image/<?php echo $row_news['news_filename']; ?> "
								                       target="_blank"><?php echo $row_news['news_filename']; ?></a>

								                    </a>
								                  </a>
								                </div>
								              </div>
								            </td>

								            <td><?php echo $row_news['newstype_detail']; ?></td>
								            <td><a href="../News/frm_update_news.php?id=<?= $row_news['news_id']; ?>">แก้ไข</a></td>

								            <!-- ลบข้อมูลข่าว โดยเรียกไปยังฟอร์ม dalete โฟลเดอร์ News -->
								           <td><a href="../News/delete_news.php?id=<?= $row_news['news_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');" >ลบ</a></td>
	 									 </tr>
								            <?php } ?>
								      </table>
							</section>
						</div>
					</div>

				
 
  <!-- Sidebar -->
          <div id="sidebar">
            <div class="inner">

        <!-- Menu -->
                <nav id="menu">
                  <header class="major">

                    <?php include"../employ/tap.php" ?>
            </div>
          </div>
      </div>

    <!-- Scripts -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/skel.min.js"></script>
      <script src="../js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="../js/main.js"></script>

  </body>
</html>