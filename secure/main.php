<?php
  include '../session.php'; 
  include'../connectdb.php';
  
  $sql = "SELECT * FROM tblogin ORDER BY login_id DESC";
  $res_news = mysqli_query($dbcon,$sql);
?>

<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>เฮือนฝ้ายคำ</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="../Main/assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="../testhd/css/bootstraps.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  
    
    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #000000;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 70%; /* Set width to 100% */
      margin: auto;
      min-height:50px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 300px) {
    .carousel-caption {
      display: none; 
    }
  }
    </style>

  <?php
  include "../testhd/css/css.css"
?>

  </head>
  <?php 
        include '../testhd/hder.php'; 
      ?>

  <body class="homepage">
    <div id="page-wrapper">
<!-- Main -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox"  style="height: 400px">
      <div class="item active">
        <img src="../secure/img/1.jpg" alt="Image">
        <div class="carousel-caption">
        </div>      
      </div>

      <div class="item ">
        <img src="../secure/img/2.jpg" alt="Image">
        <div class="carousel-caption">
        </div>      
      </div>

      <div class="item">
        <img src="../secure/img/3.jpg" >
        <div class="carousel-caption">
        </div>      
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<br>
<!-- Features -->
<div class="container text-center">
<div class="col-sm-4">
    <div class="well">
      <img src="../secure/assets/อ่อมไก่บ้าน.jpg" alt="Image" style="width: 300px; height: 220px"><br>
      <h2>อ่อมไก่บ้าน</h2>
      <p>แกงอ่อม อาหารพื้นบ้านของ ชาวอีสานและชาวเหนือ ความแตกต่างระหว่างแกงอ่อมอีสานและเหนือ 
        รู้สึกว่า แกงอ่อมอีสานจะใส่เนื้อสัดว์และผักเยอะ พร้อมกับปรุงรสด้วยปลาร้า 
        ส่วนแกงอ่อมเหนือเน้นที่พวกเนื้อสัตว์ไปต้มกับพริกแกงที่ใส่กะปิ ใส่ผักสำหรับปรุงกลิ่นเท่านั้น</p>
    </div>
</div>
<div class="col-sm-4">
    <div class="well">
      <img src="../secure/assets/ต้มยำรวมทะเล.jpg" alt="Image" style="width: 300px; height: 220px"><br>
      <h2>ต้มยำรวม</h2>
      <p>ทำต้มยำกินเองที่บ้านง่ายๆ วัตถุดิบที่หาได้ในครัวตอนนั้น เอามาใส่ลงไป 
        เครื่องต้มยำก็เลือกใช้เป็นซุปต้มยำก้อนค่ะ แล้วยังได้ความหวานธรรมชาติจากต้นหอมญี่ปุ่น
        ที่เหลืออยู่ในตู้เย็นด้วย เอามาต้มซุปอร่อยกลมกล่อมดีเลยค่ะ</p>
    </div>
</div>
<div class="col-sm-4">
    <div class="well">
      <img src="../secure/assets/ผัดฉ่าปลาคัง.jpg" alt="Image" style="width: 300px; height: 220px"><br>
      <h2>ผัดฉ่าปลาคัง</h2>
      <p>โขลกพริกขี้หนูดอย รากผักชี ตะไคร้ พริกไทยเม็ดให้แหลกแล้วใส่ลงผัดกับน้ำมันจนหอม 
        ใส่น้ำปลา น้ำตาลปึก ซอสหอยนางรม ลงผัดให้เข้ากันจึงลวกเนื้อปลาให้สุกใส่ลงผัดด้วย 
        ใส่ใบมะกรูด พริกไทยสด กระชาย มะเขือพวง ลงผัดให้หอมแล้วตักใส่จานเสิร์ฟร้อนๆ</p>
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