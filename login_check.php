<?php
$form_username=$_POST["username"];
$form_password=$_POST["password"];

$servername="localhost";
$username="root";
$password="";
$database="admin";
$conn = new mysqli($servername,$username,$password,$database);
if($conn->connect_error)
	die("connection failed:".$conn->connect_error);
else
	echo "connected successfully";

$var = "SELECT username,password FROM users";

$result = $conn->query($var);

if($result->num_rows>0)
{
	while($row = $result->fetch_assoc()){
		if($row["username"]==$form_username)
			{
				if(password_verify($form_password,$row["password"]))
				{
					header("location:http://localhost:8089/project/test.html");
					exit();
				}
			}
	}
header("location:http://localhost:8089/project/test.html");
echo "<script type='text/javascript'>alert('message');</script>";
exit();

}

$conn->close();
?>