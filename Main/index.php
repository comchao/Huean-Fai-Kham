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
		<link rel="stylesheet" href="../secure/assets/css/main.css" />
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
				include '../Main/menubar.php'; 
			?>

			<!-- Banner -->
				<!-- <div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="7u 12u(medium)">
								<h2>Hi. This is Verti.</h2>
								<p>It's a free responsive site template by HTML5 UP</p>
							</div>
							<div class="5u 12u(medium)">
								<ul>
									<li><a href="#" class="button big icon fa-arrow-circle-right">Ok let's go</a></li>
									<li><a href="#" class="button alt big icon fa-question-circle">More info</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>-->
			

			<!-- สไลค์รุป -->
						<div class="slideshow-container">
							<div class="mySlides fade">
							  <div class="numbertext">เฮือนฝ้ายคำ 1</div>
							  <img src="../Main/img/faikham.jpg" style="width:100%">
							  <div class="text">ที่มา : https://pantip.com/topic/33652066 </div>
							</div>

							<div class="mySlides fade">
							  <div class="numbertext">เฮือนฝ้ายคำ 2</div>
							  <img src="../Main/img/faikham1.jpg" style="width:100%">
							  <div class="text">ที่มา : https://pantip.com/topic/33652066 </div>
							</div>

							<div class="mySlides fade">
							  <div class="numbertext">เฮือนฝ้ายคำ 3</div>
							  <img src="../Main/img/faikham2.jpg" style="width:100%">
							  <div class="text">ที่มา : https://pantip.com/topic/33652066 </div>
							</div>

							<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
							<a class="next" onclick="plusSlides(1)">&#10095;</a>

							</div>
							<br>

							<div style="text-align:center">
							  <span class="dot" onclick="currentSlide(1)"></span> 
							  <span class="dot" onclick="currentSlide(2)"></span> 
							  <span class="dot" onclick="currentSlide(3)"></span> 
							</div>
	<script>
		<?php 
			include '../Main/assets/js/slide.js'; 
		?>
		</script>

			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						<div class="row">
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="#" class="image featured"><img src="img/อ่อมไก่บ้าน.jpg" alt="" /></a>
										<div class="inner">
											<header>
												<h2>อ่อมไก่บ้าน</h2>
											</header>
											<p>แกงอ่อม อาหารพื้นบ้านของ ชาวอีสานและชาวเหนือ ความแตกต่างระหว่างแกงอ่อมอีสานและเหนือ รู้สึกว่า แกงอ่อมอีสานจะใส่เนื้อสัดว์และผักเยอะ พร้อมกับปรุงรสด้วยปลาร้า ส่วนแกงอ่อมเหนือเน้นที่พวกเนื้อสัตว์ไปต้มกับพริกแกงที่ใส่กะปิ ใส่ผักสำหรับปรุงกลิ่นเท่านั้น</p>
										</div>
									</section>
							</div>
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="#" class="image featured"><img src="img/ต้มยำรวมทะเล.jpg" alt="" /></a>
										<div class="inner">
											<header>
												<h2>ต้มยำรวม</h2>
											</header>
											<p>ทำต้มยำกินเองที่บ้านง่ายๆ วัตถุดิบที่หาได้ในครัวตอนนั้น เอามาใส่ลงไป เครื่องต้มยำก็เลือกใช้เป็นซุปต้มยำก้อนค่ะ แล้วยังได้ความหวานธรรมชาติจากต้นหอมญี่ปุ่นที่เหลืออยู่ในตู้เย็นด้วย เอามาต้มซุปอร่อยกลมกล่อมดีเลยค่ะ</p>
										</div>
									</section>
							</div>
							<div class="4u 12u(medium)">

								<!-- Box -->
									<section class="box feature">
										<a href="#" class="image featured"><img src="img/ผัดฉ่าปลาคัง.jpg" alt="" /></a>
										<div class="inner">
											<header>
												<h2>ผัดฉ่าปลาคัง</h2>
											</header>
											<p>โขลกพริกขี้หนูดอย รากผักชี ตะไคร้ พริกไทยเม็ดให้แหลกแล้วใส่ลงผัดกับน้ำมันจนหอม ใส่น้ำปลา น้ำตาลปึก ซอสหอยนางรม ลงผัดให้เข้ากันจึงลวกเนื้อปลาให้สุกใส่ลงผัดด้วย ใส่ใบมะกรูด พริกไทยสด กระชาย มะเขือพวง ลงผัดให้หอมแล้วตักใส่จานเสิร์ฟร้อนๆ</p>
										</div>
									</section>

							</div>
						</div>
					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row 200%">
							<div class="4u 12u(medium)">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="widget thumbnails">
											<h3>Interesting stuff</h3>
											<div class="grid">
												<div class="row 50%">
													<div class="6u"><a href="#" class="image fit"><img src="images/pic04.jpg" alt="" /></a></div>
													<div class="6u"><a href="#" class="image fit"><img src="images/pic05.jpg" alt="" /></a></div>
													<div class="6u"><a href="#" class="image fit"><img src="images/pic06.jpg" alt="" /></a></div>
													<div class="6u"><a href="#" class="image fit"><img src="images/pic07.jpg" alt="" /></a></div>
												</div>
											</div>
											<a href="#" class="button icon fa-file-text-o">More</a>
										</section>
									</div>

							</div>
							<div class="8u 12u(medium) important(medium)">

								<!-- Content -->
									<div id="content">
										<section class="last">
											<h2>So what's this all about?</h2>
											<p>This is <strong>Verti</strong>, a free and fully responsive HTML5 site template by <a href="http://html5up.net">HTML5 UP</a>.
											Verti is released under the <a href="http://html5up.net/license">Creative Commons Attribution license</a>, so feel free to use it for any personal or commercial project you might have going on (just don't forget to credit us for the design!)</p>
											<p>Phasellus quam turpis, feugiat sit amet ornare in, hendrerit in lectus. Praesent semper bibendum ipsum, et tristique augue fringilla eu. Vivamus id risus vel dolor auctor euismod quis eget mi. Etiam eu ante risus. Aliquam erat volutpat. Aliquam luctus mattis lectus sit amet phasellus quam turpis.</p>
											<a href="#" class="button icon fa-arrow-circle-right">Continue Reading</a>
										</section>
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