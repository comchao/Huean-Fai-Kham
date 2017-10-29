<?php

require '../connectdb.php';

$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$status = $_GET['status'];
$login_id= $_GET['login_id'];
$id_report = $_GET['id_report'];
$type = $_GET['type'];

//จองโต๊ะ
if($_GET['type'] == '0') {

    header("Location: Employee_Manage_Order_Tabel_Details.php?login_id=$login_id&id_report=$id_report&status=$status&type=$type");

}


//โต๊ะ+อาหารกลับบ้าน
if($_GET['type'] == '1') {

    header("Location: Employee_Manage_Order_Food_Details.php?login_id=$login_id&id_report=$id_report&status=$status&type=$type");

}

//อาหารกลับบ้าน
if($_GET['type'] == '2') {


    header("Location: Employee_Manage_Order_Food_Details.php?login_id=$login_id&id_report=$id_report&status=$status&type=$type");
}
?>


</body>
</html>
