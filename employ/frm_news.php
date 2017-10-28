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
    <title>เพิ่มข่าวประชาสัมพันธ์</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
     <script src="../ckeditor/ckeditor.js" ></script>     
    <title>เพิ่มข่าว</title>
  </head>
  <body>
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
                  <a href="../Employee/Employee_Manage.php" class="logo"><strong>ร้านอาหาร :</strong> เฮือนฝ้ายคำ.
                  </a>
                    <ul class="icons">
                      <li><a href="https://www.wongnai.com/restaurants/50236dn-เฮือนฝ้ายคำ" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                      <li><a href="https://www.facebook.com/sharer.php?u=https://www.wongnai.com/restaurants/50236dn-%E0%B9%80%E0%B8%AE%E0%B8%B7%E0%B8%AD%E0%B8%99%E0%B8%9D%E0%B9%89%E0%B8%B2%E0%B8%A2%E0%B8%84%E0%B8%B3" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    </ul> 
                </header>
  
            <!-- Content -->
                <section>
                  <header class="main">
                    <h2>เพิ่มข่าว</h2>
                  </header>

                    <div class="container">
                      <form id="form1" action="insert_news.php" method="post" enctype="multipart/form-data">
                        <label for="newstype">เลือกประเภทข่าว</label>
                        
                        <select name="newstype">
                        <option value=""> -- กรุณาเลือกประเภทข่าว -- </option>
                          <?php
                            $sql_newstype = "SELECT * FROM tbnewstype";
                            $res_newstype = mysqli_query($dbcon,$sql_newstype);
                            while ($row_newstype = mysqli_fetch_assoc($res_newstype)) {
                              echo '<option value="'.$row_newstype['newstype_id'].'">'.$row_newstype['newstype_detail'].'</option>';
                            }
                          ?>
                        </select>

                          <br>
                        <label for="news_topic">หัวข้อข่าว</label>
                          <form>
                            <form class="form-inline">
                              <div class="form-group">
                                  <input type="text" class="form-control" placeholder="หัวข้อข่าว" name="news_topic" style="width:800px;" required>
                              </div>
                       <!--<input type="text" name="news_topic" required>
                     </br>-->
                        <br>
                          <label for="news_detail">เนื้อหาข่าว</label>
                            <textarea name="news_detail" id="news_detail" rows="10" cols="80"> </textarea>
                          
                           <script>
                            CKEDITOR.replace( 'news_detail' , {
                              language: 'th',
                              uiColor: '#9AB8F3',
                              width:800
                            });
                        </script>

                       <br>
                       <label for="news_filename">ภาพประกอบข่าว</label>
                       <input type="file" name="news_filename">

                       <br>
                       <br>
                       <br>
                       <input type="submit" class="bt btn-primary" value="บันทึก">
                      </div>
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