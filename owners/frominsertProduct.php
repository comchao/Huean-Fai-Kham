<?php
   include '../session.php'; 
   include '../connectdb.php';

   $sql = "SELECT * FROM product As P INNER JOIN category as c on p.category_id = c.category_id Order by category_id";
   $res_data = mysqli_query($dbcon,$sql);

   $sql1 = "SELECT * FROM tblogin WHERE login_status = '0'";
   $row_member = mysqli_query($dbcon,$sql1);
   $result_member = mysqli_query($dbcon, $sql1);
   $num = mysqli_num_rows($result_member);
 ?>
 
<!DOCTYPE HTML>
<!--
  Editorial by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>เฮือนฝ้ายคำ - พนักงาน</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body>
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

    <!-- Wrapper -->
      <div id="wrapper">

        <!-- Main -->
          <div id="main">
            <div class="inner">

              <!-- Header -->
                           <header id="header">
                              <a href="../Employee/Employee_Manage.php" class="logo"><strong>ร้านอาหาร :</strong> เฮือนฝ้ายคำ.
                              </a>
                              <ul class="icons">
                                <li><a href="https://www.wongnai.com/restaurants/50236dn-เฮือนฝ้ายคำ" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                                <li><a href="https://www.facebook.com/heonfaicumck" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                              </ul> 
                          </header>

                <!-- Content -->
                <section>
                  <header class="main">
                    <h2>จัดการข้อมูลอาหาร</h2>
                  </header>
              
                    <form name="insertProduct" class="insertProduct" method="post" action="insertProducts.php" enctype="multipart/form-data"> 
                      <table class="insertProduct" width="410" border="0" align="center" cellpadding="0" cellspacing="0">             
                        <tr>
                            <td height="35" align="right">ชื่อ</td>
                            <td align="left"> <input type="text" name="name" id="name" autofocus placeholder="ชื่ออาหาร"/></td>
                        </tr>  
                        <tr>
                            <td height="35" align="right">รายละเอียด</td>
                            <td align="left"> <input type="text" name="detail" id="detail" autofocus placeholder="รายละเอียดอาหาร"/></td>
                        </tr>  
                        <tr>
                            <td height="35" align="right">ราคา</td>
                            <td align="left"> <input type="text" name="price" id="price"  autofocus placeholder="ราคา"/></td>
                        </tr> 
                        <tr>
                            <select name="category">
                            <option value=""> -- กรุณาเลือกหมวดหมู่อาหาร -- </option>
                            <?php
                              $sql_category = "SELECT * FROM category";
                              $res_category = mysqli_query($dbcon,$sql_category);
                              while ($row_category = mysqli_fetch_assoc($res_category)) {
                                  echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
                              }
                            ?>
                            </select>
                        </tr> 

                        <tr>
                             <td><label for="img">ภาพประกอบข่าว</label></td>
                             <td><input type="file" name="img"></td>
                        </tr>  
                        </table>  <br /><br>
                        <div id="bb" align="center">
                          <input type="submit" id="add" name="add" value="เพิ่ม"/>
                          <input type="reset" id="cancle" name="cancle" value="รีเซต" />
                      </div>
                    </table>
                  </form>
<?php
   include '../session.php'; 
   include '../connectdb.php';


  $sql = "SELECT * FROM product";
  $row_member = mysqli_query($dbcon,$sql);
  $result_member = mysqli_query($dbcon, $sql);
  $num = mysqli_num_rows($result_member);
 ?>
                    <h2>ข้อมูลอาหารทั้งหมด</h2>
                    <table>
                        <tr>
                          <th>รหัส</th>
                          <th>ชื่ออาหาร</th>
                          <th>รายละเอียดอาหาร</th>
                          <th>ภาพอาหาร</th>
                          <th>ราคา</th>
                          <th>แก้ไข</th>
                          <th>ลบ</th>
                        </tr>

                          <?php
                              while ($row_member = mysqli_fetch_array($result_member)) {
                           ?>
                        <tr>
                          <td><?php echo $row_member['pid']; ?></td>
                          <td><?php echo $row_member['name']; ?></td>
                          <td><?php echo $row_member['detail']; ?></td>
                          <!--<td><?php echo $row_member['price']; ?></td>-->
                          <td><a href="../product/img/<?php echo $row_member['img']; ?> "
                                       target="_blank"><?php echo $row_member['img']; ?></a></td>
                          <td><?php echo $row_member['price']; ?></td>

                          <td><a href="../owners/fromupdateProduct.php?id=<?= $row_member['pid']; ?>">แก้ไข</a></td>
                          
                           <!-- ลบข้อมูลอาหาร โดยเรียกไปยังฟอร์ม deletedtProduct  -->
                           <td><a href="../owners/deleteproduct.php?id=<?= $row_member['pid']; ?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');" >ลบ</a></td> 
                        </tr>
                          <?php } ?>
                      </table>
         <br/>
        
                </section>
            </div>
          </div>


      <!-- Sidebar -->
          <div id="sidebar">
            <div class="inner">

        <!-- Menu -->
                <nav id="menu">
                  <header class="major">

                    <?php include"../owners/Ownertap.php" ?>
            </div>
          </div>
      </div>

    <!-- Scripts -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/skel.min.js"></script>
      <script src="../js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="../js/main.js"></script>

  </body>
</html>