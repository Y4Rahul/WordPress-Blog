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

$insert_admin = "insert into blog_master
values ('','1','nature','welcome to the nature','nature','rahul','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$insert_admin = "insert into blog_master
values ('','2','nature','welcome to the nature','nature','rohit','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;


$insert_admin = "insert into blog_master
values ('','3','nature','welcome to the nature','nature','rajat','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;




$insert_admin = "insert into blog_master
values ('','4','nature','welcome to the nature','nature','raju','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;



$insert_admin = "insert into blog_master
values ('','5','nature','welcome to the nature','nature','kapil','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$insert_admin = "insert into blog_master
values ('','6','nature','welcome to the nature','nature','karan','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$insert_admin = "insert into blog_master
values ('','7','nature','welcome to the nature','nature','harshit','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$insert_admin = "insert into blog_master
values ('','8','nature','welcome to the nature','nature','himmat','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$insert_admin = "insert into blog_master
values ('','9','nature','welcome to the nature','nature','dharma','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;

$insert_admin = "insert into blog_master
values ('','1','human','welcome to the nature','human','kumar','1','$current_date','$current_date')";
if($conn->query($insert_admin) === true)
	echo "record added";
else
	echo "error".$sql."<br>".$conn->error;
?>