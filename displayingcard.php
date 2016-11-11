
<?php
$db = mysqli_connect("localhost","root","","project"); //keep your db name
$sql = "SELECT * FROM blogger_image";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
        
        $logger="login";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$form_username=$_POST["username"];
$form_password=$_POST["password"];

$servername="localhost";
$username="root";
$password="";
$database="project";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
  die("connection failed:".$conn->connect_error);
else
  //echo "connected successfully";

$var = "SELECT blogger_username,blogger_password FROM blogger_info";

$result = $conn->query($var);

if($result->num_rows>0)
{
  while($row = $result->fetch_assoc()){
    if($row["blogger_username"]==$form_username)
      {
        if(password_verify($form_password,$row["blogger_password"]))
        {
          //echo "welcome";
          session_start();
          $logger=$row['blogger_username'];
          $_SESSION['username'] = $logger;

          $bloggerid = "SELECT blogger_id FROM blogger_info WHERE blogger_username='$logger' ";
          $bloggeridresult = $conn->query($bloggerid);
          $bloggeridrow = $bloggeridresult->fetch_assoc();
          $bloggerid = $bloggeridrow['blogger_id'];
          echo $bloggeridrow['blogger_id'];

          header("location:http://localhost:8089/project/individual_loginpage.php?id=$bloggerid");
          exit();
        }
      }
  }


}

$conn->close();
}
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

        <script type="text/javascript">
          function formvalidation(){
            var name=document.login.username.value;
            var password = document.login.password.value;
            if(name==""){
              document.getElementById("error").innerHTML = "are yaar itna bhi mat sarma,daal de";
              return false;
            }
            if(password==""){
              document.getElementById("error").innerHTML = "are yaar itna bhi mat sarma,daal de";
              return false; 
            }
            else{
              return true;
            }

          }
        </script>

    </head>

    <body>
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


    <nav style=" background-color: #2d37ad;">
    <div class="nav-wrapper">

      <i class="material-icons left">subject</i>WELCOME
      <ul id="nav-mobile" class="right hide-on-med-and-down  valign-wrapper">
      <li><a href="newuser.php">NEW REGISTRATION?CLICK HERE</a></li>
        <li><a href="#modal1" class="modal-trigger valign-wrapper"><?php echo '<img style="padding-right:15px; height:64px;" src="data:image/jpeg;base64,'.base64_encode( $result['default_image'] ).'"/>';?><span><?php echo $logger ?></span></a></li>
      </ul>
    </div>
  </nav>


      <div id="modal1" class="modal">
      <div class="modal-content">
      <a class="modal-close right"><i class="material-icons">cancel</i></a>
      <div class="container">
        <form name="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return formvalidation()">
        <div class="row">
          <div class="input-field col s12">
            <input name="username" type="text" class="validate" autofocus required pattern="[a-zA-Z0-9@_ ]{1,20}">
            <label for = "username" data-error="wrong">UserName</label><span id="error"></span>
          </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
          <input name="password" type="password" class="validate" required pattern="[a-zA-Z0-9@_]{4,15}">
          <label for ="password" data-error="wrong">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 center">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
        </div>
      </div>
      <div class="row">
        <a href="#" class="small-font">forgot password ?</a>
      </div>
      </form>
      </div>
    </div>
    </div>

     <script>
    $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
    });

     $('.modal-trigger').leanModal({
      dismissible: false // Modal can be dismissed by clicking outside of the modal
    });
  </script>





      <?php
$db = mysqli_connect("localhost","root","","project"); 
$sql = "SELECT * FROM blog_detail";
$sth = $db->query($sql);
       
      while($row = $sth->fetch_assoc()) {

          $id=$row['blog_id'];
        $sql1 = "SELECT blog_title,blog_description FROM blog_master WHERE blog_id = '$id' ";
        $operation = $db->query($sql1);
        $row2 = $operation->fetch_assoc();
        //print_r($row2);
        echo '<div class="container">';
          echo '<div class="row center">';
            echo '<h1>'. $row2['blog_title'] . '</h1>';

          echo '</div>';
        echo '</div>';
       echo '<div class="container">';
        echo '<div class="row">';
        
        //echo $id;
        echo '<div class="col s12">';
              echo '<div class="card medium">';
                echo '<div class="card-image">';

                echo  '<a href="content.php?id='.$id.' "><img src="data:image/jpeg;base64,'.base64_encode( $row['blog_detail_image'] ).'"  /></a>';
                  echo $id;
                 echo '<span class="card-title">Blog description</span>';
              
              echo '</div>';
                    echo '<div class="card-content">';
                      echo '<p>'.$row2['blog_description'].'</p>';
                    echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="divider"></div>';
              }
            


?>








    </body>
    </html>