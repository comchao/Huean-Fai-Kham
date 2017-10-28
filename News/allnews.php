<?php
    session_start();
    include '../connectdb.php';

    $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype 
            ON tbnews.newstype_id=tbnewstype.newstype_id 
            ORDER BY news_id DESC ";
    $res_news = mysqli_query($dbcon,$sql);

 ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>ข่าวประชาสัมพันธ์</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<meta http-equiv="Content-Language" content="th"> 
<meta http-equiv="content-Type" content="text/html; charset=window-874"> 
<meta http-equiv="content-Type" content="text/html; charset=tis-620"> 

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../indexMain/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/zerogrid.css" type="text/css" media="all">
<link rel="stylesheet" href="../indexMain/css/responsive.css" type="text/css" media="all"> 
<link rel="stylesheet" href="../indexMain/css/responsiveslides.css" /> 
<script type="text/javascript" src="../indexMain/js/jquery-1.6.js" ></script>
<script type="text/javascript" src="../indexMain/js/cufon-yui.js"></script>
<script type="text/javascript" src="../indexMain/js/cufon-replace.js"></script>  
<script type="text/javascript" src="../indexMain/js/Forum_400.font.js"></script>
<script type="text/javascript" src="../indexMain/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../indexMain/js/tms-0.3.js"></script>
<script type="text/javascript" src="../indexMain/js/tms_presets.js"></script>
<script type="text/javascript" src="../indexMain/js/script.js"></script>
<script type="text/javascript" src="../indexMain/js/atooltip.jquery.js"></script> 
<script type="text/javascript" src="../indexMain/js/css3-mediaqueries.js"></script>
<script src="../indexMain/js/responsiveslides.js"></script>
<script>
	$(function () {
	  $("#slidez").responsiveSlides({
		auto: true,
		pager: false,
		nav: true,
		speed: 500,
		maxwidth: 960,
		namespace: "centered-btns"
	  });
	});
</script>

</head>
<body id="page1">
<?php include '../indexMain/css/popup.css' ?>
<div class="#">
	<div class="#">
		<div class="">
			<div class="main zerogrid">
<!-- header -->
				<header>
					<?php include "../secure/tapmember.php" ?>
				</header>
<!-- / header -->

<h2>ข่าวทั้งหมด</h2>
                  </header>
                    <p>
                        <?php
                            while ($row_news = mysqli_fetch_assoc($res_news)) {
                         ?>
                
                        <h3 class="uk-article-title">
                            <a href="#"><?php echo $row_news['news_topic']; ?></a>
                        </h3>
                        <p class="uk-article-meta">วันที่ : "<?php echo $row_news['news_date']; ?>" <?php echo $row_news['newstype_detail']; ?></a></p>
                        <p>
                            <a href="#"><img class="uk-thumbnail uk-thumbnail-large uk-align-center" src="../news_image/<?php echo $row_news['news_filename']; ?>" width="250"  alt=""></a>
                        </p>
                        <?php echo $row_news['news_detail']; ?>

                      <?php } ?>
                      <br>