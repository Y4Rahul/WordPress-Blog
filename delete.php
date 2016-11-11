<?php
session_start();

//echo $username;

$id = $_GET['id'];
echo $id;

//echo $_SESSION["username"][$id];

$blogtitle = $_SESSION["blogs"][$id];

echo $blogtitle;

$conn = new mysqli("localhost","root","","project");

if($conn->connect_error)
      die("connection failed".$conn->connect_error);
      else
      //echo "connected";
  $status = "SELECT blog_id FROM blog_master where blog_title='$blogtitle'" ;
	$result = $conn->query($status);
	$row = $result->fetch_assoc();
	$active= $row['blog_id'];

	$status1 = "SELECT blogger_id FROM blog_master where blog_title='$blogtitle'" ;
	$result1 = $conn->query($status1);
	$row1 = $result1->fetch_assoc();
	$active1= $row1['blogger_id'];

//$delete = "DELETE FROM blog_detail WHERE blog_id='$active' ";

//$delete1 =  "DELETE FROM blog_master WHERE blog_title='$blogtitle' ";
//echo "it's working";
$delete2 = "DELETE FROM blogger_info WHERE blogger_id='$active1' ";
if($conn->query($delete2)===true){
	echo "deleted";
}
else
{
	echo "failed".$conn->error;
}

/*if($conn->query($delete1)===true){
	echo "deleted";
}
else
{
	echo "failed".$conn->error;
}

if($conn->query($delete2)===true){
	echo "deleted";
}
else
{
	echo "failed".$conn->error;
}
*/

$conn->close();
//header("Location: http://localhost:8089/project/content.php");
//die();
?>

