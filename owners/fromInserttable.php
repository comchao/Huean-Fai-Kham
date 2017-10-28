<?php
    include '../connectdb.php';
 ?>
 <?php
  include '../session.php'; 
  include '../connectdb.php';

  $sql = "SELECT * FROM tbtable INNER JOIN tbzonetable ON tbtable.zone_id=tbzonetable.zone_id";
  $res_news = mysqli_query($dbcon,$sql);

  $sql1 = "SELECT * FROM tbtable WHERE tb_status = '0'";
  $row_member = mysqli_query($dbcon,$sql1);
  $result_member = mysqli_query($dbcon, $sql1);
  $num = mysqli_num_rows($result_member);
  
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
                    <h2>เพิ่มข้อมูลโต๊ะ</h2>
                  </header>
              
                    <form name="insertProduct" class="insertProduct" method="post" action="inserttable.php" enctype="multipart/form-data"> 
                      <table class="insertProduct" width="410" border="0" align="center" cellpadding="0" cellspacing="0">             
                        <tr>
                            <td height="35" align="right">หมายเลขโต๊ะ</td>
                            <td align="left"> <input type="text" name="numchair" id="numchair" autofocus placeholder="หมายเลขโต๊ะ"/></td>
                        </tr>  
                        <tr>
                            <td height="35" align="right">จำนวนเก้าอี้</td>
                            <td align="left"> <input type="text" name="number" id="number"  autofocus placeholder="จำนวนเก้าอี้"/></td>
                        </tr> 
                        <tr>
                            <select name="tbzonetable">
                            <option value=""> -- กรุณาเลือกโซนโต๊ะอาหาร -- </option>
                            <?php
                              $sql_zonetable = "SELECT * FROM tbzonetable";
                              $res_zonetable = mysqli_query($dbcon,$sql_zonetable);
                              while ($row_zonetable = mysqli_fetch_assoc($res_zonetable)) {
                                  echo '<option value="'.$row_zonetable['zone_id'].'">'.$row_zonetable['zone_name'].'</option>';
                              }
                            ?>
                            </select>
                        </tr> 
                        </table>  <br /><br>
                        <div id="bb" align="center">
                          <input type="submit" id="add" name="add" value="เพิ่ม"/>
                          <input type="reset" id="cancle" name="cancle" value="รีเซต" />
                      </div>
                    </table>
                  </form>
                </section>

                                <!-- Content -->
                <section>
                  <header class="main">
                    <h2>จัดการข้อมูลโต๊ะ</h2>
                  </header>
                  <br>
                      <!--<table border="lpx">-->
                      <table>
                        <tr>
                          <!--<th>รหัสโต๊ะ</th> -->
                          <th>ลำดับ</th>
                          <th>หมายเลขโต๊ะ</th>
                          <th>จำนวนเก้าอี้</th>
                          <th>โซนโต๊ะ</th>
                          <th>สถานะโต๊ะ</th>
                          <th>แก้ไข</th>
                          <th></th>
                          <th>ลบ</th>
                        </tr>


                                          <?php
                                          $sql = "SELECT * FROM tbtable INNER JOIN tbzonetable ON tbtable.zone_id = tbzonetable.zone_id";
                                          $res = mysqli_query($dbcon,$sql);
                                          $i=0 ;
                                          while ($row_zonetable = mysqli_fetch_assoc($res))
                                          {
                                              ?>

                                              <tr>
                                                  <td><div align=""><?php echo $i+1?></div></td>
                                                  <td><?php echo $row_zonetable["tb_numchair"];?></td>
                                                  <td><?php echo $row_zonetable["tb_number"];?> ตัว</td>

                                                  <td  align=""><?php echo $row_zonetable["zone_name"];?></td>

                                                  <?php
                                                  if($row_zonetable["tb_status"]=="0"){ ?>
                                                      <td style="color: lightcoral" align="">ไม่ว่าง</td>
                                                  <?php }
                                                  else{

                                                      ?>
                                                      <td style="color: lightgreen" align="">ว่าง</td>
                                                      <?php
                                                  } $i++
                                                  ?>

                                                 <td>
                                                     <form class="uk-form" action="fromUpdatetb.php" method="post">
                                                         <input id="tb_id" type="hidden" class="form-control" name="tb_id" value="<?php echo $row_zonetable["tb_id"];?>">
                                                         <input id="tb_numchair" type="hidden" class="form-control" name="tb_numchair" value="<?php echo $row_zonetable["tb_numchair"];?>">
                                                         <input id="tb_number" type="hidden" class="form-control" name="tb_number" value="<?php echo $row_zonetable["tb_number"];?>">
                                                         <input id="zone_id" type="hidden" class="form-control" name="zone_id" value="<?php echo $row_zonetable["zone_id"];?>">
                                                         <input id="tb_status" type="hidden" class="form-control" name="tb_status" value="<?php echo $row_zonetable["tb_status"];?>">

                                                         <input id="submit"  value="แก้ไข" type="submit" class="btn btn-success">

                                                  </form>
                                                 </td>






                                                      <td>
                                                          <form class="uk-form" action="fromUpdatetb.php" method="post">
                                                              <input id="tb_id" type="hidden" class="form-control" name="tb_id" value="<?php echo $row_zonetable["tb_id"];?>">
                                                          <td><a href="../owners/deletetb1.php?id=<?= $row_zonetable['tb_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');" >ลบ</a></td>
                                                          </form>
                                                      </td>


                                              </tr>



                                              <?php

                                          }
                         /* <?php
                              while ($row_member = mysqli_fetch_array($result_member)) {
                           */?><!--
                        <tr>

                        <td>




                        </tr>
                          --><?php /*} */?>
                      </table>
                </section>

            </div>
          </div>

  <!-- Sidebar -->
          <div id="sidebar">
            <div class="inner">

        <!-- Menu -->
                <nav id="menu">
                  <header class="major">

                    <?php include"../owners/Ownertap.php" ?>
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