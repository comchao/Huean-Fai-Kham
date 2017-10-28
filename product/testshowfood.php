<?php
   session_start();

   include 'connectdb.php';

   $sql = "SELECT * FROM product INNER JOIN category ON product.pid=category.category_id ";
   $res_data = mysqli_query($dbcon,$sql);

?>

<!DOCTYPE HTML>
<html>
<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<title>5555</title>
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
<!-- แต่งสีตาราง-->
        <style>
            table {
              border: collapse;
              width: 60%;
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

      	<div>
      		<center>
            	<form class="uk-form" action="#" method="post">
                  <select name="category">
                      <option value=""> -- ดูข้อมูลอาหารตามหมวดหมู่ -- </option>
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
        <input type="submit" class="uk-button" value="ค้นหา">
    	
    	<br><br><br>


    					      <!--<table border="lpx">-->
								      <table>
								          <tr>
								            <th>รหัส</th>
								            <th>หมวดหมู่</th>
								            <th>รูป</th>
								            <th>ราคา</th>
								            <th>ชื่อ</th>
								            <!--<th>แก้ไข</th>
								            <th>ลบ</th> -->
								          </tr>
								              <?php
								                  while ($row_data = mysqli_fetch_assoc($res_data)) 
								                  {
								              ?>
								          <tr>
								            <td><?php echo $row_data['pid']; ?></td>
								            <td><?php echo $row_data['category_name']; ?></td>
								            <td><?php echo $row_data['img']; ?></td>
								            <td><?php echo $row_data['price']; ?></td>
								            <td><?php echo $row_data['name']; ?></td>
								          </tr>
								            <?php } ?>
								      </table>
    	
		      </center>
		      <br>
	      </div>
</body>
</html>
