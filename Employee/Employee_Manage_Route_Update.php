<?php

require '../connectdb.php';

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$status = $_POST['status'];
$login_id= $_POST['login_id'];
$id_report = $_POST['id_report'];
$type = $_POST['type'];
$tb_id = $_POST['tb_id'];
$zone_id = $_POST['zone_id'];


//จองโต๊ะ
if($_POST['type'] == '0') {

    // update  report to db
    if ($_POST['status']== '1'){
        $query_report = "UPDATE report SET status='1' 
                     WHERE id_report=$id_report
                     AND  login_id = $login_id
    ";
        $result_report = mysqli_query($dbcon, $query_report);


        $query_tbtable = "UPDATE tbtable SET tb_status ='1' 
                     WHERE tb_id=$tb_id
              
    ";
        $result_tbtable = mysqli_query($dbcon, $query_tbtable);


        // update  tbzonetable to db
        $query_tbzonetable = "UPDATE tbzonetable SET zone_status = '1' WHERE zone_id=$zone_id";
        $result_tbzonetable = mysqli_query($dbcon,$query_tbzonetable);


        // update  order_status to db
        $query_order_status = "UPDATE tblogin SET order_status='0' WHERE login_id=$login_id";
        $result_order_status = mysqli_query($dbcon,$query_order_status);



    }
    if ($_POST['status']== '2'){
        $query_report = "UPDATE report SET status='2' 
                     WHERE id_report=$id_report
                     AND  login_id = $login_id
    ";
        $result_report = mysqli_query($dbcon, $query_report);


        $query_tbtable = "UPDATE tbtable SET tb_status ='1' 
                     WHERE tb_id=$tb_id
              
    ";
        $result_tbtable = mysqli_query($dbcon, $query_tbtable);
        $query_tbzonetable = "UPDATE tbzonetable SET zone_status = '1' WHERE zone_id=$zone_id";
        $result_tbzonetable = mysqli_query($dbcon,$query_tbzonetable);



        // update  order_status to db
        $query_order_status = "UPDATE tblogin SET order_status='0' WHERE login_id=$login_id";
        $result_order_status = mysqli_query($dbcon,$query_order_status);



    }









    if ($result_report&$result_tbtable&$result_tbzonetable&$result_order_status) {

        header("Location: Employee_Manage_Order_Food.php?login_id=$login_id&id_report=$id_report&status=$status&type=$type");

    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);


}


//โต๊ะ+อาหาร
if($_POST['type'] == '1') {


    if($_POST['status']== '1'){

        // update  report to db
        echo $login_id;
        echo $id_report;
        echo $tb_id;


        echo $login_id;

        echo $id_report;
        echo $tb_id;

        $query_report = "UPDATE report SET status='1'
                     WHERE id_report=$id_report
                     AND  login_id = $login_id ";
        $result_report = mysqli_query($dbcon, $query_report);


        $query_tbtable = "UPDATE tbtable SET tb_status ='1'
                     WHERE tb_id=$tb_id";
        $result_tbtable = mysqli_query($dbcon, $query_tbtable);


        $query_tbzonetable = "UPDATE tbzonetable SET zone_status = '1' WHERE zone_id=$zone_id";
        $result_tbzonetable = mysqli_query($dbcon,$query_tbzonetable);



        // update  order_status to db
        $query_order_status = "UPDATE tblogin SET order_status='0' WHERE login_id=$login_id";
        $result_order_status = mysqli_query($dbcon,$query_order_status);


    }
    if($_POST['status']== '2'){
        // update  report to db
        $query_report = "UPDATE report SET status='2' 
                     WHERE id_report=$id_report
                     AND  login_id = $login_id ";
        $result_report = mysqli_query($dbcon, $query_report);


        $query_tbtable = "UPDATE tbtable SET tb_status ='1' 
                     WHERE tb_id=$tb_id";
        $result_tbtable = mysqli_query($dbcon, $query_tbtable);


        $query_tbzonetable = "UPDATE tbzonetable SET zone_status = '1' WHERE zone_id=$zone_id";
        $result_tbzonetable = mysqli_query($dbcon,$query_tbzonetable);

        // update  order_status to db
        $query_order_status = "UPDATE tblogin SET order_status='0' WHERE login_id=$login_id";
        $result_order_status = mysqli_query($dbcon,$query_order_status);


    }


    if ($result_report&$result_tbtable&$result_tbzonetable&$result_order_status) {

        header("Location: Employee_Manage_Order_Food.php?login_id=$login_id&id_report=$id_report&status=$status&type=$type");

    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);


}

//อาหารกลับบ้าน
if($_POST['type'] == '2') {

    if($_POST['status']=='1'){
        // update  report to db
        $query_report = "UPDATE report SET status='1' 
                     WHERE id_report=$id_report
                     AND  login_id = $login_id
    ";
        $result_report = mysqli_query($dbcon, $query_report);


        // update  order_status to db
        $query_order_status = "UPDATE tblogin SET order_status='0' WHERE login_id=$login_id";
        $result_order_status = mysqli_query($dbcon,$query_order_status);

    }

    if($_POST['status']=='2'){
        // update  report to db
        $query_report = "UPDATE report SET status='2' 
                     WHERE id_report=$id_report
                     AND  login_id = $login_id
    ";
        $result_report = mysqli_query($dbcon, $query_report);


        // update  order_status to db
        $query_order_status = "UPDATE tblogin SET order_status='0' WHERE login_id=$login_id";
        $result_order_status = mysqli_query($dbcon,$query_order_status);

    }


    if ($result_report&$result_order_status) {

        header("Location: Employee_Manage_Order_Food.php?login_id=$login_id&id_report=$id_report&status=$status&type=$type");

    } else {
        echo "เกิดข้อผิดพลาด" . mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}

?>

</body>
</html>
