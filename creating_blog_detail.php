<?php
    if(isset($_FILES['image'])){
        $filename = $_FILES['image']['name'];
        echo $filename;
        $filetype = $_FILES['image']['type'];
        $filetmp = $_FILES['image']['tmp_name'];
        $extension = strtolower(end(explode('.',$filename)));

        $possible_extension = array("jpeg","jpg","png");
        if(in_array($extension, $possible_extension)===false){
            die("change file format");
        }

        $filesize = $_FILES['image']['size'];
        //echo $filesize;
        //$mb = 2*1024*1024;

        if($filesize > 2097152){
            die("file size excedded");
        }
                echo "rahul";
            $image = addslashes(file_get_contents($filetmp));

                $conn =new mysqli("localhost","root","","project");

                    $sql = "INSERT INTO blog_detail VALUES('','5','$image')";
                
                        if($conn->query($sql) === TRUE){
                    echo "inserted";
            }
            else
            {
                //echo "rahul";
                echo "error " . $conn->error;
            }
                }

?>

<html>
<head>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>

        <form action="" method="post" enctype = "multipart/form-data">
    <input type="file" name="image"/>
    <input type="submit" value="submit"/>
  </form>
<?php
$db = mysqli_connect("localhost","root","","project"); //keep your db name
$sql = "SELECT * FROM blog_detail";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);
echo '<img style ="background-repeat:no-repeat;background-position:50%; width:50px; height:50px; border-radius:50%;" src="data:image/jpeg;base64,'.base64_encode( $result['blog_detail_image'] ).'"/>';
?>

</body>
</html>