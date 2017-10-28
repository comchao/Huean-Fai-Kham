<?php
  /* include '../secure/session.php'; */

  include '../connectdb.php';

  $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id ORDER BY news_id DESC";
  $res_news = mysqli_query($dbcon,$sql);

  $sql1 = "SELECT * FROM tblogin WHERE login_status LIKE '100%"."%'";
  $row_member = mysqli_query($dbcon,$sql1);
  $result_member = mysqli_query($dbcon, $sql1);
?>

 
<!DOCTYPE HTML>
<html>
  <head>
    <title>Huean Fai Kham</title>
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
              width: 220%;
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
      <!--<h1>สวัสดีคุณ <?php echo $s_login_username; ?> </h1> -->
      </div>
        <!--<table border="lpx">-->
      
      <table>
        <input class="btn success" type="button" name="button" id="button" value="เพิ่มพนักงาน"  onclick="window.location='frm_Register.php'"  />
        <br><br>
        <tr>
          <!--<th>ที่</th>-->
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>username</th>
          <!--<th>password</th>-->
          <th>ที่อยู่</th>
          <!--<th>email</th>-->
          <th>เบอร์โทรศัพท์</th>
          <th>สถานะ</th>
          <th>แก้ไข</th>
          <!--<th>ลบ</th>-->
        </tr>

          <?php
              while ($row_member = mysqli_fetch_array($result_member)) {
           ?>

          <tr>
            <!--<td><?php echo $row_member['login_id']; ?></td>-->
            <td><?php echo $row_member['login_firstname']; ?></td>
            <td><?php echo $row_member['login_lastname']; ?></td>
            <td><?php echo $row_member['login_username']; ?></td>
            <!--<td><?php echo $row_member['login_password']; ?></td>-->
            <td><?php echo $row_member['login_address']; ?></td>
            <!--<td><?php echo $row_member['login_email']; ?></td>-->
            <td><?php echo $row_member['login_phone']; ?></td>

            <td><?php
            if ($row_member['login_status'] == 0){
              echo 'ลูกค้า';
            }else if ($row_member['login_status'] == 100) {
              echo 'พนักงาน';
            }else {
              echo 'แอดมิน';
            }
            ?></td>
            <td><a href="../Owner/EditeData_Em.php?id=<?= $row_member['login_id']; ?>">แก้ไข</a></td>
            <!--<td><a href="../Owner/EditeData_Em.php?id=<?= $row_member['login_id']; ?>">ลบ</a></td> -->

            <!--<td align="center">
              <a href="JavaScript:if(confirm('ยืนยันการลบ?')==true)
                {window.location='../Owner/EditeData_Em.php?id=<?php echo $row_member["login_id"];?>';}">ลบ</a></td> -->

          </tr>
            <?php } ?>
        </table>
            </div>
          </div>

        

    <!-- Scripts -->
      <script src="../assets/js/jquery.min.js"></script>
      <script src="../assets/js/skel.min.js"></script>
      <script src="../assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="../assets/js/main.js"></script>

  </body>
</html>