<?php
session_start();
$id = $_GET['id'];
echo $_SESSION["blogs"][$id];

$blogtitle = $_SESSION["blogs"][$id];
echo $blogtitle;
$conn = new mysqli("localhost","root","","project");

      if($conn->connect_error)
      die("connection failed".$conn->connect_error);
      else
      //echo "connected";

      $users = "SELECT * FROM blog_master WHERE blog_id='$blogtitle' ";

      $result = $conn->query($users);

      $row = $result->fetch_assoc();

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
    </head>

    <body>
    		<div class="row">
    <form class="col s12" action='addcontent.php?id=<?php echo $id ?>' method="post">
      <div class="row">
        <div class="input-field col s6">
        TITLE<input type="text" value="<?php echo $row['blog_title']; ?>" class="validate" name="title" id="title">
          
        </div>
                <div class="input-field col s6">
          CATEGORY<input type="text" value="<?php echo $row['blog_category']; ?>" class="validate" name="category" id="title">
        </div>
      </div>
      <div class="row center">
      <p>BLOG-DESCRIPTION</p>
      </div>
              <div class="input-field col s12">
          <textarea id="textarea1" name="blog_description" class="materialize-textarea" style="height:250px;"><?php echo $row['blog_description']; ?></textarea>
        </div>
      <div class="row center">
      	<button class="btn waves-effect waves-light" type="submit" name="action">Save
    <i class="material-icons right">send</i>
  </button>
      </div>
    </form>
  </div>

</body>
</html>