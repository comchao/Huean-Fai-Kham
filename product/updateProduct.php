<?php 
  
  include '../connectdb.php';

    $pid = $_POST['id']; 
    $detail = $_POST['detail'];
    $price =$_POST['price'];
    $name = $_POST['name'];
    $category_id =$_POST['category'];

     if (is_uploaded_file($_FILES['img']['tmp_name'])) {
//delete old image ลบรูปเก่า
      $sql_select = "SELECT img FROM product WHERE pid='$pid'";
      $result_image = mysqli_query($dbcon, $sql_select);
      $row_image = mysqli_fetch_assoc($result_image);
      $image_old = $row_image['img'];
      unlink("img/".$image_old);


//upload Image unigid ค่าสุ่ม
      $image_ext = pathinfo(basename($_FILES['img']['name']),PATHINFO_EXTENSION);
      $new_image_name = 'news_'.uniqid().".".$image_ext;
      $image_path = "img/";
      $image_upload_path = $image_path.$new_image_name;
      $success = move_uploaded_file($_FILES['img']['tmp_name'],$image_upload_path);
      $sql_image = "UPDATE product SET img='$new_image_name' WHERE pid='$pid'";
      mysqli_query($dbcon, $sql_image);

      if ($success==false) {
          echo "ไม่สามารถ upload รูปภาพได้";
          exit();
      }
    }

//update Data
  $sql = "UPDATE product 
          SET   detail='$detail',
                price='$price',
                name='$name',
                category_id='$category_id'
          WHERE pid='$pid'";
  $result = mysqli_query($dbcon, $sql);

  if ($result) {
    header("Location: ../product/frominsertProduct.php");
    //  echo "บันทึกข้อมูลเรียบร้อย";
  }else {
    echo "เกิดข้อผิดพลาด ". mysqli_error($dbcon);
  }

 ?>
