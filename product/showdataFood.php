<?php
   session_start();

   include '../connectdb.php';

   $sql = "SELECT * FROM product As P INNER JOIN category as c on p.category_id = c.category_id Order by category_id";
   $res_data = mysqli_query($dbcon,$sql);
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
                    <h2>จัดการข้อมมูลหมวดหมู่อาหาร</h2>
                  </header>


<?php
@session_start();
include("../connects.php");
  
$sql = "SELECT * FROM product INNER JOIN category ON product.category_id=category.category_id ";
  
  if(!$result = mysqli_query($conn,$sql)){
    die('Error: '.mysqli_error($conn));
  }
  if(mysqli_num_rows($result)==0){
    echo "There is no data";
  }else{
      ?>   

              <center>
              <!-- ค้นหาอาหารตามหมวดหมู่ -->
                        <form class="uk-form" action="../product/fromupdate.php" method="post">
                            <select name="category">
                                <option value=""> -- ดูข้อมูลอาหารตามหมวดหมู่ -- </option>
                                    <?php
                                       $sql_category = "SELECT * FROM category ";
                                       $res_category = mysqli_query($dbcon,$sql_category);
                                       while ($row_category = mysqli_fetch_assoc($res_category)) 
                                        {
                                            echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
                                        }
                                    ?>
                            </select>
                        </from> 


                  <input type="submit" class="button button2" value="ค้นหา">
                  <hr><br>
      <br>
            <h2 align="center">รายการสินค้า</h2>
             <table align="center" border="1" class="show" align="center" width="50%">
             <tr>
                <th>ชื่อสินค้า</th>
                <th>รูปสินค้า</th>
                <th>ราคา</th>
                <th>หมวดหมู่เดิม</th>
                <th>หมวดหมู่</th>
                <th>แก้ไข</th>
        </tr>
    <?php
    while($data = mysqli_fetch_array($result,MYSQLI_BOTH)){
    ?>
       <form  method="post"  action="updateProduct.php?pidup=<?php echo $data["pid"];?>">
        <tr>
           <td ><input type="text" name="name" id="name" autofocus value="<?php echo $data["name"];?> " style="width:100px; text-align:center ;"/> </td>  
           <td align="center"> <?php echo '<img  src="'.$data["img"].'" width="100 height="100" '?><td align="center"> 
                               <input type="file" name="img" id="image" style="width:200px; text-align:center ;" /></td> 
           <td align="center"><input type="text" name="price" id="price" autofocus value=" <?php echo $data["price"];?> " style="width:75px; text-align:center ;"/> </td>            
           <td align="center"><input type="text" name="category_name" id="category_name" value=" <?php echo $data["category_name"];?> " style="width:80px; text-align:center ;"/> </td> 
           <td align="center"><select name="category">
                            <option value=""> -- เปลี่ยนหมวดหมู่อาหาร -- </option>
                            <?php
                            include("../connectdb.php");

                              $sql_category = "SELECT * FROM category ";
                              $res_category = mysqli_query($dbcon,$sql_category);
                              while ($row_category = mysqli_fetch_assoc($res_category)) {
                                  echo '<option value="'.$row_category['category_id'].'">'.$row_category['category_name'].'</option>';
                              }
                            ?>
                            </select>
           <td align="center"><input type="submit" id="update" name="update" value="อัพเดท"></a></td>    
        </tr>
        
        </form>
    <?php }?>
    <?php }?>
         </table>
         <br/>
            <center>
                <a href="index.php  ">กลับหน้าหลัก</a>
            </center> 
          
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
                  
                  <ul>
                    <li><a href="../Employee/Employee_manage.php">หน้าแรก</a></li> 
                    <li><a href="../Employee/Employee_manage.php">จัดการข้อมูลลูกค้า</a></li> 
                    <li>
                      <span class="opener">ข่าวประชาสัมพันธ์</span>
                      <ul> 
                        <li><a href="../Employee/Em_manageNews.php">จัดการข่าวประชาสัมพันธ์</a></li>
                        <li><a href="../News/dataNews.php">ข้อมูลข่าวประชาสัมพันธ์</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="opener">จัดการข้อมูลโต๊ะ</span>
                      <ul>
                        <li><a href="../table/fromInserttable.php">เพิ่มโต๊ะ</a></li>
                        <li><a href="../table/fromInsertzonetb.php">เพิ่มโซนโต๊ะ</a></li>
                        <li><a href="../table/datatable.php">ข้อมูลโต๊ะ</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="opener">จัดการข้อมูลอาหาร</span>
                      <ul>
                        <li><a href="../Product/frm_insertCategory.php">เพิ่มหมวดหมู่</a></li>
                        <li><a href="../Product/frominsertProduct.php">เพิ่มข้อมูลอาหาร</a></li>
                        <li><a href="../Product/index.php">ข้อมูลอาหาร</a></li>
                      </ul>
                    </li>
                    <li><a href="../Member/listfoodmem.php">ตรวจสอบรายการอาหารลูกค้า</a></li>
                    <li><a href="#">ตรวจสอบการจองโต๊ะลูกค้า</a></li>
                    <li><a href="../logout.php">ออกจากระบบ</a></li>
                </nav>

              <!-- Footer -->
                <footer id="footer">
                  <p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
                </footer>

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