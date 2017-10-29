<?php
if(!isset($_SESSION))
{
    session_start();

}

$id_user  = $_POST['login_id'];
$id_report  = $_GET['id_report'];
include_once("config.php");
require '../connectdb.php';
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>
<h1 align="center">รายการสั่งอาหาร</h1>


<?php //echo $id_user; ?>
<div class="cart-view-table-back">
    <form class="uk-form" action="booking_order_print.php" method="post">
<!--    <form class="uk-form" action="booking_order_print.php" method="post">-->
<!--        -->
<!--      -->

<!--    --><?php
//    $sql = "SELECT * FROM booktb  INNER JOIN tblogin ON booktb.login_id = booktb.login_id
//                                  INNER JOIN tbtable ON booktb.id_table = tbtable.tb_id
//                                  INNER JOIN tbzonetable ON booktb.zone_id = tbzonetable.zone_id
//                                  INNER JOIN booktb ON report.id_report = booktb.id_report
//                                  GROUP BY booktb.zone_id
//                                  ";
//    $res = mysqli_query($dbcon,$sql);
//    while ($row = mysqli_fetch_assoc($res)) {
//        if ($id_user == $row['login_id']&$row['id_status']!='0') { ?>
<!---->
<!--      <center>-->
<!---->
<!--          คุณ: --><?php //echo $row['login_firstname']; ?><!--  --><?php //echo $row['login_lastname']; ?><!-- <br>-->
<!--          ที่อยู่: --><?php //echo $row['login_address']; ?><!-- <br>-->
<!--          อีเมล์: --><?php //echo $row['login_email']; ?>
<!--          --><?php //echo $row['login_phone']; ?><!--<br>-->
<!--          วันที่จอง: --><?php //echo $row['tb_date']; ?>
<!--          เวลา: --><?php //echo $row['tb_time']; ?>
<!--          เวลาที่จอง: --><?php //echo $row['update_time']; ?><!--<br>-->
<!--          โต๊ะ: --><?php //echo $row['tb_numchair']; ?><!--    โซน: --><?php //echo $row['zone_name']; ?><!--<br>-->
<!---->
<!--          <input id="tb_date" type="hidden" class="form-control" name="tb_date[]" value="--><?php //echo $row['tb_date'];?><!--">-->
<!--          <input id="tb_time" type="hidden" class="form-control" name="tb_time[]" value="--><?php //echo $row['tb_time']; ?><!--">-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--      </center>-->
<!---->
<!---->
<!---->
<!---->
<!--        --><?php // }
//    }
//
//    ?>




<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>ลำดับ</th><th>ชื่ออาหาร</th><th>จำนวนออเดอร์</th><th>ราคา</th><th>รวม</th></tr></thead>
  <tbody>

 	<?php

	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table
        $i = 1;
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {

			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
            $product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"]; ?>

            <input id="product_code" type="hidden" class="form-control" name="product_code[]" value="<?php echo $product_code ?>">
            <input id="product_qty" type="hidden" class="form-control" name="product_qty[]" value="<?php echo  $product_qty = $cart_itm["product_qty"];?>">

    <input id="login_id" type="hidden" class="form-control" name="login_id[]" value="<?php echo $id_user?>">
    <input id="id_report" type="hidden" class="form-control" name="id_report[]" value="<?php echo $id_report?>">
            <?php

			$subtotal = ($product_price * $product_qty); //calculate Price x Qty ?>

            <input id="total" type="hidden" class="form-control" name="total[]" value="<?php echo $subtotal ?>"


            <?php

		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe
		    echo '<tr class="'.$bg_color.'">';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$product_name.'</td>';
			echo '<td>'.$product_qty.'

</td>';

			echo '<td>'.$product_price.'</td>';
			echo '<td>'.$subtotal.'</td>';
            echo '</tr>'; ?>

			<?php $total = ($total + $subtotal); //add subtotal to total var
            $i++;?>

       <?php }


		
		$grand_total = $total + $shipping_cost; //grand total including shipping cost




	}
    ?>
    <br><br>
    <tr><td colspan="5"><span style="float:right;text-align: right;">
                <br><br><br><br>
                ยอดรวมทั้งหมด : <?php echo sprintf("%01.2f", $total);?></span></td></tr>
    <tr><td colspan="5"><a href="index.php?id_report=<?php echo $id_report ?>" class="button">เพิ่ม</a>
        <button type="submit">ยืนยันการสั่งอาหาร</button> </td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

</body>
</html>
