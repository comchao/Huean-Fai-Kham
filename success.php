<?php
   include 'connectdb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php include 'popup/popup.css' ?>
<br>
<br>

<div class="container">
  <div class="alert alert-success">

    <?php
      if ($_GET['code'] == 1) {
    ?>
      <div class="uk-alert uk-alert-success">สมัครสมาชิกเรียบร้อยเเล้ว</div>
    <?php } ?>

    <?php
      if ($_GET['code'] == 2) {
    ?>
      <div class="uk-alert uk-alert-danger">หน้านี้สำหรับสมาชิกเท่านั้น กรุณาลงทะเบียน</div>;
    <?php } ?>
    <br>
    <!--<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
  <?php include 'popup/popup.php' ?>-->
  </div>
</div>



</body>
</html>
