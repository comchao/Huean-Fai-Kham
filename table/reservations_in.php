<?php
include '../session.php';
include '../connectdb.php';

$sql = "SELECT * FROM tblogin ";
$res_login = mysqli_query($dbcon,$sql);
$result_login = mysqli_query($dbcon,$sql);
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
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="../testhd/css/bootstraps.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>


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
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">สถานะโต๊ะ</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ลำดับ	</th>
                                <th>หมายเลขโต๊ะ</th>
                                <th>จำนวนเก้าอี้</th>
                                <th>โซนโต๊ะ</th>
                                <th>สถานะ	</th>

                            </tr>
                            </thead>
                            <tbody>

                            <input id="tb_id" type="hidden" class="form-control" name="tb_id">
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

                                </tr>



                                <?php

                            }


                            ?>


                            </tbody>
                        </table>



                    </div>


                </div>
            </div>
        </div>
    </div>
    </form>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">จองโต๊ะ</div>

                    <div class="panel-body">

                        <form class="uk-form" action="cart_set_page.php" method="post">


                            <div>
                                <label for="name" class="col-md-4 control-label">วันที่	</label>

                                <div class="col-md-6">
                                    <input id="name" type="date" class="form-control" name="tb_date" value="" required >


                                </div>
                                <br> <br>
                            </div>

                            <div class="">
                                <label for="name" class="col-md-4 control-label">เวลา	</label>

                                <div class="col-md-6">
                                    <input id="name" type="time" class="form-control" name="tb_time" value="" required >


                                    <?php
                                    if(isset($_SESSION['is_Member'])){
                                        ?>




                                        <input id="name" type="hidden" class="form-control" name="login_id" value="<?php echo $s_login_id; ?>" required >










                                    <?php }else { ?>

                                    <?php } ?>


                                </div>
                                <br> <br>
                            </div>



                            <div>
                                <label for="name" class="col-md-4 control-label">โซนโต๊ะ		</label>

                                <div class="col-md-6">
                                    <select  class="form-control" name="zone_id">
                                        <?php
                                        $sql_zonetable = "SELECT * FROM tbzonetable";
                                        $res_zonetable = mysqli_query($dbcon,$sql_zonetable);
                                        while ($row_zonetable = mysqli_fetch_assoc($res_zonetable)) {
                                            if ($row_zonetable['zone_id'] == $row_zonetable['zone_id']) {
                                                echo '<option value="'.$row_zonetable['zone_id'].'" selected>'.$row_zonetable['zone_name'].'</option>';;
                                            }else {
                                                echo '<option value="'.$row_zonetable['zone_id'].'">'.$row_zonetable['zone_name'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>

                                    </select>

                                    </select>




                                </div>
                                <br> <br>
                            </div>

                            <div class=""">
                            <label for="name" class="col-md-4 control-label">หมายเลขโต๊ะ		</label>

                            <div class="col-md-6">
                                <select  class="form-control" name="id_table">
                                    <?php
                                    $sql_zonetable = "SELECT * FROM tbtable";
                                    $res_zonetable = mysqli_query($dbcon,$sql_zonetable);
                                    while ($row_zonetable = mysqli_fetch_assoc($res_zonetable)) {
                                        if ($row_zonetable['tb_status'] != "0") {
                                            echo '<option value="'.$row_zonetable['tb_id'].'" selected>'.$row_zonetable['tb_numchair'].'</option>';;
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <br> <br>
                    </div>






                    <div class="">
                        <label for="name" class="col-md-4 control-label">ไม่เลือกอาหาร	</label>

                        <div class="col-md-6">
                            <input id="name" type="radio" class="" name="type" value="0"  required>


                        </div>
                        <br> <br>
                    </div>

                    <div class="">
                        <label for="name" class="col-md-4 control-label">เลือกอาหาร </label>

                        <div class="col-md-6">
                            <input id="name" type="radio" class="" name="type" value="1" required />
                            <?php

                            $id_report;
                            $sql = "SELECT MAX(id_report) as Id_report FROM report";
                            $res = mysqli_query($dbcon,$sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id_report=$row["Id_report"]+1;

//
                            }





                            ?>

                            <input id="name" type="hidden" class="" name="id_report" value="<?php echo $std_id="".sprintf("%09d",$id_report); ?>"  />

                        </div>
                        <br> <br>
                    </div>





                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
<!--                            <button type="submit" class="btn btn-primary">-->
<!--                                ยืนยันการทำรายการ-->
<!--                            </button>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                ยีนยันไม่เลือกอาหาร
                            </button>

                            <button type="submit" class="btn btn-primary">
                                ยีนยันเลือกอาหาร
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php


    $sql = "SELECT* FROM report WHERE id_report =  '".$_GET['id_report']."''";
    $res = mysqli_query($dbcon,$sql);
    while ($row = mysqli_fetch_assoc($res)){


        ?>
        <form class="uk-form" action="user_order.php?login_id=<?php echo $_GET['login_id']?>&id_report=<?php echo $_GET['id_report'];?>" method="post">

            <center>  <button type="submit" class="btn btn-danger" style="width: 130px">
                    ดูรายการสั่งอาหาร
                </button> <br>
                <h4> *ท่านสามารถสั่งอาหารได้ครั้งละ1ออเดอร์เท่านั้น</h4>
            </center>
        </form>

        </form>



    <?php   }
        ?>





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