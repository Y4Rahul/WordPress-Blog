<?php
session_start();
$conn = new mysqli("localhost","root","","project");

      if($conn->connect_error)
      die("connection failed".$conn->connect_error);
      else
      //echo "connected";
      	$id= $_GET['id'];
	//echo $id;
	$blogid = $_SESSION["blogs"][$id];
	echo $blogid;

	$status = "SELECT blogger_id FROM blog_master where blog_id='$blogid'" ;
	$result = $conn->query($status);
	$row = $result->fetch_assoc();
	$active= $row['blogger_id'];


	$operation = "SELECT blogger_is_active FROM blogger_info where blogger_id='$active' ";
	$result1 = $conn->query($operation);
	$row1 = $result1->fetch_assoc();
	$is_active =  $row1['blogger_is_active'];
	if($is_active===0){
		echo "<script>
		alert('you don't have permission');
		</script>";
	}
	else{
	$blog_title = $_POST['title'];
	$blog_description=$_POST['blog_description'];
	$blog_category=$_POST['category'];
	$date = date("Y-m-d H:i:s");
	
	//echo $blogtitle;
	$sql = "UPDATE blog_master SET blog_title='$blog_title',blog_description='$blog_description',blog_category='$blog_category',updated_date='$date' WHERE blog_id='$blogid' ";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
}
$conn->close();
//header("location:http://localhost:8089/project/content.php");
//die();
?>