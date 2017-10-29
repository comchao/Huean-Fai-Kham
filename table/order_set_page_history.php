<?php
if(!isset($_SESSION))
{
    session_start();

}
$login_id  = $_POST['login_id'];
$id_report  = $_POST['id_report'];

$type  = $_POST['type'];


include_once("config.php");
require '../connectdb.php';

//หน้าจองแต่โต๊ะ
if($type== '0'){

    header("Location: user_order_tabel.php?id_report=$id_report&login_id=$login_id");
}
//หน้าจองแต่โต๊ะ+อาหาร
if($type== '1'){

    header("Location: user_order_tabel_food.php?id_report=$id_report&login_id=$login_id");
}


//อาหารกลับบ้าน
if($type== '2'){

    header("Location: user_order_home.php?id_report=$id_report&login_id=$login_id");
}





$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>


</body>
</html>
