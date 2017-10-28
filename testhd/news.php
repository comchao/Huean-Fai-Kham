<?php
    include '../session.php'; 
    include '../connectdb.php';

    $sql = "SELECT * FROM tbnews where newstype_id='004'";
    $res_news = mysqli_query($dbcon,$sql);

 ?>

 <?php
    include '../session.php'; 
    include '../connectdb.php';

    $sql1 = "SELECT * FROM tbnews where newstype_id='003' ";
    $res_news1 = mysqli_query($dbcon,$sql1);

 ?>
<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>ข่าวประชาสัมพันธ์</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../Main/assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="../testhd/css/bootstraps.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

	</head>
			<?php 
				include '../testhd/hder.php';   
			?>
	<body class="homepage">
		<div id="page-wrapper">
<center><h1>ข่าวประชาสัมพันธ์</h1></center>
			

			<!-- Main -->
			<!-- แยกส่วน ฝั่งข่าวประชาสัมพันธ์ทางซ้ายมือ เมนูยอดนิยม -->
				<div id="main-wrapper">
					<div class="container text-center">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<div id="sidebar">

										<div class="col-sm-22">
				  							<div class="well" >
												<h3>--* เมนูยอดนิยม *--</h3>
												<!-- Sidebar -->
														<?php
											                while ($row_news1 = mysqli_fetch_assoc($res_news1)) {
											            ?>
													<section>
														
														<ul class="style2">
															
															<h4>เรื่อง : <?php echo $row_news1['news_topic']; ?></h4>
														<p>
								                            <img class="uk-thumbnail uk-thumbnail-large uk-align-center" src="../news_image/<?php echo $row_news1['news_filename']; ?>" width="250"  alt="">
								                        </p>
								                        <p> <?php echo $row_news1['news_detail']; ?> </p>

															
														</ul>
													</section>
			 						                 <?php } ?>
											</div>
										</div>
									</div>
								</div>


							<!-- แยกส่วน ฝั่งข่าวประชาสัมพันธ์ทางขวามือ สาระน่ารู้เรื่องอาหาร -->
							<div class="6u 12u$(medium) important(medium)">
								<div id="content">

										<div class="col-sm-22">
				  							<div class="well" >
									<!-- Content -->
										<article>
											<h3> --* สาระน่ารู้เรื่องอาหาร *--</h3>
											 <?php
						                            while ($row_news = mysqli_fetch_assoc($res_news)) {
						                     ?>
						                   

											<h4>เรื่อง : <?php echo $row_news['news_topic']; ?></h4>
											

											<p>
					                            <img class="uk-thumbnail uk-thumbnail-large uk-align-center" src="../news_image/<?php echo $row_news['news_filename']; ?>" width="250"  alt="">
					                        </p>
					                        <p> <?php echo $row_news['news_detail']; ?> </p>

					                      <?php } ?>
					                      <br></p>

										</article>
								</div>
							</div>
						</div>
					</div>
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