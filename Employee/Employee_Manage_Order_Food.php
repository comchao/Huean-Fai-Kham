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
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">รายการสั่งอาหาร</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสออเดอร์</th>
                                <th>ชื่อลูกค้า</th>
                                <th>โซน</th>
                                <th>วัน/เดือน/ปี เวลา</th>
                                <th>สถานะ</th>
                                <th>ดูรายละเอียด</th>




                            </tr>
                            </thead>
                            <tbody>

                            <input id="tb_id" type="hidden" class="form-control" name="tb_id">
                            <?php
                            $sql = "SELECT * FROM report INNER
JOIN tblogin ON report.login_id = tblogin.login_id 
ORDER BY report.id_report DESC 
";
                            $res = mysqli_query($dbcon,$sql);
                            $i=0 ;
                            $tb_total = 0;

                            while ($row = mysqli_fetch_assoc($res))
                            {
                                ?>

                                <tr>
                                    <td><div align=""><?php echo $i+1?></div></td>
                                    <td><?php echo $row["id_report"];?></td>
                                    <td><?php echo $row["login_firstname"];?> <?php echo $row["login_lastname"];?></td>
                                    <td><?php echo $row["date_time"];?></td>
                                    <td>

                                        <?php if ($row["status"] == '0') {

                                            echo '<div style="background-color: #fff4b0"><b>ยังไม่ชำระ</b> </div>';
                                        }?>
                                        <?php if ($row["status"] == '1') {

                                            echo '<div style="background-color: lightblue"><b>ชำระเเล้ว</b> </div>';
                                        }?>
                                        <?php if ($row["status"] == '2') {

                                            echo '<div style="background-color: #dca7a7"><b>ยกเลิก</b> </div>';
                                        }?>

                                        <?php if ($row["status"] == '3') {
                                            echo '<div style="background-color: #dca7a7"><b>เกินเวลา</b> </div>';
                                        }?>

                                    <td>

                                        <?php if ($row["type"] == '0') {
                                            echo'จองโต๊ะ';
                                        }?>
                                        <?php if ($row["type"] == '1') {
                                            echo'จองโต๊ะ+อาหาร';
                                        }?>
                                        <?php if ($row["type"] == '2') {
                                            echo'สั่งกลับบ้าน';
                                        }?>

                                    </td>
                                    <td>
                                        <form action="Employee_Manage_Route.php?status=<?php echo $row["status"];?>&login_id=<?php echo $row["login_id"];?>&id_report=<?php echo $row["id_report"];?>&type=<?php echo $row["type"];?>" method="post">
                                            <button type="submit" class="btn btn-group" style="width: 100px">
                                                รายละเอียด
                                            </button>

                                        </form>
                                    </td>

                                </tr>



                                <?php
                                $i++;

                            }



                            ?>
                            <td</td>






                            </tbody>
                        </table>



                    </div>


                </div>
            </div>
        </div>
    </div>
    </form>




    <br>   <br>   <br>




</div>
</form>




<!-- Scripts -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>