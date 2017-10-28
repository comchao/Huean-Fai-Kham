<?php 
    /*require '../connectdb.php';*/
    include '../connectdb.php';

    $pid = $_GET['id'];

    $sql = "SELECT * FROM product WHERE pid='$pid'";
    $res_product = mysqli_query($dbcon,$sql);
    $row_product = mysqli_fetch_array($res_product);
 ?>

<!DOCTYPE HTML>
<!--
  Editorial by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>แก้ไขข้อมูลลูกค้า</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body>

    <!--<?php
        /*@session_start();
        include("../secure/connectdb.php");
          
        $sql = "SELECT * from tblogin ";
          
          if(!$result = mysqli_query($dbcon,$sql)){
            die('Error: '.mysqli_error($dbcon));
          }
          if(mysqli_num_rows($result)==0){
            echo "There is no data";
          }else{*/
      ?>  -->

    <!-- Wrapper -->
      <div id="wrapper">

        <!-- Main -->
          <div id="main">
            <div class="inner">

              <!-- Header -->
                <header id="header">
                  <a href="../Employee/Employee_manage.php" class="logo"><strong>ร้านอาหาร :</strong> เฮือนฝ้ายคำ.
                  </a>
                    <ul class="icons">
                      <li><a href="https://www.wongnai.com/restaurants/50236dn-เฮือนฝ้ายคำ" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                      <li><a href="https://www.facebook.com/sharer.php?u=https://www.wongnai.com/restaurants/50236dn-%E0%B9%80%E0%B8%AE%E0%B8%B7%E0%B8%AD%E0%B8%99%E0%B8%9D%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%B3" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    </ul> 
                </header>

                    <!-- Content -->
                      <section>
                        <form action="updateProduct.php" method="post" enctype="multipart/form-data">
                          <h2>แก้ไขข้อมูลอาหาร รหัส <?php echo $pid; ?></h2>

                          <label for="category">เลือกหมวดหมู่</label>
                                    <select name="category">

                                    <?php
                                      $sql_category = "SELECT * FROM category";
                                      $res_category = mysqli_query($dbcon,$sql_category);
                                      while ($row_category = mysqli_fetch_assoc($res_category)) {
                                        if ($row_category['category_id'] == $row_product['category_id']) {
                                          echo '<option value="'.$row_category['category_id'].'" selected>'.$row_category['category_name'].'</option>';;
                                        }else {
                                          echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
                                        }
                                      }
                                    ?>
                                    </select>
                        </tr> <br>
                              
                              <label for="name">ชื่ออาหาร</label>
                              <input type="text" name="name" value="<?php echo $row_product['name']; ?>" required>
                              
                              <br>
                              <label for="detail">รายละเอียดอาหาร</label>
                              <input type="text" name="detail" value="<?php echo $row_product['detail']; ?>"  required>
                             
                             <br>
                              <img src="../product/img/<?php echo $row_product['img']; ?>" width="250px" height="180px">
                              
                              <label for="img"> ภาพประกอบอาหาร :  </label>
                              <input type="file" name="img">

                              <br>
                              <label for="price">ราคา</label>
                              <input type="text" name="price" value="<?php echo $row_product['price']; ?>" required>
                            
                          
                              <br><br>
                              <input type="submit" class="uk-button" value="บันทึก">

                              <input type="hidden" name="id" value="<?php echo $row_product['pid']; ?>">
                              <!--<input type="hidden" name="login_status" value="<?php echo $row_login['login_status']; ?>"> -->
                          </form>
                        </section>
                      </div>
                    </div>


                    <!-- Sidebar -->
          <div id="sidebar">
            <div class="inner">

        <!-- Menu -->
                <nav id="menu">
                  <header class="major">

                    <!--<h2>ยินดีต้อนรับคุณ : <?php echo $s_login_username; ?> </h2>-->
                    <h3>พนักงาน</h3>
                  </header>
                  
                  <ul>
                    <li><a href="../Employee/Employee_manage.php">หน้าแรก</a></li> 
                    <li><a href="../Employee/Employee_manage.php">จัดการข้อมูลลูกค้า</a></li> 
                    <li>
                      <span class="opener">ข่าวประชาสัมพันธ์</span>
                      <ul> 
                        <li><a href="../Employee/Em_manageNews.php">จัดการข่าวประชาสัมพันธ์</a></li>
                        <li><a href="../News/dataNews.php">ข้อมูลข่าวประชาสัมพันธ์</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="opener">จัดการข้อมูลโต๊ะ</span>
                      <ul>
                        <li><a href="../table/fromInserttable.php">เพิ่มโต๊ะ</a></li>
                        <li><a href="../table/fromInsertzonetb.php">เพิ่มโซนโต๊ะ</a></li>
                        <li><a href="../table/datatable.php">ข้อมูลโต๊ะ</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="opener">จัดการข้อมูลอาหาร</span>
                      <ul>
                        <li><a href="../Product/frm_insertCategory.php">เพิ่มหมวดหมู่</a></li>
                        <li><a href="../Product/frominsertProduct.php">เพิ่มข้อมูลอาหาร</a></li>
                        <li><a href="../Product/index.php">ข้อมูลอาหาร</a></li>
                      </ul>
                    </li>
                    <li><a href="#">ตรวจสอบรายการอาหารลูกค้า</a></li>
                    <li><a href="#">ตรวจสอบการจองโต๊ะลูกค้า</a></li>
                    <li><a href="../logout.php">ออกจากระบบ</a></li>
                </nav>

              <!-- Footer -->
                <footer id="footer">
                  <p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                </footer>

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