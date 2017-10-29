<?php
include '../session.php';
include '../connectdb.php';

$sql = "SELECT * FROM tblogin ";
$res_login = mysqli_query($dbcon,$sql);
$result_login = mysqli_query($dbcon,$sql);
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$login_id  = $_GET['login_id'];
$id_report  = $_GET['id_report'];
?>

<!DOCTYPE HTML>
<!--
  Verti by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>รายการจองโต๊ะ</title>
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
<?php //echo $login_id; ?><!--<br>-->
<?php //echo $id_report; ?><!--<br>-->
<div id="page-wrapper">
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">รายการจองโต๊ะ</div>

                    <div class="panel-body">
                        <?php
                        $sql = "SELECT * FROM booktb 
                        JOIN tbtable ON booktb.id_table = tbtable.tb_id
                        JOIN tbzonetable ON booktb.zone_id = tbzonetable.zone_id
                        JOIN tblogin ON booktb.login_id = tblogin.login_id
                        JOIN report ON booktb.id_report = report.id_report
                        WHERE  booktb.login_id = $login_id 
                        AND  booktb.id_report = $id_report
                        AND  report.type =  '0'";
                        $res = mysqli_query($dbcon,$sql);

                        while ($row = mysqli_fetch_assoc($res))
                        {
                        if ($login_id == $row['login_id']&$row['id_status']!='1') {
                        ?>



                        <center>

                            คุณ: <?php echo $row['login_firstname']; ?>  <?php echo $row['login_lastname']; ?> <br>
                            ที่อยู่: <?php echo $row['login_address']; ?> <br>
                            อีเมล์: <?php echo $row['login_email']; ?>
                            <?php echo $row['login_phone']; ?><br>
                            วันที่จอง: <?php echo $row['tb_date']; ?>
                            เวลา: <?php echo $row['tb_time']; ?>
                            เวลาที่จอง: <?php echo $row['update_time']; ?><br>
                            โต๊ะ: <?php echo $row['tb_numchair']; ?>
                            โซน: <?php echo $row['zone_name']; ?><br>



                            <?php  }}



                            ?>


                            <center>
                                <div class="form-group" style="margin-left: 200px;">
                                    <div class="">
                                        <h4>ยอดรวมรวม:  <?php echo  "0";?> บาท<br><br></h4>

                                        <form class="uk-form" action="order_set_update.php" method="post">
                                            <input id="name" type="hidden" class="form-control" name="login_id" value="<?php echo  $login_id;?>"?>
                                            <input id="name" type="hidden" class="form-control" name="id_report" value="<?php echo  $id_report;?>"?>
                                            <input id="name" type="hidden" class="form-control" name="type" value="0">

                                            <button type="submit" class="btn btn-danger" style="width: 130px">
                                                ยกเลิกการสั่ง
                                            </button>
                                            <button type="button" class="btn btn-group" style="width: 130px" onclick="myFunction()">
                                                พิมพ์ใบเสร็จ
                                            </button>
                                        </form>


                                    </div>
                                </div>
                            </center>


                    </div>


                </div>
            </div>
        </div>
    </div>





    <br>   <br>   <br>




</div>
</form>



<input type="hidden" name="return_url" value="<?php
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
<!-- Scripts -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>


<script>
    function myFunction() {
        window.print();
    }
</script>

</body>
</html>