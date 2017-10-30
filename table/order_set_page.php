<?php
if(!isset($_SESSION))
{
    session_start();

}
include_once("config.php");
require '../connectdb.php';

$login_id  = $_GET['login_id'];
$id_report  = $_GET['id_report'];

$type  = $_GET['type'];

echo '<br/> $login_id' . $login_id;
echo '<br/> $id_report' . $id_report;
echo '<br/> $type' . $type;


//หน้าจองแต่โต๊ะ
if($type== '0'){

    header("Location: user_order_tabel.php?id_report=$id_report&login_id=$login_id&type=$type");
}
//หน้าจองแต่โต๊ะ+อาหาร
if($type== '1'){

    header("Location: user_order_tabel_food.php?id_report=$id_report&login_id=$login_id&type=$type");
}


//อาหารกลับบ้าน
if($type== '2'){

    header("Location: user_order_home.php?id_report=$id_report&login_id=$login_id&type=$type");
}





$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>


</body>
</html>
