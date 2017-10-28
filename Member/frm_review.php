<?php
   include '../session.php'; 
   include '../connectdb.php';
  
  $sql = "SELECT * FROM review WHERE rv_id ";
  $result_data = mysqli_query($dbcon,$sql);
  
 ?>

<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>รีวิวรสชาติอาหาร</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../Main/assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="../testhd/css/bootstraps.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->


  </head>

  <?php 
    include '../testhd/hder.php';   
  ?>
  <body>

        <div id="main-wrapper">
          <div class="container text-center">
            <div class="row 200%">
              <div class="12u 6u$(medium)">
                <div id="sidebar">

                    <div class="col-sm-14">
                        <div class="well" >

                        <!--<article class="uk-article">-->
                          <form action="review.php" method="post">

                            <fieldset data-uk-margin>
                              <legend>รีวิวรสชาติอาหาร</legend>
                              <input type="text" placeholder="รีวิวรสชาติอาหาร" name="rvtext">
                              <br>
                              <!--<input type="submit" class="uk-button" value="สมัครสมาชิก"> -->
                              <input type="submit" class="uk-button" value="เพิ่ม" />
                              <input type="hidden" name="id" value="<?php echo $row_id['rv_id']; ?>">
                              <input type="hidden" name="news_id" value="<?php echo $row_login['login_id']; ?>">
                            </fieldset>

                          </form>
                        </div>
                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
    <!-- Scripts -->

      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>

  </body>
</html>