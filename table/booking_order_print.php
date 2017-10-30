<?php
//include '../sesstion.php';
require '../connectdb.php';


$login_id = $_POST['login_ids'];
$id_report = $_POST['id_reports'];
$type = $_POST['types'];


if ($_POST['types']=='1'){

    for($i=0;$i<count($_POST['product_code']);$i++){
        echo '<br/> product_code'  . $_POST['product_code'][$i];
//
//     echo '<br/> tb_date' . $_POST['tb_date'][$i];
//     echo '<br/> tb_time' . $_POST['tb_time'][$i];
//     echo '<br/> product_qty' .$_POST["product_qty"][$i];

        echo '<br/> total: ' .$_POST["total"][$i];
        echo '<br/> product_qty: ' .$_POST["product_qty"][$i];
        echo '<br/> login_id'  . $_POST['login_id'][$i];
        echo '<br/> id_report'  . $_POST['id_report'][$i];



        $query = "INSERT INTO orders (pid,tb_total,tb_num,	login_id,id_report)
VALUES('".$_POST['product_code'][$i]."','".$_POST["total"][$i]."','".$_POST["product_qty"][$i]."','".$_POST["login_id"][$i]."','".$_POST["id_report"][$i]."')";
        $results = mysqli_query($dbcon, $query);
    }

    $query_order_status = "UPDATE tblogin SET order_status='1' WHERE login_id=$login_id";
    $result_order_status = mysqli_query($dbcon,$query_order_status);



    if ($results&$result_order_status) {
        header("Location: order_set_page.php?login_id=$login_id&id_report=$id_report&type=$type");
    }else {
        echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}

if ($_POST['types']== '2'){

    for($i=0;$i<count($_POST['product_code']);$i++){
        echo '<br/> product_code'  . $_POST['product_code'][$i];
//
//     echo '<br/> tb_date' . $_POST['tb_date'][$i];
//     echo '<br/> tb_time' . $_POST['tb_time'][$i];
//     echo '<br/> product_qty' .$_POST["product_qty"][$i];

        echo '<br/> total: ' .$_POST["total"][$i];
        echo '<br/> product_qty: ' .$_POST["product_qty"][$i];
        echo '<br/> login_id'  . $_POST['login_id'][$i];
        echo '<br/> id_report'  . $_POST['id_report'][$i];



        $query = "INSERT INTO orders (pid,tb_total,tb_num,	login_id,id_report)
VALUES('".$_POST['product_code'][$i]."','".$_POST["total"][$i]."','".$_POST["product_qty"][$i]."','".$_POST["login_id"][$i]."','".$_POST["id_report"][$i]."')";
        $results = mysqli_query($dbcon, $query);
    }

    $query_order_status = "UPDATE tblogin SET order_status='1' WHERE login_id=$login_id";
    $result_order_status = mysqli_query($dbcon,$query_order_status);



    if ($results&$result_order_status) {
        header("Location: order_set_page.php?login_id=$login_id&id_report=$id_report&type=$type");
    }else {
        echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
    }
    mysqli_close($dbcon);

}



?>
