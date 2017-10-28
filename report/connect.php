<?php
$dbcon = mysqli_connect('localhost','root','123456789','manage');
if (mysqli_connect_errno()){
  echo "ไม่สามารถเชื่อต่อได้". mysqli_connect_error();
  exit;
}
mysqli_set_charset($dbcon, 'utf8');
?>
