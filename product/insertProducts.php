<?php

    include '../connectdb.php';

    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $price =$_POST['price'];
    $category_id =$_POST['category'];

    //upload Image unigid ค่าสุ่ม
    $image_ext = pathinfo(basename($_FILES['img']['name']),PATHINFO_EXTENSION);
    $new_image_name = 'news_'.uniqid().".".$image_ext;
    $image_path = "img/";
    $image_upload_path = $image_path.$new_image_name;
    $success = move_uploaded_file($_FILES['img']['tmp_name'],$image_upload_path);
    if ($success==false) {
        echo "ไม่สามารถ upload รูปภาพได้";
        exit;
    }


//insert Data
  $sql = " INSERT INTO product (detail,img,price,name,category_id)
           VALUES ('$detail','$new_image_name','$price','$name','$category_id')";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../product/frominsertProduct.php");
  //  echo "บันทึกข้อมูลเรียบร้อย";
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }

 ?>

