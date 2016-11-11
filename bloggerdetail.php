<?php
session_start();
$id = $_GET['id'];
$_SESSION['id'] = $id;
$db = mysqli_connect("localhost","root","","project"); //keep your db name
$sql = "SELECT * FROM blogger_image WHERE blogger_id ='$id' ";
$sth = $db->query($sql);
$result_image=mysqli_fetch_array($sth);
//echo '<img style ="background-repeat:no-repeat;background-position:50%; width:50px; height:50px; border-radius:50%;" src="data:image/jpeg;base64,'.base64_encode( $result_image['default_image'] ).'"/>';


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

   			<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

   	<div class="container">
   		<div class="row">

   		<div class="col s6 center">
   		<?php
			if($result_image['uploaded_image']===NULL){
   			//echo "you have not uploaded";
   		echo '<img style ="background-repeat:no-repeat; height:180.42px" alt="blogger_image" class="responsive-img center" src="data:image/jpeg;base64,'.base64_encode( $result_image['default_image'] ).'"/>';
   	}
   	else{
      echo "uploaded";
   			echo '<img style ="background-repeat:no-repeat;height:180.42px" alt="blogger_image" class="responsive-img center" src="data:image/jpeg;base64,'.base64_encode( $result_image['uploaded_image'] ).'"/>';	
   	}

   		$conn = new mysqli("localhost","root","","project");

      if($conn->connect_error)
      die("connection failed".$conn->connect_error);
      else
      //echo "connected";
      			$user_info = "SELECT * FROM blogger_info WHERE blogger_id = '$id' ";
      $result = $conn->query($user_info);
      $row = $result->fetch_assoc();

      	    $sql = "SELECT * FROM blog_master WHERE blogger_id='$id' ";
            $blogid = $conn->query($sql);
            $count=0;
            //$array = $blogid->fetch_assoc();
            while($array = $blogid->fetch_assoc()){
            	//print_r($array);
            	$creation_date = $array['creation_date'];
            	$updated_date = $array['updated_date'];
            	$count++;
            }
            

   		?>
   		</div>
   		<div class="col s6">
   		<div class="valign-wrapper" style="width:100%;height:180.42px; ">
  <h5 class="valign center" style="width:100%"><?php echo strtoupper($row['blogger_username']);  ?></h5>
</div>
   		</div>
</div>
</div>
<div class="divider"></div>
<div class="container">
	<div class="row">
							<table class="highlight centered responsive-table">

        <tbody>
          <tr>
            <td class="pad">USERNAME:</td>
            <td><?php  echo $row['blogger_username'];  ?></td>
          </tr>
          <tr>
            <td class="pad">PASSWORD:</td>
            <td><a href="#modal1" class="modal-trigger">change password</a></td>
          </tr>
          <tr>
            <td class="pad">NO. OF BLOGS:</td>
            <td><?php echo $count ;?></td>
          </tr>
          <tr>
            <td class="pad">CREATION DATE:</td>
            <td><?php echo $creation_date;?></td>
          </tr>
          <tr>
            <td class="pad">LAST UPDATED:</td>
            <td><?php echo $updated_date;?></td>
          </tr>

        </tbody>
      </table>

      			<div id="modal1" class="modal">
      <div class="modal-content">
      <a class="modal-close right"><i class="material-icons">cancel</i></a>
      <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input name="currentpassword" type="password" class="validate">
            <label for = "currentpassword">CurrentPassword</label>
          </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
          <input name="newpassword" type="password" class="validate">
          <label for ="newpassword">NewPassword</label>
        </div>
      </div>
              <div class="row">
        <div class="input-field col s12">
          <input name="checkpassword" type="password" class="validate">
          <label for ="checkpassword">RetypePassword</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 center">
        <button class="btn waves-effect waves-light" type="submit" name="action">Save</button>
        </div>
      </div>
      </form>
      </div>
    </div>
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

    </body>

    </html>