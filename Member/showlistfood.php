<?php
  include '../session.php'; 
  include '../connectdb.php';


  $sql = "SELECT * FROM orders ORDER BY order_id ";
  $res_order = mysqli_query($dbcon,$sql);
  
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>ข่าวประชาสัมพันธ์</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<meta http-equiv="Content-Language" content="th"> 
<meta http-equiv="content-Type" content="text/html; charset=window-874"> 
<meta http-equiv="content-Type" content="text/html; charset=tis-620"> 

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../indexMain/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/zerogrid.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/responsive.css" type="text/css" media="all"> 
<link rel="stylesheet" href="../indexMain/css/responsiveslides.css" /> 
<script type="text/javascript" src="../indexMain/js/jquery-1.6.js" ></script>
<script type="text/javascript" src="../indexMain/js/cufon-yui.js"></script>
<script type="text/javascript" src="../indexMain/js/cufon-replace.js"></script>  
<script type="text/javascript" src="../indexMain/js/Forum_400.font.js"></script>
<script type="text/javascript" src="../indexMain/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../indexMain/js/tms-0.3.js"></script>
<script type="text/javascript" src="../indexMain/js/tms_presets.js"></script>
<script type="text/javascript" src="../indexMain/js/script.js"></script>
<script type="text/javascript" src="../indexMain/js/atooltip.jquery.js"></script> 
<script type="text/javascript" src="../indexMain/js/css3-mediaqueries.js"></script>
<script src="../indexMain/js/responsiveslides.js"></script>
<script>
	$(function () {
	  $("#slidez").responsiveSlides({
		auto: true,
		pager: false,
		nav: true,
		speed: 500,
		maxwidth: 960,
		namespace: "centered-btns"
	  });
	});
</script>
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
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.slider_bg {behavior:url(js/PIE.htc)}
	</style>
<![endif]-->
<!--[if lt IE 7]>
	<div style='clear:both;text-align:center;position:relative'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
	</div>
<![endif]-->
</head>
<body id="page1">
<?php include '../indexMain/css/popup.css' ?>
<div class="#">
	<div class="#">
		<div class="body5">
			<div class="main zerogrid">
<!-- header -->
				<header>
					<?php include "../secure/tapmember.php" ?>
				</header>

<!-- / header -->

<!-- Content -->
								<section>
										<h2>รายการหาอาหารที่ลูกค้าสั่ง</h2>
									<br>
								      <!--เพิ่มข่าว-->
								      <table>
								          <tr>
								          <th>ชื่ออาหาร</th>
								          <th>รหัสลูกค้า</th>
								          <th>ชื่อ</th>
								          <th>วันที่สั่ง</th>
								          <!--<th>password</th>-->
								          <th>เวลาที่สั่ง</th>
								          <th>ราคา</th>
								          
								          <th>ลบ</th>
								        </tr>
								          <?php
								              while ($row_order = mysqli_fetch_array($res_order)) {
								           ?>
								        <tr>
								          <td><?php echo $row_order['order_menu']; ?></td>
								          <td><?php echo $row_order['login_id']; ?></td>
								          <td><?php echo $row_order['name']; ?></td>
								          <td><?php echo $row_order['tb_date']; ?></td>
								          <td><?php echo $row_order['tb_time']; ?></td>
								          <td><?php echo $row_order['price']; ?></td>
								          
								           <!-- ลบ โดยเรียกไปยังฟอร์ม dalete  -->
								           <td><a href="../Member/delete_member.php?id=<?= $row_member['login_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');" >ลบ</a></td>
								        </tr>
								          <?php } ?>
								      </table>
								</section>
						</div>
					</div>
