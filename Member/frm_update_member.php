<?php 
    require '../connectdb.php';
    include '../connectdb.php';

    $login_id = $_GET['id'];

    $sql = "SELECT * FROM tblogin WHERE login_id='$login_id'";
    $res_login = mysqli_query($dbcon,$sql);
    $row_login = mysqli_fetch_array($res_login);
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
                        <form action="update_member.php" method="post" enctype="multipart/form-data">
                          <h2>แก้ไขข้อมูลลูกค้า รหัส <?php echo $login_id; ?></h2>
                              
                              <label for="login_firstname">ชื่อ</label>
                              <input type="text" name="firstname" value="<?php echo $row_login['login_firstname']; ?>" required>
                              
                              <br>
                              <label for="login_lastname">นามสกุล</label>
                              <input type="text" name="lastname" value="<?php echo $row_login['login_lastname']; ?>"  required>
                             
                              <br>
                              <label for="login_email">อีเมลล์</label>
                              <input type="email" name="email" value="<?php echo $row_login['login_email']; ?>" required>
                            
                              <br>
                              <label for="login_username">username</label>
                              <input type="text" name="login_username" value="<?php echo $row_login['login_username']; ?>"  required>

                              <br>
                              <label for="login_password">password</label>
                              <input type="password" name="password" value="<?php echo $row_login['login_password']; ?>" required>

                              <br>
                              <label for="login_address">ที่อยู่</label>
                              <input type="text" name="address" value="<?php echo $row_login['login_address']; ?>"  required>

                              <br>
                              <label for="login_phone">เบอร์โทร</label>
                              <input type="text" name="phone" value="<?php echo $row_login['login_phone']; ?>" required>

                              <br><br>
                              <input type="submit" class="uk-button" value="บันทึก">

                              <input type="hidden" name="login_id" value="<?php echo $row_login['login_id']; ?>">
                              <input type="hidden" name="login_status" value="<?php echo $row_login['login_status']; ?>">
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