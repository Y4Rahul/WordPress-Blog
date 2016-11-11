<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$value="rahul";
	$edit = $_POST["edit"];
	echo $edit;

}

?>



<html>
<head>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<textarea value="<?php  ?>" col="5" row="5" name="edit"></textarea>
<input type="submit" value="submit" name="submit"/>
</body>
</html
