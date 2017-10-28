<?php
    require '../connectdb.php';
    include '../connectdb.php';


$tb_id = $_POST['tb_id'];

$tb_numchair = $_POST['tb_numchair'];

$tb_number = $_POST['tb_number'];

$zone_id = $_POST['zone_id'];

$tb_status = $_POST['tb_status'];


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
                    <h2>แก้ไขโต๊ะ</h2>
                  </header>

                    <form id="form1" action="fromUpdatetb_save.php" method="post" enctype="multipart/form-data">
                      <table width="410" border="0" align="center" cellpadding="0" cellspacing="0">

                          <tr>
                              <td height="35" align="right">เลือกโซนโต๊ะอาหาร</td>
                              <td align="left">  <select name="zone_id">

                                      <?php
                                      $sql_zonetable = "SELECT * FROM tbzonetable";
                                      $res_zonetable = mysqli_query($dbcon,$sql_zonetable);
                                      while ($row_zonetable = mysqli_fetch_assoc($res_zonetable)) {
                                          if ($row_zonetable['zone_id'] == $zone_id) {
                                              echo '<option value="'.$row_zonetable['zone_id'].'" selected>'.$row_zonetable['zone_name'].'</option>';;
                                          }else {
                                              echo '<option value="'.$row_zonetable['zone_id'].'">'.$row_zonetable['zone_name'].'</option>';
                                          }
                                      }
                                      ?>
                                  </select></td>
                          </tr>
                          <tr>
                            <td height="35" align="right">หมายเลขโต๊ะ</td>
                            <td align="left">

                                <input type="text" name="tb_numchair" id="tb_numchair" value="<?php echo $tb_numchair ?>">

                            </td>
                        </tr>  
                        <tr>
                            <td height="35" align="right">จำนวนเก้าอี้</td>
                            <td align="left">
                                <input type="text" name="tb_number" id="tb_number" value="<?php echo $tb_number ?>">

                                <input type="hidden" name="tb_id" id="tb_id" value="<?php echo $tb_id ?>">
                            </td>
                        </tr>
                          <tr>
                              <td height="35" align="right">สถานะโต๊ะ</td>
                              <td align="left">

                                  <select name="tb_status">
                                      <?php

                                              if ($tb_status == "1"){
//                                                  echo '<option value="0" selected> ไม่ว่าง</option>';
                                                  echo '<option value="1" selected> ว่าง</option>';
                                                  echo '<option value="0" > ไม่ว่าง</option>';
                                              }else {
//                                                  echo '<option value="1" selected> ว่าง</option>';
                                                  echo '<option value="0" selected> ไม่ว่าง</option>';
                                                  echo '<option value="1" > ว่าง</option>';

                                              }



                                      ?>
                                  </select>
                          </tr>

                      </table>  <br /><br>
                        <div id="bb" align="center">
                          <input type="submit" id="add" name="add" value="อัพเดท" onclick="return confirm('คุณต้องการแก้ไขข้อมูลหรือไม่ ?');"/>
                      </div>
                    </table>
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