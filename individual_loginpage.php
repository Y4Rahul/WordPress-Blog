<?php
session_start();
$id = $_GET['id'];
//echo $id;
$db = mysqli_connect("localhost","root","","project"); //keep your db name
$sql = "SELECT * FROM blogger_image";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
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
      <div class="fixed-action-btn horizontal" style="bottom: 6px; right: 18px;">
    <a class="btn-floating btn-large waves-effect waves-light red" href="addblog.php">
      <i class="material-icons">add</i>
    </a>
    </div>
    <style>
      .dropdowncontent{
      
      margin-left: -280px;
      position:absolute;
      top:56px;
      right:0;
      z-index: 5000;
      display: none;
    }
    .dcwrapper{
      background-color: #fff;
      width:300px;
      padding:15px; 
      margin:0;
      font-size: 13px;
      border-radius: 2px;
      box-shadow: 0 0 1px rgba(57,70,78,.15),0 20px 55px -8px rgba(57,70,78,.25);
    }
  




#image{
  position: absolute;
  left:0;
  top: 0;
}
#text{
  z-index:100;
  position: absolute;
  color:white;
  font-size: 18px;
  font-weight: bold;
  left: 20px;
  top: 85px;
}

    </style>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

  <div class="row right">
      <a class="dropdown-button" data-beloworigin="true" href="#" data-activates="editor-options"><?php
      echo '<img style ="background-repeat:no-repeat;background-position:50%; width:50px; height:50px; border-radius:50%; margin-top:15px; margin-right:15px; " alt="blogger_image" class="responsive-img" src="data:image/jpeg;base64,'.base64_encode( $result['default_image'] ).'"/>';
      ?></a>
      <div class="dropdowncontent" id="editor-options">
      <div class="dcwrapper">
      <div class="row">
        <div class="col s6">
        <?php
        echo '<img id ="image" style ="background-repeat:no-repeat;background-position:50%; width:150px; height:150px; border-radius:50%; margin-top:15px; margin-right:15px; " alt="blogger_image" class="responsive-img"  src="data:image/jpeg;base64,'.base64_encode( $result['default_image'] ).'"/>' ;
        ?>
        <a id="text" href="#">change</a>
        </div>
        <div class="col s6">
        <?php
        echo  '<p>'.$_SESSION['username'].'</p>';
        echo '<a class="btn" href="bloggerdetail.php?id=' .$id. ' " style="padding-left: 5px; padding-right: 5px; margin-top: 35px;">myaccount</a>'?>
      </div>
      </div>
      <div class="row center">
      <a href="#">Sign out</a>
      </div>
      </div>
      </div>
      </div>



<?php
      $conn = new mysqli("localhost","root","","project");

      if($conn->connect_error)
      die("connection failed".$conn->connect_error);
      else
      //echo "connected";
      	if($_SESSION['username']==="rahul yadav"){
			$users = "SELECT * FROM blog_master";      		
      	}
      	else{
      			$users = "SELECT * FROM blog_master WHERE blogger_id = '$id' ";
  			}
      $result = $conn->query($users);

      if($result->num_rows > 0){
        echo "<table class='centered bordered highlight responsive-table'>";
            echo "<thead>";
              echo "<tr>";
                echo "<th data-field='id'>AUTHOR</th>";
                echo "<th data-field='name'>TITLE</th>";
                echo "<th data-field='name'>CATEGORY</th>";
                echo "<th data-field='name'>LAST UPDATED</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
          $id=0;
          $list = array();
        while($row = $result->fetch_assoc()){
                        $list[] = $row['blog_id'];
                        echo "<tr>";
                //echo "<td><input type='checkbox' name='checkbox' value='".$i."' id='rahul'></td>";
                echo "<td>" . $row['blog_author'] . "</td>";
                echo "<td>" . $row['blog_title'] . "</td>";
                echo "<td>" . $row['blog_category'] . "</td>";
                echo "<td>" . $row['updated_date'] . "</td>";
                echo "<td>

                <a  class='btn-floating btn-medium waves-effect waves-light red' href='editblog.php?id=".$id."'><i class='material-icons'>mode_edit</i></a>
                <a  class='btn-floating btn-medium waves-effect waves-light red' href='delete.php?id=".$id."'><i class='material-icons'>delete</i></a></td>";
               echo "</tr>";
               $id++;
        }
        echo "</tbody>";
        echo "</table>";
    }

    $_SESSION['blogs']=$list;
        ?>

</body>
</html>