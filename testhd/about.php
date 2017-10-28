
<?php
  session_start();
  include'secure/connectdb.php';
  
  $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id ORDER BY news_id DESC";
  $res_news = mysqli_query($dbcon,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ChiTungMay Bakery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:100px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>
<!-- Header -->
<?php include'header.php'; ?>
<link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">
<span style="font-family: 'Sriracha', cursive;">
  <div class="container text-center" style="background : DeepPink; width: 100%">    
    <br><h3><b>ข้อมูลร้าน Chitangmay Bakery</b></h3><br>

      <div class="col-sm-4">
        <div class="well">
         <h3><b>ข้อมูลการติดต่อ</b></h3><br>
         <p align="left"><img src="img/phone.png" width="40px" height="40px"> &nbsp;&nbsp;&nbsp;&nbsp;<b>โทร :</b> 093-3570060</p>
         <p align="left"><img src="img/placeholder.png" width="40px" height="40px">&nbsp;&nbsp;&nbsp;&nbsp; <b>ที่อยู่ :</b> เลขที่ 106/2 หมู่ 1ต.หนองหิน อ.หนองหิน จ.เลย 42190</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="well">
        <h3><b> ข้อมูลเวลาเปิดร้าน</b></h3><br>
        <p align="left"><img src="img/meeting.png" width="40px" height="40px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>จำนวนที่นั่ง :</b>  7 โต๊ะ</p>
         <p align="left"><img src="img/open.png" width="40px" height="40px">  &nbsp;&nbsp;&nbsp;&nbsp;<b>เวลาเปิด :</b> พุท-จันทร์ 08:00 - 17:30 หยุดทุกวันอังคาร</p><br>
        </div> 
      </div>
      <div class="col-sm-4">
        <div class="well">
        <h3><b> ข้อมูลเพิ่มเติม</b></h3><br>
        <p align="left"><img src="img/checked.png" width="30px" height="30px">  &nbsp;&nbsp;&nbsp; มีสถานที่จอดรถ
         <p align="left"><img src="img/checked.png" width="30px" height="30px">  &nbsp;&nbsp;&nbsp; มี Wi-Fi ฟรี 
         <p align="left"><img src="img/checked.png" width="30px" height="30px">  &nbsp;&nbsp;&nbsp;&nbsp;เหมาะสำหรับทุกวัย
        </div> 
      </div>



      <!-- Google Map-->
      <center>
        <div id="map" style="width:97%;height:500px">
          <script>
            function myMap() {
              var myCenter = new google.maps.LatLng(17.1160685,101.8599768);
              var mapCanvas = document.getElementById("map");
              var mapOptions = {center: myCenter, zoom: 15};
              var map = new google.maps.Map(mapCanvas, mapOptions);
              var marker = new google.maps.Marker({position:myCenter});
              marker.setMap(map);

              var infowindow = new google.maps.InfoWindow({
                content: "Chitangmay Bakery!"
              });
              infowindow.open(map,marker);
            }
          </script>

          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcN4Tm9LmuBEaVDTQ8-uMmVBfr6XTiG5k&callback=myMap" type="text/javascript"></script>
        </div><br> 
      </div>
    </center>
  </div>
</span>

  <!--Footer-->
  <?php include'footer.php'; ?>

</body>
</html>
