<?php
  include'../session.php';
  include'../connectdb.php';
  
  $sql = "SELECT * FROM tblogin ORDER BY login_id DESC";
  $res_news = mysqli_query($dbcon,$sql);
?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>เฮือนฝ้ายคำ</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../testhd/css/bootstraps.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		<!-- สไลค์รุป -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		<?php 
			include '../Main/assets/css/slide.css'; 
		?>
		</style>

	

	</head>
	
	<body class="homepage">
		<div id="page-wrapper">

			<?php 
				include '../testhd/hder.php'; 
			?>

<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div id="content">

							<h3>ลงชื่อเข้าใช้</h3>
							<form action="../secure/login.php" method="post">
								<div>
									<input type="text" placeholder="Username" id="username" name="username" required autofocus />
								</div><br>
								
								<div>
									<input type="password" placeholder="Password" id="password" name="password" required autofocus />
								</div><br>
								
								<div>
									<input type="submit" value="เข้าสู่ระบบ" /><br>
									<a href="frm_Register.php">สมัครสมาชิก</a>
								</div>
							</form><!-- form -->

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