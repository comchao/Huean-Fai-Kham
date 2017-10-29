<!-- ลิ้ง css hder -->
<?php
  include '../connectdb.php';
//  $login_id = $_GET['login_id'];

  $sql = "SELECT * FROM tblogin ";
  $res_login = mysqli_query($dbcon,$sql);
  $result_login = mysqli_query($dbcon,$sql);
?>
<?php
  include "../testhd/css/css.css"
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Huean-Fai-Kham</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../secure/index.php">Huean-Fai-Kham</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../secure/index.php"><span class="glyphicon glyphicon-home " aria-hidden="true"></span>หน้าแรก</a></li>
        <li><a href="../testhd/news.php"><span class="glyphicon glyphicon-bullhorn " aria-hidden="true">ข่าวประชาสัมพันธ์</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> บริการ<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="../table/reservations_in.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"> จองโต๊ะ/สั่งอาหาร</a></li>
            <li><a href="../table/memshowdatafood.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> สั่งอาหารกลับบ้าน</a></li>
          </ul>
        </li>
        <li><a href="../testhd/memshowdatafood.php"><span class="glyphicon glyphicon-camera" aria-hidden="true">รีวิวรสชาติอาหาร</a></li>


      </ul>
<ul class="nav navbar-nav navbar-right">
      <li>
               <?php
                  if(isset($_SESSION['is_Member'])){
               ?>
          
                  
                    
                    <a href="#"> ยินดีต้อนรับคุณ : <?php echo $s_login_username; ?></a>
                
                      <li>
                        <a href="../logout.php"> ออกจากระบบ</a>
                      </li>
                  <?php }else { ?>
                    
                  <ul class="nav navbar-nav navbar-right">
                  <!--<li >
                     <a href="../secure/frm_register.php"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a>
                  </li>-->
                  <li onclick="document.getElementById('id01').style.display='block'" >
                     <a href="#"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a>
                  </li>

                  
                  <?php } ?>
              </li>
       </ul>
          
          <!-- popup login -->
          <div id="id01" class="modal">
            
            <form action="../secure/login.php" class="modal-content animate" method="post" >
              <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="../testhd/img/img_avatar2.png" alt="Avatar" class="avatar">
              </div>

              <div class="container">
                <label><b>Username</b></label><br>
                <input type="text" placeholder="Username" id="username" name="username" required autofocus />
                  <br>
                <label><b>Password</b></label><br>
                <input type="password" placeholder="Password" id="password" name="password" required autofocus />
                  <br> <br>

                <button type="submit">เข้าสู่ระบบ</button><br> <br>
                <a href="../secure/frm_register.php">ลงทะเบียน</a>
              </div>

              
              </div>
            </form>
          </div>

          <script>
          // Get the modal
          var modal = document.getElementById('id01');

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }
          </script>


           <!-- popup สมัครสมาชิก -->
          <div id="id012" class="modal">
            
            <form action="../testhd/Register.php" class="modal-content animate" method="post" >
              <div class="imgcontainer">
                <span onclick="document.getElementById('id012').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!--<img src="../testhd/img/img_avatar2.png" alt="Avatar" class="avatar">-->
              </div>

              <div class="container">
                <label><b>Firstname</b></label>
                <input type="text" placeholder="Firstname" id="firstname" name="firstname" required autofocus />
                  <br>
                <label><b>Lastname</b></label>
                <input type="text" placeholder="Lastname" id="lastname" name="lastname" required autofocus />
                  <br> 
                <label><b>Email</b></label>
                <input type="email" placeholder="Email" id="email" name="email" required autofocus />
                  <br> 
                <label><b>Username</b></label>
                <input type="text" placeholder="User Name" id="username" name="username" required autofocus />
                  <br> 
                <label><b>Password</b></label>
                <input type="password" placeholder="Password" id="password" name="password" required autofocus />
                  <br> 
                <label><b>Address</b></label>
                <input type="text" placeholder="Address" id="address" name="address" required autofocus />
                  <br> 
                <label><b>Phone</b></label>
                <input type="text" placeholder="Phone" id="phone" name="phone" required autofocus />
                  <br>
                <br>
                  <!--<input type="submit" class="uk-button" value="สมัครสมาชิก"> -->
                  <!--<input type="submit" class="uk-button" onclick="return confirm('สมัครสมาชิกเรียบร้อยเเล้ว')" value="สมัครสมาชิก" />-->
                <button type="submit" >สมัครสมาชิก</button><br> 
              </div>
              </div>
            </form>
          </div>

          <script>
          // Get the modal
          var modal = document.getElementById('id012');

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }
          </script>

      </ul>
    </div>
  </div>
</nav>
  
</body>
</html>

