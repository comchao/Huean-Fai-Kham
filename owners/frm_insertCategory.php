<?php
  include '../session.php'; 
  include '../connectdb.php';


  $sql = "SELECT * FROM category WHERE category_id ";
  $result_data = mysqli_query($dbcon,$sql);
  
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
                  <header class="main">
                    <h2>เพิ่มหมวดหมู่อาหาร</h2>
                  </header>
                      <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
                        <div class="uk-grid" data-uk-grid-margin>
                          <div class="uk-width-medium-3-4">
                            
                            <!--<article class="uk-article">-->
                          
                                <div>
                                <form action="category.php" method="post">
                                    <label for="name">หมวดหมู่อาหาร</label>
                                    <input type="text" name="name" placeholder="หมวดหมู่อาหาร" required>
                                      <br>
                                    <input type="submit" class="uk-button" value="เพิ่ม">
                                 </form>
                               </div>

                            </form>
                          </div>
                        </div>
                      </div>
                               
                       <br><center>
                       <h2>จัดการหมวดหมู่อาหาร</h2>
                      <table>
                          <tr>
                          <th>หมวดหมู่</th>
                          <th>ลบ</th>
                          <th>แก้ไข</th>
                        </tr>
                          <?php
                              while ($row_data = mysqli_fetch_array($result_data)) {
                           ?>
                            <tr>
                               <td ><?php echo $row_data['category_name']; ?></td> 
                               <td><a href="../owners/deletedtCate.php?id=<?= $row_data['category_id']; ?>" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่ ?');" >ลบ</a></td>   
                              <td><a href="../owners/frm_updateCategory.php?id=<?= $row_data['category_id']; ?>">แก้ไข</a></td>
                             </tr>
                         </form>
                          <?php }?>
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