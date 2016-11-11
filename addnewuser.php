<?phpss
$blog_author = $_POST['author'];
//echo $blog_author;
$blogger_username=$_POST['username'];
//echo $blogger_username;
$blogger_password = $_POST['password'];
//echo $blogger_password;
$blog_title = $_POST['blogtitle'];
//echo $blog_title;
$blog_category = $_POST['blogcategory'];
//echo $blog_category;
$blog_description = $_POST['blogdescription'];
//echo $blog_description;

//getting image file path of blogger
		$filename = $_FILES['bloggerimage']['name'];
		//echo $filename;
		$filetype = $_FILES['bloggerimage']['type'];
		$filetmp = $_FILES['bloggerimage']['tmp_name'];
		$extension = strtolower(end(explode('.',$filename)));

		$possible_extension = array("jpeg","jpg","png","gif");
		if(in_array($extension, $possible_extension)===false){
			die("change file format");
		}

		$filesize = $_FILES['bloggerimage']['size'];
		//echo $filesize;
		//$mb = 2*1024*1024;

		if($filesize > 2097152){
			die("file size excedded");
		}
			$bloggerimage = addslashes(file_get_contents($filetmp));

//getting image of blog
			$filename = $_FILES['blogimage']['name'];
		//echo $filename;
		$filetype = $_FILES['blogimage']['type'];
		$filetmp = $_FILES['blogimage']['tmp_name'];
		$extension = strtolower(end(explode('.',$filename)));

		$possible_extension = array("jpeg","jpg","png","gif");
		if(in_array($extension, $possible_extension)===false){
			die("change file format");
		}

		$filesize = $_FILES['bloggerimage']['size'];
		//echo $filesize;
		//$mb = 2*1024*1024;

		if($filesize > 2097152){
			die("file size excedded");
		}
			$blogimage = addslashes(file_get_contents($filetmp));

			//setting date and end date

	$current_date = date("Y-m-d H:i:s");
	$end_date = date('Y-m-d', strtotime("+30 days"));


//password encryption
	$options = array('cost'=>12);
	$ency_password = password_hash($blogger_password, PASSWORD_BCRYPT, $options);
	//making connection and inserting

	$conn = new mysqli("localhost","root","","project");

		//inserting in blogger_info

	$user_in_blogger_info = "INSERT INTO blogger_info VALUES ('','$blogger_username','$ency_password','$current_date','0',' $current_date','$end_date')";

	if($conn->query($user_in_blogger_info) === true){
	//echo "record added";
	$bloggerid = $conn->insert_id;
}
	else{
	echo "error".$user_in_blogger_info."<br>".$conn->error;
	}
	//	inserting in blog_master


	$user_in_blog_master = "INSERT INTO blog_master VALUES ('','$bloggerid','$blog_title','$blog_description','nature','rahul','0','$current_date','$current_date')"; 


	if($conn->query($user_in_blog_master) === true){
		$blogid = $conn->insert_id;
	//echo "record added".$blogid;
}
	else{
	echo "error".$user_in_blog_master."<br>".$conn->error;
}
	//inserting in blog_detail

	$user_in_blog_detail = "INSERT INTO blog_detail VALUES('','$blogid','$blogimage')";
	
	if($conn->query($user_in_blog_detail) === true)
	//echo "record added";
	else
	echo "error".$user_in_blog_detail."<br>".$conn->error;

	//inserting in blogger_image
	
		$user_in_blogger_image = "INSERT INTO blogger_image(image_id,blogger_id,uploaded_image) VALUES('','$bloggerid','bloggerimage')";

			if($conn->query($user_in_blogger_image) === true)
	//echo "record added";
	else
	echo "error".$user_in_blogger_image."<br>".$conn->error;
header("location:")
exit();

?>