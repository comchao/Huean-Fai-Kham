<?php
   include '../session.php'; 
   include '../connectdb.php';

 ?>

<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>ลงทะเบียน</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="testhd/css/bootstraps.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />

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
        <!-- แต่ง button เพิ่มข่าว -->
        <style>
      .btn {
          border: none;
          color: white;
          padding: 2px 16px;
          font-size: 16px;
          cursor: pointer;
      }
      .success {background-color: #ffffff;} /* Green */
      .success:hover {background-color: #ffef26;}
    </style>

  
  <body>
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
                            <h2>เพิ่มลูกค้า</h2>
                          </header>
                          
                        <!--<article class="uk-article">-->
                          <form class="uk-form" action="Registermem.php" method="post">

                            <fieldset data-uk-margin>
                              <legend>ลงทะเบียน</legend>
                              <input type="text" placeholder="Firstname" name="firstname" required>
                              <br>
                              <input type="text" placeholder="Lastname" name="lastname" required>
                              <br>
                              <input type="email" placeholder="Email" name="email" required>
                              <br>
                              <input type="text" placeholder="User Name" name="username" required>
                              <br>
                              <input type="password" placeholder="Password" name="password" required>
                              <br>
                              <input type="text" placeholder="Address" name="address" required>
                              <br>
                              <input type="text" placeholder="Phone" name="phone" required>
                              <br>
                              <!--<input type="submit" class="uk-button" value="สมัครสมาชิก"> -->
                              <input type="submit" class="uk-button" value="สมัครสมาชิก" />
                            </fieldset>
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