<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$current_date = date("Y-m-d H:i:s");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$options = array('cost'=>12);
$password = password_hash("rahul", PASSWORD_BCRYPT, $options);
//echo $password;
$insert_admin = "insert into blogger_info
values ('','rahul yadav','$password','$current_date','1',' $current_date','$current_date')";

if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$password = password_hash("rahul", PASSWORD_BCRYPT, $options);

$insert_admin = "insert into blogger_info
values ('','rahul yadav','$password','$current_date','1','$current_date','$current_date')";

if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$password = password_hash("xxx", PASSWORD_BCRYPT, $options);

$insert_admin = "insert into blogger_info
values ('','rahul yadav','$password','$current_date','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$password = password_hash("ajit", PASSWORD_BCRYPT, $options);

$insert_admin = "insert into blogger_info
values ('','ajit','$password','$current_date','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$password = password_hash("ajay", PASSWORD_BCRYPT, $options);

$insert_admin = "insert into blogger_info
values ('','ajay','$password','$current_date','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$password = password_hash("rohan", PASSWORD_BCRYPT, $options);

$insert_admin = "insert into blogger_info
values ('','rohan','$password','$current_date','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$password = password_hash("ravi", PASSWORD_BCRYPT, $options);

$insert_admin = "insert into blogger_info
values ('','ravi','$password','$current_date','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$conn->close();
?>