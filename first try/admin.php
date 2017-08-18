<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" method="POST">
		<input type="text" name="type" placeholder="type">
		<input type="number" name="price" placeholder="price">
		<input type="text" name="brand" placeholder="brand">
		<input type="text" name="color" placeholder="color">
		<input type="text" name="gender" placeholder="gender">
		<input type="text" name="descr" placeholder="descr">
		<input type="file" name="image" placeholder="image">
		<input type="submit" name="submit">
	</form>
</head>
<body>
<?php
	$con=mysqli_connect("localhost","root","","ft") or die("Connection Error");
	if (isset($_POST['submit'])) 
	{
		$type=$_POST['type'];
		$brand=$_POST['brand'];
		$price=$_POST['price'];
		$color=$_POST['color'];
		$gender=$_POST['gender'];
		$descr=$_POST['descr'];
		$img=$_FILES["image"]["name"];
		$target_dir = "data/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$check = getimagesize($_FILES["image"]["tmp_name"]);
	    if($check !== false) 
	    {
	        echo "File is an image - " . $check["mime"] . ".";
	        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
	        {
	        	echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
	        	//header("Location:choice.php?id=$id&up=true");
	    	} 
	    	else 
	    	{
		        echo "Sorry, there was an error uploading your file.";
	    	}
	    	$uploadOk = 1;
	    } 
	    else 
	    {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
		$sql="INSERT INTO data VALUES(0,'$type','$price','$brand','$color','$gender','$descr','$img')";
		$res=mysqli_query($con,$sql) or die("Delete Error");
	}
	if (isset($_GET['id'])) 
	{
		$rid=$_GET['id'];
		$sql="DELETE FROM data WHERE dress_id=$rid";
		$res=mysqli_query($con,$sql) or die("Delete Error");
		unset($_GET['id']);
	}
	echo("<h1>Men</h1>");
	$sql="SELECT * from data WHERE gender='Men'";
	$res=mysqli_query($con,$sql) or die("Query Error");
	while ($row=mysqli_fetch_array($res)) 
	{
		$id=$row['dress_id'];
		$img=$row['image'];
		$brand=$row['brand'];
		$type=$row['type'];
		$price=$row['price'];
		echo("<img src='data/$img' width='350' height='400'>");
		echo "$brand $price $type";
		echo "<a href='admin.php?id=$id'>Remove</a>";
		echo "<br>";
	}
	echo("<h1>Women</h1>");
	$sql="SELECT * from data WHERE gender='Women'";
	$res=mysqli_query($con,$sql) or die("Query Error");
	while ($row=mysqli_fetch_array($res)) 
	{
		$id=$row['dress_id'];
		$img=$row['image'];
		$brand=$row['brand'];
		$type=$row['type'];
		$price=$row['price'];
		echo("<img src='data/$img' width='350' height='400'>");
		echo "$brand $price $type";
		echo "<a href='admin.php?id=$id'>Remove</a>";
		echo "<br>";
	}
?>
</body>
</html>
