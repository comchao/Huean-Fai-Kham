<?php
    if(!isset($_SESSION))
    {
        session_start();
        $id_user   = $_SESSION['login_id'];
    }
    $id_report   = $_GET['id_report'];
    $type  = $_GET['type'];

include_once("config.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
require '../connectdb.php';


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<h1 align="center">ทำรายการเลือกอาหาร </h1>

<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>ตะกร้าออเดอร์อาหาร</h3>';
	echo '<form method="post" action="cart_update.php">'
    ;

	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	?>
<!--    --><?php //echo $id_user; ?>

<?php



	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
        $product_code = $cart_itm["product_code"];
//		$product_color = $cart_itm["product_color"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td> <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$product_name.'</td>';
        echo '<td>'.$product_price.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '

<button type="submit">ลบรายการ</button>

';
    echo '</form>';
    echo '

 <form method="post" action="view_cart.php?login_id='.$id_user.'&id_report='.$id_report.'&type='.$type.'">
    <input type="hidden" name="login_id" value="'.$id_user.'" />
     <input type="hidden" name="id_report" value="'.$id_report.'" />  
        <input type="hidden" name="type" value="'.$type.'" />  

    <button type="submit">สั่งอาหาร</button>
    </form>

';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';

	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';


	echo '</div>';




}
?>







<!-- View Cart Box End -->


<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT * FROM product ORDER BY pid ASC");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->name}</h3>
	<div class="product-thumb"><img src="../product/img/{$obj->img}"  alt="Skaret View" style="width:150px;"></div>
	<div class="product-desc">{$obj->detail}</div>
	<div class="product-info">
	ราคา {$obj->price} 
	
	<fieldset>
	
	
	
	<label>
		<span>จำนวน</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->pid}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">เลือก</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
<!-- Products List End -->
</body>
</html>
