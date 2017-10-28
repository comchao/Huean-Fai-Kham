<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form name="insertProduct" class="insertProduct" method="post" action="insertProducts.php" enctype="multipart/form-data"> 
<table class="insertProduct" width="410" border="0" align="center" cellpadding="0" cellspacing="0">
  	 		<tr>
                <th height="41" colspan="2" align="center">เพิ่มสินค้า</th>
        	</tr>              
    
            <tr>
      			<td height="35" align="right">ชื่อสินค้า:</td>
      			<td align="left"> <input type="text" name="name" id="name" autofocus placeholder="ชื่อสินค้า"/></td>
    		</tr>  
    		<tr>
      			<td height="35" align="right">ราคาสินค้า:</td>
      			<td align="left"> <input type="text" name="price" id="price"  autofocus placeholder="ราคาสินค้า"/></td>
    		</tr>  
       		<tr>
      			<td height="35" align="right">รูปภาพสินค้า:</td>
      			<td align="left"> <input type="file" name="image" id="image" /></td>
    		</tr>  
  			</table>  <br /><br>
  			<div id="bb" align="center">
  				<input type="submit" id="add" name="add" value="เพิ่ม"/>
 				<input type="reset" id="cancle" name="cancle" value="รีเซต" />
			</div>
</table>
</form>
<a href="index.php	">กลับหน้าหลัก</a>
</body>
</html>