<?php
    include '../connectdb.php';
    $category_id = $_GET['id'];

    $sql = "SELECT * FROM category WHERE category_id='$category_id'";
    $res_tables = mysqli_query($dbcon,$sql);
    $row_tables = mysqli_fetch_array($res_tables);
 ?>
<!DOCTYPE HTML>
<!--
  Editorial by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>เฮือนฝ้ายคำ - พนักงาน</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body>
    <!-- แต่งสีตาราง-->
        <style>
            table {
              border: collapse;
              width: 60%;
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
                        <form action="updateCate.php" method="post" >
                          <h2>แก้ไขหมวดหมู่อาหาร รหัส <?php echo $category_id; ?></h2>
                              
                              <input type="text" name="name" value="<?php echo $row_tables['category_name']; ?>" >
                              <br><br>
                              <input type="submit" class="uk-button" value="บันทึก">
                              <input type="hidden" name="id" value="<?php echo $row_tables['category_id']; ?>">
                              
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