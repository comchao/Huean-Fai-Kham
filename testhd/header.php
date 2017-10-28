<link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">
<span style="font-family: 'Sriracha', cursive;">
  <nav class="navbar navbar-inverse bg-primary" style="background-color: black; font-size: 17px;">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" >
          <li><a class="navbar-brand" href="index.php">ChiTungMay</a></b></li>       
          <li><a href="index.php"><img src="img/birthday.png" width="30px" height="30px"> หน้าหลัก</a></li>
          <li><a href="about.php"><img src="img/muffin.png" width="30px" height="30px">  เกี่ยวกับร้าน</a></li>
          <li><a href="menu1.php"><img src="img/muffin1.png" width="30px" height="30px">  รายการเบเกอรี่</a></li>
          <li><a href="makecake.php"><img src="img/cake.png" width="30px" height="30px">  เเต่งหน้าเค้ก</a></li>
          <ul class="nav navbar-nav navbar-right" >
                  <li>
                        <?php
                    if(isset($_SESSION['is_member'])){
                      
                    ?>
                    
                    <li> <a href="order/view_order.php">ตะกร้าสินค้าของฉัน</a></li>
                    <li>
                      <a href="logout.php"> ออกจากระบบ</a>
                    </li>

                    
                    <?php }else { ?>
                            <a data-toggle="modal" data-target="#myModal" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">เข้าสู่ระบบ<span class="caret"></span>
                            </a>
                          <?php } ?>
                </li>
          </ul>
                   
        <div class="container">
    <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                   <div class="modal-dialog modal-sm-10" >
                         <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">ลงชื่อเข้าใช้งาน</h3>
                          </div><br>

                      <div class="modal-body">
                            <form action="login.php" method="POST">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
                                </div><br>
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                  <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                              </div>
                              <br><a href="flm_register.php"> สมัครสมาชิก</a>
                    </div>
                    <div class="modal-footer">

                      <button style ="background-color: black" type="submit" name="submit" class="btn btn-info">Sign Up</button>
                      <button style ="background-color: #FF0033" type="button" class="btn btn-info" data-dismiss="modal">Close</button>

                    </div>
          </form>
        </div>
      </div>
    </div>
    </div>
        </ul>
        

        </li>
      </div>
    </div>
  </nav>
</span>

