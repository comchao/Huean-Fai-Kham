<?php
    include '../connectdb.php';
    $news_id = $_GET['id'];

    $sql = "SELECT * FROM tbnews WHERE news_id='$news_id'";
    $res_news = mysqli_query($dbcon,$sql);
    $row_news = mysqli_fetch_assoc($res_news);
 ?>
<!DOCTYPE HTML>
<!--
  Editorial by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>แก้ไขรายละเอียดข่าว</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  <script src="../ckeditor/ckeditor.js" ></script>
  </head>
  <body>
    <title>แก้ไขข่าว</title>
    <style>
          label {
              display: block;
          }
    </style>
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
                              <header class="main">
                                <h2>แก้ไขรายละเอียดข่าว รหัส <?php echo $news_id; ?></h2>
                              </header>

                                  <form id="form1" action="../News/update_news.php" method="post" enctype="multipart/form-data">
                                    <label for="newstype">เลือกประเภทข่าว</label>
                                    <select name="newstype">

                                    <?php
                                      $sql_newstype = "SELECT * FROM tbnewstype";
                                      $res_newstype = mysqli_query($dbcon,$sql_newstype);
                                      while ($row_newstype = mysqli_fetch_assoc($res_newstype)) {
                                        if ($row_newstype['newstype_id'] == $row_news['newstype_id']) {
                                          echo '<option value="'.$row_newstype['newstype_id'].'" selected>'.$row_newstype['newstype_detail'].'</option>';;
                                        }else {
                                          echo '<option value="'.$row_newstype['newstype_id'].'">'.$row_newstype['newstype_detail'].'</option>';
                                        }
                                      }
                                    ?>
                                    </select>
                                 <label for="news_topic">หัวข้อข่าว</label>
                                 <input type="text" name="news_topic" value="<?php echo $row_news['news_topic']; ?>" required size="81px">
                                 <br>
                                 <label for="news_detail">เนื้อหาข่าว</label>
                                 <textarea name="news_detail" id="news_detail" rows="10" cols="80"> <?php echo $row_news['news_detail']; ?></textarea>
                                 
                                 <script>
                                      CKEDITOR.replace( 'news_detail' , {
                                        language: 'th',
                                        uiColor: '#9AB8F3',
                                        width:600
                                      });
                                  </script>
                                  
                                  <br>
                                 <img src="../news_image/<?php echo $row_news['news_filename']; ?>" wigth="200px" height="200px">
                                 <label for="news_filename">ภาพประกอบข่าว</label>
                                 <input type="file" name="news_filename">


                                 <input type="hidden" name="news_id" value="<?php echo $row_news['news_id']; ?>">

                                 <br><br>
                                 <input type="submit" value="บันทึก">
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
                  
                 <?php include"../Employee/tap.php" ?>

             

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
