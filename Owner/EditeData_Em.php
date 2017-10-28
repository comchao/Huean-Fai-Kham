<?php
    require '../connectdb.php';
    include '../connectdb.php';

    $login_id = $_GET['id'];

    $sql = "SELECT * FROM tblogin WHERE login_id='$login_id'";
    $res_login = mysqli_query($dbcon,$sql);
    $row_login = mysqli_fetch_array($res_login);

 ?>
 
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>แก้ไขข้อมูลสมาชิก</title>
<!-- ใช้ css styleEditdata_Em.css-->
<link rel="stylesheet" type="text/css" href="../css/styleEditdata_Em.css" />
</head>
<body>
<div class="container">
    <section id="content">
        <form action="">
            <h1>แก้ไขข้อมูลลูกค้า รหัส <?php echo $login_id; ?></h1>
            <img class="uk-margin-bottom" width="110" height="100" src="../images/preferences-contact-list.png" alt="">
            <br>
            <br>
            <div>
                <input type="text" placeholder="ชื่อ" id="username"
                value="<?php echo $row_login['login_firstname']; ?>" required/>
            </div>
            <div>
                <input type="text" placeholder="สกุล" id="username"
                value="<?php echo $row_login['login_lastname']; ?>" required/>
            </div>
            <div>
                <input type="text" placeholder="Username" id="username"
                value="<?php echo $row_login['login_username']; ?>"  required/>
            </div>
             <div>
                <input type="password" placeholder="Password" id="password"
                value="<?php echo $row_login['login_password']; ?>" required/>
            </div>
            <div>
                <input type="text" placeholder="Address" id="username"
                value="<?php echo $row_login['login_address']; ?>" required/>
            </div>
            <div>
                <input type="text" placeholder="Phone" id="username"
                value="<?php echo $row_login['login_phone']; ?>" required/>
            </div>
            <div>
                <input type="text" placeholder="Email" id="username"
                value="<?php echo $row_login['login_email']; ?>" required/>
            </div>

            <div>
                <input type="submit" value="บันทึก" />
                <a href="../Owner/Ownershop.php">กลับหน้าหลัก</a>
            </div>
        </form><!-- form -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>