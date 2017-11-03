

<?php
if(!isset($_SESSION))
{
    session_start();
    $id_user   = $_SESSION['login_id'];
}
//หมายเลขโต๊ะ
$id_table = $_GET['id_table'];
//วันที่
$tb_date = $_GET['tb_date'];
//เวลา
$tb_time = $_GET['tb_time'];
//โซนโต๊ะ
$zone_id = $_GET['zone_id'];
// id เผู้ใช้งาน
$login_id = $_GET['login_id'];
//รหัสรายงาน
$id_report = $_GET['id_report'];
//ประเภทการสั่งอาการ
$type = $_GET['type'];
include_once("config.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
require '../connectdb.php';


ini_set('display_errors', 1);
error_reporting(~0);

$category_id = "";

if(isset($_POST["category_id"]))
{
    $category_id = $_POST["category_id"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>สั่งอาหาร</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="style/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="../testhd/css/bootstraps.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>
</head>
<body>



                       <!--ค้นหาอาหารตามหมวดหมู่-->
<center>
    <h3>ค้นหาอาหารตามหมวดหมู่</h3>
    <form class="uk-form" action="index.php?login_id=<?php echo$login_id?>&id_report=<?php echo $id_report?>&type=<?php echo $type?>&zone_id=<?php echo $zone_id?>&id_table=<?php echo $id_table?>&tb_date=<?php echo $tb_date?>&tb_time=<?php echo $tb_time?>" method="post">
        <select name="category_id" class="form-control" style="width: 200px;">
            <option value="menu" > -- ดูอาหารตามหมวดหมู่ -- </option>
            <?php
            $sql_category = "SELECT * FROM category ";
            $res_category = mysqli_query($dbcon,$sql_category);
            while ($row_category = mysqli_fetch_assoc($res_category))
            {
                echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
            }
            ?>
        </select>
        <br>
        <input type="submit" class="btn btn-group" value="ค้นหา">
    </form>
</center>


                       <!--สิ้นสุดค้นหาอาหารตามหมวดหมู่-->




                       <!-- ตะกร้าอาหารที่เลือก จะโชว์เมื่อเลือก -->
<h1 align="center"> </h1>
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>ตะกร้าออเดอร์อาหาร</h3>';
    echo '<form method="post" action="cart_update.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';
    $total =0;
    $b = 0;
    foreach ($_SESSION["cart_products"] as $cart_itm)
    {
        $product_name = $cart_itm["product_name"];
        $product_qty = $cart_itm["product_qty"];
        $product_price = $cart_itm["product_price"];
        $product_code = $cart_itm["product_code"];
//        $product_color = $cart_itm["product_color"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        echo '<td>จำนวน '.$product_qty.'<input type="hidden" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
        echo '<td><h6>'.$product_name.'</h6></td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> ลบ</td>';
        echo '</tr>';
        $subtotal = ($product_price * $product_qty);
        $total = ($total + $subtotal);
    }
    echo '<td colspan="4">';
    echo '
<button type="submit" onclick="return confirm(\'คุณต้องการลบข้อมูลหรือไม่ ?\');" >ลบรายการ</button>
';
    echo '</form>';
    echo '
 <form method="post" action="view_cart.php?login_id='.$login_id.'&id_report='.$id_report.'&type='.$type.'&zone_id='.$zone_id.'&id_table='.$id_table.'&tb_date='.$tb_date.'&tb_time='.$tb_time.'");
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

<?php

if ($category_id == null ){
$results = $mysqli->query("SELECT * FROM product 
                        JOIN category ON category.category_id = product.category_id
                        
                        WHERE category.category_id  = $category_id
                    
                        
                        GROUP  BY  product.name");
if($results != ""){
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
		<span>จำนวน :</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
<input type="hidden" name="product_code" value="{$obj->pid}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="btn btn-group" >เลือก</button></div>
	</div></div>
	</form>
	</li>
EOT;
    }
    $products_item .= '</ul>';
    echo $products_item;
} else {
    $results = $mysqli->query("SELECT * FROM product 
                        JOIN category ON category.category_id = product.category_id
                        GROUP  BY  product.name");
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
		<span>จำนวน :</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
<input type="hidden" name="product_code" value="{$obj->pid}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="btn btn-group" >เลือก</button></div>
	</div></div>
	</form>
	</li>
EOT;
        }
        $products_item .= '</ul>';
        echo $products_item;
    }
}

}
if ($category_id != null ){
    $results = $mysqli->query("SELECT * FROM product 
                        JOIN category ON category.category_id = product.category_id
                        
                        WHERE category.category_id  = $category_id
                    
                        
                        GROUP  BY  product.name");
    if($results != ""){
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
		<span>จำนวน :</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
<input type="hidden" name="product_code" value="{$obj->pid}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="btn btn-group" >เลือก</button></div>
	</div></div>
	</form>
	</li>
EOT;
        }
        $products_item .= '</ul>';
        echo $products_item;
    } else {
        $results = $mysqli->query("SELECT * FROM product 
                        JOIN category ON category.category_id = product.category_id
                        GROUP  BY  product.name");
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
		<span>จำนวน :</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
<input type="hidden" name="product_code" value="{$obj->pid}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="btn btn-group" >เลือก</button></div>
	</div></div>
	</form>
	</li>
EOT;
            }
            $products_item .= '</ul>';
            echo $products_item;
        }
    }

}
?>


                       <!-- สิิ้นสุดตะกร้าอาหารที่เลือก จะโชว์เมื่อเลือก -->

<!--ย้อนกลับ-->
<form class="uk-form" action="reservations_in.php" method="post">
    <input id="name" type="hidden" class="form-control" name="login_id" value="<?php echo  $_GET["login_id"]?>"? >
    <input id="name" type="hidden" class="form-control" name="id_report" value="<?php echo $_GET["id_report"]?>"?>

    <center><button type="submit" class="btn btn-group" style="width: 130px ">
            ย้อนกลับ
        </button></center>


</form>
<!--ย้อนกลับ-->

<br><br><br><br><br><br>
</body>
</html>