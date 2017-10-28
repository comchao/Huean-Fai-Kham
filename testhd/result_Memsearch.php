<?php
include '../connects.php';
$cate_id = $_POST['category'];

if($cate_id == "menu")
{	
	echo "<script type='text/javascript'>alert('กรุณาเลือกเมนูอาหาร');</script>"; ?>
	<a href="../showcategory/Memshowdatafood.php">สั่งอาหาร</a>
	<?php
}


$sql = "SELECT * from product where category_id = $cate_id ";
$cols = 4; $i=0 ;
$c = $cols;

	if(!$result = mysqli_query($conn,$sql)){
		die('กรุณาเลือกเมนูอาหาร');
	}
	if(mysqli_num_rows($result)==0){
		echo "<script type='text/javascript'>alert('ไม่มีข้อมูลอาหารในหมวดหมู่นี้ กรุณาเลือกหมวดหมู่อื่น');</script>";  
		?>
	<a href="../testhd/Memshowdatafood.php">กลับไปยังหน้าสั่งอาหาร</a>
	<?php
	}else{
?>

<?php
   session_start();

   include '../connectdb.php';

   $sql = "SELECT * FROM product INNER JOIN category ON product.pid=category.category_id ";
   $res_data = mysqli_query($dbcon,$sql);
?>

<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>สั่งอาหาร(กลับบ้าน)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../testhd/css/bootstraps.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
    font-size: 14px;
    cursor: pointer;
}
.info {background-color: #2196F3;} /* Blue */
.info:hover {background: #0b7dda;}

.warning {background-color: #ff9800;} /* Orange */
.warning:hover {background: #e68a00;}
</style>
	</head>
	<?php 
				include '../testhd/hder.php';   
			?>

	<body class="homepage">
		<div class="container text-center">
			<div class="col-sm-13">
			    <div class="well" >
					<div id="page-wrapper">
      				<!-- ค้นหาอาหารตามหมวดหมู่ -->
      				<h3>ค้นหาอาหารตามหมวดหมู่</h3>
						<form class="uk-form" action="result_Memsearch.php" method="post">
							<select name="category">
								<option value="menu" > -- ดูอาหารตามหมวดหมู่ -- </option>
								    <?php
								        $sql_category = "SELECT * FROM category ";
								        $res_category = mysqli_query($dbcon,$sql_category);
								        while ($row_category = mysqli_fetch_assoc($res_category)) 
								        {
								            echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
								        }
								    ?>
								<br><br>
							<input type="submit" class="btns info" value="ค้นหา">
						</form>
					</div>
 				</div>
 			</div>	
    
			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row 100%">
							<div class="8u 12u$(medium)">
								<div id="content">

									<!-- Content -->
										<tr>
											<?php
													while($data = mysqli_fetch_array($result,MYSQLI_BOTH)){
													$c --;
													$i++ ;
													if($i<=1000){
											?>

			  								<form action="../testhd/order.php" method="post">
			  									<div class="col-sm-4">
			  										<div class="well" >
												<?php echo '<img src="../product/img/'.$data["img"].'" width="200 height="200"' ?><br><br>
												<?php echo $data["name"] ?> <br>
												<?php echo "รายละเอียดอาหาร : ".$data["detail"] ?> <br>
												<?php echo "ราคา " .$data["price"]." บาท" ?> <br>
				                                   
				                                   <!-- แสดงค่าจำนวนจานอาหาร 1- 5 จาน-->
				                                    <select name="txtQty" >                                
														<?php for($qty=1;$qty<=5;$qty++)
														  {
														?>
															<option value="<?php echo $qty;?>"><?php echo $qty;?></option>
														<?php
														  }
														?>
													</select>

			                                 	  <!-- <button class="btn warning">หยิบใส่ตะกร้า</button><br><br> -->
								                  <input type="image" class="btn warning" name="submit" value="submit" alt="หยิบใส่ตะกร้าสินค้า" /> 
								                  </div>
												</div>
								                  <input type="hidden" name="txtProductID" value="<?php echo $data["pid"]?> " />
												
								  			</form>
			  							 
											<?php
												}  
												if($c == 0) 
												{
													$c = $cols;
											?>

											<?php } } }?>
								</div>
							</div>
						


<!-- Sidebar -->
									

											<!--<p>xxxxx</p>
											<footer>
												<a href="#" class="button icon fa-info-circle">Find out more</a>
											</footer>
										</section>

										<section>
											<h3>Subheading</h3>
											<ul class="style2">
												<li><a href="#">Amet turpis, feugiat et sit amet</a></li>
												<li><a href="#">Ornare in hendrerit in lectus</a></li>
												<li><a href="#">Semper mod quis eget mi dolore</a></li>
												<li><a href="#">Quam turpis feugiat sit dolor</a></li>
												<li><a href="#">Amet ornare in hendrerit in lectus</a></li>
												<li><a href="#">Semper mod quisturpis nisi</a></li>
											</ul>-->

						</div>
					</div>
				</div>
			</div>

<!--<div class="w3-center">		
<div class="w3-bar">
  <a href="#" class="w3-button w3-hover-purple">&laquo;</a>
  <a href="#" class="w3-button w3-hover-green">1</a>
  <a href="#" class="w3-button w3-hover-red">2</a>
  <a href="#" class="w3-button w3-hover-blue">3</a>
  <a href="#" class="w3-button w3-hover-black">4</a>
  <a href="#" class="w3-button w3-hover-orange">&raquo;</a>
</div>
</div>-->
		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>