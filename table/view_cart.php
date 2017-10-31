<?php
include '../session.php';
if(!isset($_SESSION))
{
    session_start();

}

$id_user  = $_GET['login_id'];
$id_report  = $_GET['id_report'];
$type  = $_GET['type'];
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


<div class="cart-view-table-back">

    <form class="uk-form" action="booking_order_print.php?login_id=<?php echo $id_user?>" method="post">

<?php if ($type == '2'){ ?>
    <center>  <h3> วันเวลาที่ต้องการจัดส่ง </h3>
 <input id="name" type="datetime-local" class="form-control" name="set_date_time" value="" required ></center>
<?php } ?>

    <?php if ($type == '1'){ ?>

            <input id="name" type="hidden" class="form-control" name="set_date_time" value="-" required ></center>
    <?php } ?>

<table width="100%"  cellpadding="6" cellspacing="0">

    <thead><tr><th>ลำดับ</th><th>ชื่ออาหาร</th><th>จำนวนออเดอร์</th><th>ราคา</th><th>รวม</th></tr></thead>
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

            <input id="login_id" type="hidden" class="form-control" name="login_ids" value="<?php echo $id_user?>">
            <input id="id_report" type="hidden" class="form-control" name="id_reports" value="<?php echo $id_report?>">
     <input id="total" type="hidden" class="form-control" name="types" value="<?php echo $type ?>">

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
    <tr><td colspan="5"><a href="index.php?id_report=<?php echo $id_report?>&type=<?php echo $type?>" class="button">เพิ่ม</a>
        <button type="submit">ยืนยันการสั่งอาหาร</button> </td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

 <br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="uk-form" action="memshowdatafood.php" method="post">

                <center><button type="submit" class="btn btn-group" style="width: 130px ">
                         ยกเลิก
                    </button></center>
            </form>
        </div>
    </div>
</div>

</body>
</html>
