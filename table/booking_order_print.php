<?php
//include '../sesstion.php';
require '../connectdb.php';




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
if ($results) {
    header("Location: reservations_in.php?login_id=$login_id&id_report=$id_report");
}else {
    echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
}
mysqli_close($dbcon);




//foreach ($_POST as $key => $value) {
//
//    $product_code = $_POST['product_code']; //tb_time//
//    $login_id = $_POST['login_id']; //  login_id
//    $tb_date = $_POST['tb_date']; //tb_date
//    $tb_time = $_POST['tb_time']; //tb_time
//    $product_qty = $_POST['product_qty']; //
//    $subtotal = $_POST['total'];//
//
//
//
//
//    $query = "INSERT INTO orders (pid,login_id,tb_time,	tb_date,tb_num,tb_total)
//VALUES('$product_code','$login_id','$tb_time','$tb_date','$product_qty','$subtotal')";
//    $results = mysqli_query($dbcon, $query);
//
//}
//
//
//
//if ($results) {
//    header("Location:index.php");
//}else {
//    echo "เกิดข้อผิดพลาด".mysqli_error($dbcon);
//}
//mysqli_close($dbcon);

//set variables to use in content below





?>
