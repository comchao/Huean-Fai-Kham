<?php
    session_start();
    include '../connectdb.php';
    

    $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype 
            ON tbnews.newstype_id=tbnewstype.newstype_id 
            ORDER BY news_id DESC ";
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
    <title>เฮือนฝ้ายคำ - ลูกค้า</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body>
    <style>
      img {
           border-radius: 8px;
           width: 50%;
          }
    </style>

    <!-- Wrapper -->
      <div id="wrapper">

        <!-- Main -->
          <div id="main">
            <div class="inner">

              <!-- Header -->
                <header id="header">
                  <a href="../Member/index.php" class="logo"><strong>ร้านอาหาร :</strong> เฮือนฝ้ายคำ. 
                    <!--<h5>ยินดีต้อนรับคุณ : <?php echo $s_login_username; ?> </h5></a>-->
                  <ul class="icons">
                    <li><a href="https://www.wongnai.com/restaurants/50236dn-เฮือนฝ้ายคำ" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="https://www.facebook.com/sharer.php?u=https://www.wongnai.com/restaurants/50236dn-%E0%B9%80%E0%B8%AE%E0%B8%B7%E0%B8%AD%E0%B8%99%E0%B8%9D%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%B3" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                  </ul>
                </header>

                <!-- Content -->
                <section>
                  <header class="main">
                    <h2>ข่าวทั้งหมด</h2>
                  </header>
                    <p>
                        <?php
                            while ($row_news = mysqli_fetch_assoc($res_news)) {
                         ?>
                
                        <h3 class="uk-article-title">
                            <a href="#"><?php echo $row_news['news_topic']; ?></a>
                        </h3>
                        <p class="uk-article-meta">Written by Employee on <?php echo $row_news['news_date']; ?>. Posted in <a href="#"><?php echo $row_news['newstype_detail']; ?></a></p>
                        <p>
                            <a href="#"><img class="uk-thumbnail uk-thumbnail-large uk-align-center" src="../news_image/<?php echo $row_news['news_filename']; ?>" alt=""></a>
                        </p>
                        <?php echo $row_news['news_detail']; ?>

                      <?php } ?>
                      <br>
                      <br>
                    </p>
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
                    <h3>ลูกค้า</h3>
                  </header>
                  
                   <ul>
                    <li><a href="../Member/index.php">หน้าแรก</a></li>
                    <li><a href="../News/news_all.php">ข่าวทั้งหมด</a></li>
                    <li><a href="#">จองโต๊ะ</a></li>
                    <li>
                      <span class="opener">สั่งอาหาร</span>
                      <ul>
                        <li><a href="../Food/Tom.php">ต้ม</a></li>
                        <li><a href="../Food/Pud.php">ผัด</a></li>
                        <li><a href="../Food/Gang.php">แกง</a></li>
                        <li><a href="../Food/Tod.php">ทอด</a></li>
                        <li><a href="../Food/Rice.php">ข้าว</a></li>
                        <li><a href="../Food/Sweet.php">ของหวาน</a></li>
                        <li><a href="../Food/Beverage.php">เครื่องดื่ม</a></li>
                      </ul>
                    </li>
                    <li><a href="../Member/ReviewFoodTest.php">รีวิวรสชาติอาหาร</a></li>
                    <li><a href="../secure/logout.php">ออกจากระบบ</a></li>
               
                <!-- Section -->
                <br>
                <br>
                <br>
                  <section>
                    <header class="major">
                      <h2>ร้านอาหารเฮือนฝ้ายคำ</h2>
                    </header>
                    <p>เฮือนฝ้ายคำ เป็นร้านอาหาร 2 ชั้น สร้างด้วยไม้ชั้นบนเปิดโล่งเพื่อให้คุณได้ชมดาวบนท้องฟ้าระหว่างการทานอาหารมื้อค่ำ 
                      กับบรรยากาศสบายๆ ริมแม่น้ำโขง พร้อมด้วยอาหารพื้นบ้านจากปลาแม่น้ำโขง โซนทานอาหารแบ่งออกเป็น 3 โซน คือ ภายในตัวบ้าน 
                      โซนระเบียง และดาดฟ้าชั้น 2 นับเป็นร้านอาหารที่อยู่ริมแม่น้ำโขงที่ได้รับความนิยมเป็นอันดับต้นๆ ของนักท่องเที่ยว</p>
                  <ul class="contact">
                    <li class="fa-envelope-o"><a href="#">information@untitled.tld</a></li>
                    <li class="fa-phone"> 042822109 , 0818082826 , 0816185964</li>
                    <li class="fa-home">176/1 ม.2 ซ.ชายโขง 14 ถ.ชายโขง ต.เชียงคาน อ.เชียงคาน จ.เลย 42110</li>
                  </ul> 
                </nav>

    <!-- Scripts -->
      <script src="../js/jquery.min.js"></script>
      <script src="../js/skel.min.js"></script>
      <script src="../js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="../js/main.js"></script>

  </body>
</html>
