<?php
//include '../sesstion.php';
require '../connectdb.php';



$login_id =$_POST['login_id'];
$id_report = $_POST['id_reports'];
$type = $_POST['types'];
$set_date_time = $_POST['set_date_time'];


$id_table = null;
$tb_date = null;
$tb_time = null;
$id_table = null;
$zone_id = null;

echo $_GET["id_reports"].'<br>';


if(isset($_POST['id_table']))
{

    $id_table = $_POST['id_table'];
//วันที่
    $tb_date = $_POST['tb_date'];
//เวลา
    $tb_time = $_POST['tb_time'];
//โซนโต๊ะ
    $zone_id = $_POST['zone_id'];
}



if ($_POST['types']=='1'){

    for($i=0;$i<count($_POST['product_code']);$i++) {
        echo '<br/> product_code' . $_POST['product_code'][$i];
//
//     echo '<br/> tb_date' . $_POST['tb_date'][$i];
//     echo '<br/> tb_time' . $_POST['tb_time'][$i];
//     echo '<br/> product_qty' .$_POST["product_qty"][$i];

        echo '<br/> total: ' . $_POST["total"][$i];
        echo '<br/> product_qty: ' . $_POST["product_qty"][$i];
        echo '<br/> login_id' . $_POST['login_id'][$i];
        echo '<br/> id_report' . $_POST['id_report'][$i];



        $query = "INSERT INTO orders (pid,tb_total,tb_num,	login_id,id_report)
        VALUES('".$_POST['product_code'][$i]."','".$_POST["total"][$i]."','".$_POST["product_qty"][$i]."','".$_POST["login_id"][$i]."','".$_POST["id_report"][$i]."')";
          $results = mysqli_query($dbcon, $query);
      }

      $query_order_status = "UPDATE tblogin SET order_status='1' WHERE login_id='".$_GET["login_id"]."'";
      $result_order_status = mysqli_query($dbcon,$query_order_status);


    $sql_tbtable = "UPDATE tbtable SET tb_status = '0'
WHERE tb_id = $id_table";
    $results_tbtable = mysqli_query($dbcon,$sql_tbtable);



    // insert  report to db
    $query_report = "INSERT INTO report(id_report,login_id,status,type)
             VALUES('".$_GET["id_report"]."','".$_GET["login_id"]."','0','$type')";
    $result_report = mysqli_query($dbcon, $query_report);




    // insert  booktb to db
    $query_booktb = "INSERT INTO booktb(id_table,tb_date,tb_time,zone_id,login_id,id_report)
              VALUES('$id_table','$tb_date','$tb_time','$zone_id','".$_GET["login_id"]."','".$_GET["id_report"]."')";
    $result_booktb = mysqli_query($dbcon, $query_booktb);


   $id_log =  $_GET["login_id"];
    $id_re =  $_GET["id_report"];



    if ($results&$result_order_status) {
          header("Location: order_set_page.php?login_id=$id_log&id_report=$id_re&type=$type&tb_id=$id_table&zone_id=$zone_id");
      }else {
          echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
      }
      mysqli_close($dbcon);
    }


if ($_POST['types'] ==  '2') {



    $id_report;
    $id_ar=[];
    $sql = "SELECT MAX(id_report) as Id_report FROM report";
    $res = mysqli_query($dbcon,$sql);
    while ($row = mysqli_fetch_assoc($res)) {


        $id_report=$row["Id_report"]+1;
        $id_ar=$row["Id_report"]+1;

    }

    echo $std_id="".sprintf("%09d",$id_report);

    echo $std2_id="".sprintf("%09d",$id_ar);

    for($i=0;$i<count($_POST['product_code']);$i++) {
        echo '<br/> product_code' . $_POST['product_code'][$i];

        /*   echo '<br/> tb_date' . $_POST['tb_date'][$i];
           echo '<br/> tb_time' . $_POST['tb_time'][$i];*/
        echo '<br/> product_qty' .$_POST["product_qty"][$i];

        echo '<br/> total: ' . $_POST["total"][$i];
        echo '<br/> product_qty: ' . $_POST["product_qty"][$i];
        echo '<br/> login_id: ' . $_POST["login_id"][$i];

        echo '<br/> login_id: ' . $_POST["login_id"][$i];
        echo '<br/> Id_report: ' . $std2_id;




        $query = "INSERT INTO orders (pid,tb_total,tb_num,  login_id,id_report)
 VALUES('".$_POST['product_code'][$i]."','".$_POST["total"][$i]."','".$_POST["product_qty"][$i]."','".$_POST["login_id"][$i]."','".$std2_id."')";
        $results = mysqli_query($dbcon, $query);
    }

    $query_order_status = "UPDATE tblogin SET order_status='1' WHERE login_id= '".$_GET["login_id"]."'";
    $result_order_status = mysqli_query($dbcon,$query_order_status);


    // insert  report to db
    $query_report = "INSERT INTO report(id_report,login_id,status,type,set_date_time)
             VALUES('$std_id','".$_GET["login_id"]."','0','2','$set_date_time')";
    $result_report = mysqli_query($dbcon, $query_report);



    if ($results&$result_order_status&$result_report) {
        header("Location: order_set_page.php?login_id='".$_GET["login_id"]."'&id_report=$std_id&type=2");
    }else {
        echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
    }
    mysqli_close($dbcon);


}



?>

