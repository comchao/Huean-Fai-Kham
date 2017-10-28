<?php 
    include '../connectdb.php';

    $login_id = $_GET['id'];

    $sql = "SELECT * FROM tblogin WHERE login_id='$login_id'";
    $res_login = mysqli_query($dbcon,$sql);
    $row_login = mysqli_fetch_array($res_login);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>จองโต๊ะอาหาร</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link href="http://fonts.googleapis.com/css?family=PT+Serif+Caption:400,400italic" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.1.min.js" ></script>
<script src="js/superfish.js"></script>
<link href="css2/style-menu.css" rel="stylesheet" type="text/css">
<link href="css2/style-default.css" rel="stylesheet" type="text/css">

<link href="css2/web_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="calendar-mos.css">
<script language="JavaScript" src="calendar.js"></script>

 <link rel="stylesheet" media="all" type="text/css" href="../jquerydatepicker/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="../jquerydatepicker/jquery-ui-timepicker-addon.css" />

    <script type="text/javascript" src="../jquerydatepicker/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../jquerydatepicker/jquery-ui.min.js"></script>

    <script type="text/javascript" src="../jquerydatepicker/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="../jquerydatepicker/jquery-ui-sliderAccess.js"></script>



</head>
<body>
<header>
 
</header>
<section id="content">
  <h1>จองโต๊ะอาหารร้านเฮือนฝ้ายคำ</h1>
            
         <center><form action="insertbooktb.php" method="post" name="form1" enctype="multipart/form-data" class="style3" id="form1" onSubmit="return checkvalue()">
            <table width="65%" height="450" border="0" align="center" cellpadding="1" cellspacing="0">
               
         <tr>
                  <td bgcolor="#ECE9D8"><table width="100%" border="0" cellspacing="10" cellpadding="5" id="rev_table">
                      <tbody>

                        <tr>
                          <td width="27%">ชื่อ</td>
                          <td>
                            <select name="tblogin">
                            <option value=""> -- กรุณาเลือกชื่อของท่าน -- </option>
                            <?php
                              $sql_tblogin = "SELECT * FROM tblogin";
                              $res_tblogin = mysqli_query($dbcon,$sql_tblogin);
                              while ($row_tblogin = mysqli_fetch_assoc($res_tblogin)) {
                                  echo '<option value="'.$row_category['login_id'].'">'.$row_tblogin['login_firstname'].'</option>';
                              }
                            ?>
                            </select>
                        </td> 
                        </tr>
                                  <td width="27%">เลือกโซน</td>
                                  <td>
                                    <select name="tbzonetable">
                                    <option value=""> -- กรุณาเลือกโซน -- </option>
                                    <?php
                                      $sql_tbzonetable = "SELECT * FROM tbzonetable";
                                      $res_tbzonetable = mysqli_query($dbcon,$sql_tbzonetable);
                                      while ($row_tbzonetable = mysqli_fetch_assoc($res_tbzonetable)) {
                                          echo '<option value="'.$row_tbzonetable['zone_id'].'">'.$row_tbzonetable['zone_name'].'</option>';
                                      }
                                    ?>
                                    </select>

                                </td> 

                         <tr>
                          <td width="27%">เลือกโต๊ะ</td>
                          <td>
                            <select name="tbtable">
                            <option value=""> -- กรุณาเลือกโต๊ะ -- </option>
                            <?php
                              $sql_tbtable = "SELECT * FROM tbtable";
                              $res_tbtable = mysqli_query($dbcon,$sql_tbtable);
                              while ($row_tbtable = mysqli_fetch_assoc($res_tbtable)) {
                                  echo '<option value="'.$row_tbtable['tb_id'].'">'.$row_tbtable['tb_number'].'</option>';
                              }
                            ?>
                            </select>
                        </td> 


                        <tr>
                          <td width="27%">จำนวนท่าน</td>
                          <td width="39%"><select name="rev_ppl" id="rev_ppl" validate="required:true">
                            <option value="" selected="selected">จำนวนท่าน</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">15</option>
                            <option value="11">20</option>
                          </select></td>
                          <td width="34%">&nbsp;</td>
                        </tr>

                        <tr>
                          <td width="27%">เลือกวันที่จอง</td>
                          <!-- โหลด เจคิวรี่เดททามมาใช้ -->
                           <div>
                            <div id="startDate">
                            <script type="text/javascript">

                            $(function(){
                              $("#dateInput").datepicker({
                                dateFormat: 'dd-mm-yy', 
                                numberOfMonths: 2,
                              });
                            });

                            </script>
                            <td width="39%"><input type="text" name="dateInput" id="dateInput" value="" /></td> 

                            </div>
                          
                      </tr>
                       
                        
                        <tr>
                          <td width="27%">เลือกเวลา</td>
                          <td width="39%"><select name="time_hour" id="time_hour" tabindex="7">
                            <option value="10">10.00</option>
                            <option value="11">11.00</option>
                            <option value="12">12.00</option>
                            <option value="13">13.00</option>
                            <option value="14">14.00</option>
                            <option value="15">15.00</option>
                            <option value="16">16.00</option>
                            <option value="17">17.00</option>
                            <option value="18">18.00</option>
                            <option value="19">19.00</option>
                            <option value="20">20.00</option>
                            <option value="21">21.00</option>
                            <option value="22">22.00</option>
                          </select>
                          <td width="34%">&nbsp;</td>
                        </tr>
                     
                       
                           
                          </select></td>
                          <td width="34%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="27%" class="goright">&nbsp;</td>
                          <td width="39%" class="goright"><input name="act" type="hidden" value="save" />
                          <input type="submit" name="button0" id="button0" value="ยืนยันข้อมูลการจองโต๊ะ" class="btn" />
                          <br><br><a href="../indexMain/index.php">กลับหน้าหลัก</a>
                            <span class="style59">
                            <script language="JavaScript" type="text/javascript">


            
    //============  ตรวจสอบค่าว่าง
                       
              /*function checkvalue()
              {
              
                  if(document.form1.dateInput.value=="")
                  {
                  alert('กรุณาเลือกวันที่');
                  document.form1.dateInput.focus();
                  return false;
                  }
                  if(document.form1.tblogin.value=="")
                  {
                  alert('กรุณาเลือกชื่อ');
                  document.form1.tblogin.focus();
                  return false;
                  }
                  if(document.form1.tbzonetable.value=="")
                  {
                  alert('กรุณาเลือกโซน');
                  document.form1.tbzonetable.focus();
                  return false;
                  }
                  
              }*/
                </script>
                            </span>
                            <input name="add" type="hidden" id="add" value="True" /></td>
                          <td width="34%" class="goright">&nbsp;</td>
                        </tr>
                      </tbody>
                   </table></td>
                </tr>
         <tr>
                  <td bgcolor="#ECE9D8">&nbsp;</td>
                  <!--<iframe scrolling="no" frameborder="no" clocktype="html5" 
                  style="overflow:hidden;border:0;margin:0;padding:0;width:300px;height:75px;"
                  src="http://www.clocklink.com/html5embed.php?clock=038&timezone=ICT&color=gray&size=300&Title=&Message=&Target=&From=2017,1,1,0,0,0&Color=gray"></iframe> -->
                </tr>
              </table>
            </form></center> 
</section>
</body>
</html>