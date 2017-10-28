<?php
    session_start();
    include '../connectdb.php';

    $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id 
            ORDER BY news_id DESC LIMIT 2";
    $res_news = mysqli_query($dbcon,$sql);

 ?>
 
<!DOCTYPE HTML>
<!--
  Editorial by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Huean Fai Kham - Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body>

    <!-- Wrapper -->
      <div id="wrapper">

        <!-- Main -->
          <div id="main">
            <div class="inner">

              <!-- Header -->
                <header id="header">
                  <a href="Ownershop.php" class="logo"><strong>ร้านอาหาร :</strong> เฮือนฝ้ายคำ.</a>
                  <ul class="icons">
                    <li><a href="https://www.wongnai.com/restaurants/50236dn-เฮือนฝ้ายคำ" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="https://www.facebook.com/sharer.php?u=https://www.wongnai.com/restaurants/50236dn-%E0%B9%80%E0%B8%AE%E0%B8%B7%E0%B8%AD%E0%B8%99%E0%B8%9D%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%B3" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                  </ul>
                </header>

              <!-- Section -->
                <section>
                  <header class="major">
                  <h4>จัดการข้อมูลพนักงาน</h4> 
                  </header>
                  <div class="posts">
                    <article>

                      <p>
                        <?php include '../Owner/OwnerMain.php';?> 
                      </p>

                      <ul class="actions">
                      </ul>
                    </article>
                  </div>
                </section>
            </div>
          </div>

        <!-- Sidebar -->
          <div id="sidebar">
            <div class="inner">

              <!-- Search -->
               <!--  <section id="search" class="alt">
                  <form method="post" action="#">
                    <input type="text" name="query" id="query" placeholder="Search" />
                  </form>
                </section> -->

               <!-- Menu -->
                <nav id="menu">
                  <header class="major">

                   <!-- <h2>ยินดีต้อนรับคุณ : <?php echo $s_login_username; ?> </h2>-->

                    <h3>Admin</h3>
                  </header>
                  
                  <ul>
                    <li><a href="Ownershop.php">หน้าแรก</a></li>
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
                        <!--<li><a href="../Product/index.php">ข้อมูลอาหาร</a></li>-->
                      </ul>
                    </li>
                    <li>
                      <span class="opener">รายงาน</span>
                      <ul>
                        <li><a href="#">โต๊ะ</a></li>
                        <li><a href="#">อาหาร</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="opener">ตรวจสอบข้อมูลโต๊ะ</span>
                      <ul>
                        <li><a href="#">โต๊ะที่ลูกค้าจอง</a></li>
                        <li><a href="#">โต๊ะที่ว่าง</a></li>
                      </ul>
                    </li>
                      <li><a href="Ow_listfoodmem.php">ตรวจสอบรายการอาหารลูกค้า</a></li>
                      <li><a href="../logout.php">ออกจากระบบ</a></li>
                </nav>

    <!-- Scripts -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/skel.min.js"></script>
      <script src="../js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="../js/main.js"></script>

  </body>
</html>