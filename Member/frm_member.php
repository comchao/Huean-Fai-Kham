<?php
    include '../connectdb.php';
 ?>
<!DOCTYPE HTML>
<!--
  Editorial by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>จัดการข้อมูลลูกค้า</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

    <title>แก้ไขข้อมูลลูกค้า</title>
  </head>
  <body>
  
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

                <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>

              <!-- Content -->
                <section>
                  <header class="main">
                    <h2>เพิ่มูลลูกค้า</h2>
                  </header>

                    <div>
                      <form action="insert_member.php" method="post">
                          <label for="news_detail">ชื่อ</label>
                          <input type="text" name="login_firstname" id="login_firstname" required>
                          
                          <br>
                          <label for="login_lastname">นามสกุล</label>
                          <input type="text" name="login_lastname" id="login_lastname" required>
                          
                          <br>
                          <label for="login_email">อีเมลล์</label>
                          <input type="email" name="login_email" id="login_email" required>
                          
                          <br>
                          <label for="login_username">username</label>
                          <input type="text" name="login_username" id="login_username" required>
                          
                          <br>
                          <label for="login_password">password</label>
                          <input type="password" name="login_password" id="login_password" required>
                          
                          <br>
                          <label for="login_address">ที่อยู่</label>
                          <input type="text" name="login_address" id="login_address" required>
                          
                          <br>
                          <label for="login_phone">เบอร์โทร</label>
                          <input type="text" name="login_phone" id="login_phone" required>
                          
                          <br>
                          <input type="submit" class="uk-button" value="บันทึก">

                          <input type="hidden" name="news_id" value="<?php echo $row_login['login_id']; ?>">
                      </form>
                    </div>
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
                    <li><a href="../News/frm_news.php">เพิ่มข่าว</a></li>
                    <li><a href="../Employee/Employee_Management.php">จัดการลูกค้า</a></li>
                    <li><a href="#">ตรวจสอบลูกค้า</a></li>
                    <li><a href="#">ตรวจสอบรายการอาหารลูกค้า</a></li>
                    <li><a href="#">จัดการโต๊ะ</a></li>
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


