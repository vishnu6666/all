<?php
include("connect.php");
if(isset($_POST['submit'])){
	 $name=$_POST['name'];
	 $gender=$_POST['gender'];
	 $hb=$_POST['hobby'];
	 $hobby=implode(",",$hb);
	 $education=$_POST['education'];
	 $file=$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],"fs/$file");
	$gallery=array();
		foreach ($_FILES['photos']['name'] as $key => $value) {
			$pic=$_FILES['photos']['name'][$key];
			move_uploaded_file($_FILES['photos']['tmp_name'][$key], "fs/$pic");
			array_push($gallery,$pic);
		}
	$g=implode(",", $gallery);
	$sql="INSERT INTO form (name,gender,hobby,education,file,gallery)VALUES('$name','$gender','$hobby','$education','$file','$g')";
	/*print_r($sql);
	exit();*/
	if(mysqli_query($con,$sql))
	{
		header("location:select.php");
	}
	else
	{
		echo"not ok";
	}
}
?>