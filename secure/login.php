<?php
    require '../connectdb.php';

    $login_username = mysqli_real_escape_string($dbcon,$_POST['username']);
    $login_password = mysqli_real_escape_string($dbcon,$_POST['password']);

    $salt = 'asdfasdf';
    $hash_login_password = hash_hmac('sha256',$login_password,$salt);

    $sql = "SELECT * FROM tblogin WHERE login_username=?
    AND login_password=?";

    //ลองดู
 
    $stmt = mysqli_prepare($dbcon, $sql);
    mysqli_stmt_bind_param($stmt,"ss", $login_username,$hash_login_password);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);
	  
    if ($result_user->num_rows == 1) {
        session_start();
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $_SESSION['login_id'] = $row_user['login_id'];
		$_SESSION['name'] = $row_user['login_firstname'];
        $_SESSION['lname'] = $row_user['login_lastname'];
        
        
        if ($row_user['login_status']== 500){
        $_SESSION['is_Ownershop'] = 500;
        header("Location: ../owners/OwnerMain.php");
        }  
        
        else{
        $_SESSION['is_Employee'] = 100;
        header ("Location: ../Employ/Employee_manage.php");
        }
        
        if ($row_user['login_status']== 0){
        $_SESSION['is_Member'] = 0;
        header("Location: ../secure/main.php");
    }
    } else {
      echo "ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาเข้าสู่ระบบอีกครั้ง";
  }
