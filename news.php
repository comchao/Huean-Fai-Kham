<?php
    session_start();
    include 'secure/connectdb.php';

    $newstype_id = $_GET['newstype_id'];

    $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id=tbnewstype.newstype_id
          WHERE tbnews.newstype_id='$newstype_id' ORDER BY news_id DESC ";

    $res_news = mysqli_query($dbcon,$sql);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/uikit.css" />
            <script src="js/jquery.js"></script>
            <script src="js/uikit.js"></script>
    <title>ข่าว</title>

  </head>
  <body>
  <style>
body{
     background: url(images.jpg);
     background-size:cover;

     background-attachment: fixed;
}
</style>
    <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

      <?php
          include 'header.php';
       ?>

    <div class="uk-grid" data-uk-grid-margin>
      <div class="uk-width-medium-3-4">

        <?php
            while ($row_news = mysqli_fetch_assoc($res_news)) {
         ?>
                <article class="uk-article">

                        <h1 class="uk-article-title">
                            <a href="#"><?php echo $row_news['news_topic']; ?></a>
                        </h1>

                        <p class="uk-article-meta">Written by Admin on <?php echo $row_news['news_date']; ?>. Posted in <a href="#"><?php echo $row_news['newstype_detail']; ?></a></p>

                        <p>
                            <a href="#"><img class="uk-thumbnail uk-thumbnail-large uk-align-center" src="./news_image/<?php echo $row_news['news_filename']; ?>" alt=""></a>
                        </p>

                        <?php echo $row_news['news_detail']; ?>

                    </article>
            <?php } ?>
      </div>

      <?php
          include 'right.php';
       ?>

    </div>
  </div>

  </body>
</html>
