<?php
include("../connects.php");

$sql = "SELECT * from product Order by category_id";
$cols = 4; $i=0 ;
$c = $cols;

	if(!$result = mysqli_query($conn,$sql)){
		die('Error: '.mysqli_error($conn));
	}
	if(mysqli_num_rows($result)==0){
		echo "ไม่มีข้อมูลอาหาร";
	}else{
?>

<?php
   session_start();

   include '../connectdb.php';

   $sql = "SELECT * FROM product As P INNER JOIN category as c on p.category_id = c.category_id Order by category_id";
   /*$sql = "SELECT * FROM product INNER JOIN category ON product.pid=category.category_id "; */
   $res_data = mysqli_query($dbcon,$sql);
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Huean Fai Kham | Restaurant </title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   
	<!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	 <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="../css/zerogrid.css">
	<link rel="stylesheet" href="../css/stylefood.css">
	<link rel="stylesheet" href="../css/slide.css">
	<link rel="stylesheet" href="../css/menu.css">
	

</head>
<body>
	<style>
input[type=text], select 
{
    width: 20%;
    padding: 8px 10px;
    margin: 15px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
</style>

<!-- button -->
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button2 {background-color: #008CBA;} /* Blue */
</style>

<div class="wrap-body">
	<!--///////////////////////////////////////Top-->
	<div class="top">
		<div class="zerogrid">
			<ul class="top-social f-left">
				<li ><a href="../Member/index.php"><img src="../img/home.png"></a></li>
			</ul>
			<ul class="number f-left">
				<li class="phone"><p>042 822109 | 081 8082826 | 081 6185964</p></li>
			</ul>
		</div>
	</div>
	<!--////////////////////////////////////Header-->
	
	<div class="site-title">
		<div class="zerogrid">
			<div class="row">
				<h2 class="t-center">รายการอาหารทั้งหมด</h2>
			</div>
		</div>
	</div>

    <!--//////////////////////////////////////Menu-->
    <a href="#" class="nav-toggle">เมนูอาหารร้านเฮือนฝ้ายคำ</a>
    
		<!-----------------content-box-2-------------------->
		<section class="content-box box-2">
			<div class="zerogrid">
				<div class="row wrap-box"><!--Start Box-->
					<div class="header">
						<div class="center" align="center" >

							<!-- ค้นหาอาหารตามหมวดหมู่ -->
					            	
					                  <select name="category">
					                      <option value=""> -- ดูอาหารตามหมวดหมู่ -- </option>
					                          <?php
					                             $sql_category = "SELECT * FROM category ";
					                             $res_category = mysqli_query($dbcon,$sql_category);
					                             while ($row_category = mysqli_fetch_assoc($res_category)) 
					                              {
					                                  echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
					                              }
					                          ?>
					                  </select>
					              </from> 


					        <input type="submit" class="button button2" value="ค้นหา">
					        <hr><br>

							<table width="100%"  align="center" >
							<tr>
								<?php
										while($data = mysqli_fetch_array($result,MYSQLI_BOTH)){
										$c --;
										$i++ ;
										if($i<=9){
								?>
  								<form action="../order/order.php" method="post">
								<td align="center" height="100" width="100 ">
									<?php echo '<img src="../product/'.$data["img"].'" width="200 height="200"'.
									"<br>"."<br>".$data["name"]."<br>"
									."ราคา ".$data["price"]." บาท"."<br>" ?>
                                    
                                    <select name="txtQty" >                                    
		<?php for($qty=1;$qty<=20;$qty++)
	  {
	  ?>
		<option value="<?php echo $qty;?>"><?php echo $qty;?></option>
		<?php
	  }
	  ?>
	</select> </br>
                                 
                  <input type="image" name="submit" value="submit" src="buyy.png " alt="" width="80" height="40" alt="หยิบใส่ตะกร้าสินค้า" />
                  <input type="hidden" name="txtProductID" value="<?php echo $data["pid"]?> " />
               

								</td>
  							</form>
								<?php
									}  
									if($c == 0) 
									{
										$c = $cols;
								?>

							</tr>
								<?php } } }?>
							</table>
                          

				    </div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>