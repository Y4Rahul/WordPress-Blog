<?php
$id=$_GET['id'];
//echo $id;
$conn = new mysqli("localhost","root","","project");
$sql = "SELECT * FROM blog_master where blog_id ='$id'";
$result = $conn->query($sql);
$blog = $result->fetch_assoc();
//selecting image from blog_detail
$query = "SELECT * FROM blog_detail where blog_id ='$id'";
$operation = $conn->query($query);
$blogimage = $operation->fetch_assoc();
?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
      <style>
      body{
        box-sizing: border-box;
      }
      .container{
        background-color:rgb(255,255,255);
        width: 90%;
        min-height: 500px;
        margin-top: 10px;
        padding-top: 40px;
        padding-bottom: 40px;
      }
      .gap{
        font-size: 26px;
        line-height: 30px;
        font-family: 'TiemposTextWeb-Regular', Georgia, serif;
        color: #3C3C3C;
      }
      .blog_description{
        width: 90%;
        font-family: 'TiemposTextWeb-Regular', Georgia, serif;
        font-size: 18px;
        line-height: 24px;
        color: #3C3C3C;
        padding-left: 10%;
        padding-right: 2.5%;
        }

        h2{
          font-family: "BWHaasText-75Bold",Helvetica, Arial, sans-serif;
          font-size: 100px;
          line-height: 94px;
        }
        .image{
          width: 90%;
          background-repeat:no-repeat;
          margin: 60px -200px 60px -200px;
        }
      </style>

    </head>

    <body style="background-color:#f94600;">
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
        <div class="container">
        <div class="row">
          <div class="col s12 center">
            <h2><?php echo strtoupper($blog['blog_title']); ?></h2>
            </div>
          <div class="col s12">
            <?php echo '<p class="right gap">AUTHOR:' .$blog['blog_author'].'<br />';
             echo 'LAST UPDATED:'.$blog['updated_date'].'</p>';?>
            </div>
            <!-- displaying image -->
            <div class="col s12 image center">
              <?php echo '<img class="responsive-img" style="max-width:90%" src="data:image/jpeg;base64,'.base64_encode( $blogimage['blog_detail_image'] ).'"  />'; ?>
            </div>

            <div class="blog_description">
            <?php echo $blog['blog_description']; ?>
            </div>
            </div>
            </div>
            <div class="row center" style="margin-top:10%; cursor: default;">
            <a class="btn" href="displayingcard.php">GO TO HOMEPAGE</a> 
            </div>

    </body>
  </html>