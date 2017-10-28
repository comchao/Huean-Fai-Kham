<?php
if($_REQUEST['btnOK']){
if(empty($_SESSION['cart'])){ //ถ้าเป็นค่าว่าง
	echo "<script>";
	echo "alert('คุณยังไม่ได้เลือกสินค้า');";
	echo "window.location='index.php?page=product';";
    echo "</script>";
	exit;
}

$pro_id = $_REQUEST['pidd'];
$qty 	= "1" ;

$sqlInsert = "INSERT INTO orders VALUES('',NOW(),'','$_SESSION[mem_id]','0','0','')";
mysql_query($sqlInsert) or die (mysql_error());
$id = mysql_insert_id();
$i = 0;

foreach($_SESSION['cart'] as $item){ // foreach with normal array 
$sum = $qty[$i]*$item["pro_price"];
$total += $sum;
$total_ems = $total + 50 ;
$sqlInsert = "INSERT INTO order_detail VALUES('','$id','$item[pro_id]','$qty[$i]','$sum');";
mysql_query($sqlInsert) or die (mysql_error());		
					
$sql = "update orders set or_total='$total_ems' where or_id='$id'";
mysql_query($sql) or die (mysql_error());
unset($sqlInsert);
$i++;
}
unset($_SESSION['cart']); //สลายเช็คชั่น
echo "<script>";
echo "window.location='index.php?page=order';";
echo "</script>";
}
?>                        
<!----------------------------ปิด IF ปุ่ม--------------------------->
<style type="text/css">
<!--
.style23 {color: #0066FF;
	font-weight: bold;
}
.style24 {color: #0033FF}
-->
</style>
<div style="width:900px; font-family: 'TH Krub'; font-size: 18px; color: #000033;">
<div style="border:1px #CCCCCC solid;">
<table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF">

<form method="post" enctype="multipart/form-data" name="frm" id="frm"  >

<?
/////////////////////////ยกเลิกรายการสั่งซื้อ/////////////////////////////////////
if($_REQUEST['btnCancle']!=''){
unset($_SESSION['cart']);
echo "<script>";
echo "window.location='index.php?page=product_cart'";
echo "</script>";
}
?>

    <tr align="center" style="background-color:#80CFFF;height:30px;color:#FFFFFF;font-size:13px;font-weight:bold">
      <td>ลำดับ</td>
      <td ><strong>รูปภาพสินค้า</strong></td>
       <td width="134">ยี่ห้อ</td>
       <td width="72">ขนาด</td>
      <td width="83"><strong>จำนวน</strong></td>
      <td><strong>ราคา/หน่วย</strong></td>
      <td>รวมเงิน</td>
      <td><strong>ลบ</strong></td>
    </tr>
    <?php
/////////////////////////ตารางสินค้าที่เลือก ADD ARRAY/////////////////////////////////////
	$pro_id = $_REQUEST['pro_id'];
 	$qty = $_REQUEST['inQty'];
	if($_GET['act']=='add' && !empty($_REQUEST['pro_id'])){ // ถ้า id ไม่ใช่ค่าว่าง
		if(@!in_array($pro_id,$_SESSION['cart'])){ // ค้นหาว่ามีสินค้านี้ในอาเรยัง	
			$sqlSelect 	= "SELECT * FROM product p JOIN product_type pt ON(p.pro_type_id=pt.pro_type_id) where p.pro_id='$pro_id'";
			$query	= mysql_query($sqlSelect) or die(mysql_error());
			$row	= mysql_fetch_array($query);
			$_SESSION['cart'][$pro_id]['pro_id']	= $row['pro_id'];
			$_SESSION['cart'][$pro_id]['pro_type_name']	= $row['pro_type_name'];
			$_SESSION['cart'][$pro_id]['pro_size'] = $row['pro_size'];			
			$_SESSION['cart'][$pro_id]['pro_price'] = $row['pro_price'];
			$_SESSION['cart'][$pro_id]['pro_img'] = $row['pro_img'];
			$_SESSION['cart'][$pro_id]['qty'] = $qty;
			$_SESSION['cart'][$pro_id]['pro_qty'] = $row['pro_qty'];
			echo "<script>";
			echo "window.location='index.php?page=product_cart'";
			echo "</script>";
		}
	}
/////////////////////////ลบรายการที่เลือก//////////////////////////////////////////	
	if($_REQUEST['act']=='remove' && !empty($_REQUEST['pro_id'])){// ถ้า id ไม่ใช่ค่าว่าง
		unset($_SESSION['cart'][$pro_id]);
		echo "<script>";
		echo "window.location='index.php?page=product_cart'";
		echo "</script>";
	}
/////////////////////////ตารางโชว์สินค้า//////////////////////////////////////////	
	if(!empty($_SESSION['cart'])){// ถ้า SESSION ไม่ใช่ค่าว่าง
  		$k = 0;
  	foreach($_SESSION['cart'] as $item){
		if($qty[$k]==''){
			$price = $item['pro_price']*$item['qty'];  // รวมค่าเงิน
			$qty_sum += $item['qty']; // จำนวนสินค้า
			$total_sum += $price;  // ราคารวม
		}else{ // ไม่มีรายการที่สั่งซื้อ
			$price = $item['pro_price']*$qty[$k];   // รวมค่าเงิน
			$qty_sum += $qty[$k];
			$total_sum += $price;
		}
  ?>
    <tr>
      <td width="50" height="25" align="center" valign="top" bordercolor="#FFFFFF"><?=$k+1;?></td>
      <td width="300" valign="top" bordercolor="#FFFFFF" align="center"><span class="style23">
      
        <? if($item['pro_img']=="0"){?>
        <img src="images/parcel.gif" alt="" width="100" border="0" align="top" />
        <? }else{ ?>     &nbsp    
        <a href="product/<?=$item['pro_img']?>" rel="lightbox[roadtrip]"> <img src="product/<?=$item['pro_img']?>" alt="" width="100" border="0" align="top" title="<?=$item['pro_name']?>" />     <? }?></a>  </span></td>
        
        <td align="center" valign="top">  <? echo $item['pro_type_name'] ?>    </td>
        <td align="center" valign="top">  <? echo $item['pro_size'] ?>     </td>
        <td align="center" valign="top" >
        
        <select name="inQty[<?=$k?>]" id="inQty[<?=$k?>]"  >
          <? for($m=1;$m<=$item['pro_qty'];$m++){?>
          <option value="<?=$m?>" <? if($qty[$k]==''){if($item['qty']==$m){echo 'selected';}}else{if($qty[$k]==$m){echo 'selected';}} ?>   >
            <?=$m?>
            </option>
          <? } ?>
        </select></td>
      <td width="97" align="center" valign="top"><?=number_format($item['pro_price']);?></td>
      <td width="86" align="center" valign="top"><?=number_format($price,0)?></td>
      <td width="67" align="center" valign="top"><input name="button" type="button"  onclick="window.location='index.php?page=product_cart&pro_id=<?=$item['pro_id']?>&act=remove';"   value=" ลบ " /></td>
    </tr>
    <? 
	  $k++; }  // ปิด while
	  } else {
	  ?>
    <tr>
      <td height="100" colspan="6" align="center" valign="middle">&lt;-- ไม่มีข้อมูลที่ค้นหา --&gt;</td>
    </tr>
    <? } ?>
    <tr>
      <td colspan="6" align="center" valign="top" bgcolor="#D1D1D1">ค่าจัดส่ง EMS --- 50 บาท</td>
     <? if($total_sum > 0 ){
		$total_sum = $total_sum+50 ; } ?>
      <td align="center" valign="top" bgcolor="#D1D1D1">  <?='<b><font color=red><u>'.number_format($total_sum,0).'</u></font></b>';?></td>
      <td align="center" valign="top" bgcolor="#D1D1D1">บาท</td>
    </tr>
    
    <tr>
      <td colspan="8" align="left" valign="bottom"><div style="float:left">
        <input name="button2" type="button" onclick="window.location='index.php?page=product';" value=" เลือกซื้อสินค้า " />
      </div>
          <? if($_SESSION['cart']){?>
          <div style="float:right">
            <input type="submit" name="btnCancle" id="btnCancle" value="ยกเลิก" />
            <input type="submit" name="btnC" id="btnC" value=" คำนวณเงิน" />
            <input type="submit" name="btnOK" id="btnOK" value=" ยืนยัน" />
          </div>
        <? } ?>      </td>
    </tr>
	</form>
  </table>
<hr/>


</div>
</div>
