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

                    <?php include"../employ/tap.php" ?>
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