<?php
include("connect.php");
$id=$_GET['uid'];
$sqls="SELECT * FROM form WHERE id='$id' ";
$query=mysqli_query($con,$sqls);
$row=mysqli_fetch_array($query);

if(isset($_POST['update'])){
	 $name=$_POST['name'];
	 $gender=$_POST['gender'];
	 $hb=$_POST['hobby'];
	 $hobby=implode(",",$hb);
	 $education=$_POST['education'];
	 $file=$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'],"fs/$file");

	$gall=array();
	foreach ($_FILES['pics']['name'] as $key => $value) {
		$gal=$_FILES['pics']['name'][$key];
		move_uploaded_file($_FILES['pics']['tmp_name'][$key], "fs/$gal");
		array_push($gall, $gal);
	}
	$g=implode(",", $gall);
	$sql="UPDATE  form SET name='$name',gender='$gender',hobby='$hobby',education='$education',file='$file', gallery='$g' WHERE id='$id'";
	$query=mysqli_query($con,$sql);
	/*print_r($query); exit();*/
	if($query)
	{
		header("location:select.php");
	}
	else
	{
		echo"fail";
	}
}
?>
<html>
<head>
</head>
<body>
	<form method="POST" action="" enctype="multipart/form-data">
		<table align="center">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $row['name'];?>" ></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="radio" name="gender" value="male" <?php if($row['gender'] == 'male') echo 'checked';?>>Male
					<input type="radio" name="gender" value="female"  <?php if($row['gender'] == 'female') echo 'checked';?>>Female</td>
			</tr>
			<tr>
				<td>Hobby</td>
				<td><input type="checkbox" name="hobby[]" value="cricket" <?php if($row['hobby'] == 'cricket'){ echo'checked';}?>>cricket
					<input type="checkbox" name="hobby[]" value="wb"  <?php if($row['hobby'] == 'wb') {echo'checked';}?>>wb
					<input type="checkbox" name="hobby[]" value="fb" <?php if($row['hobby'] == 'fb') {echo'checked';}?>>fb</td>
			</tr>
			<tr>
				<td>Education</td>
				<td><select name="education">
					<option <?php if($row['education'] == 'BE') echo 'selected';?>>BE</option>
					<option <?php if($row['education'] == 'ME') echo 'selected';?>>ME</option>
					<option <?php if($row['education'] == 'Btech') echo 'selected';?>>Btech</option>
					<option <?php if($row['education'] == 'Mtech') echo 'selected';?>>Mtech</option>
				</select></td>
			</tr>
			<tr>
				<td>image</td>
				<td><input type="file" name="file">
				<img src="fs/<?php echo $row['file'];?>" height="80" width="80"></td>
			</tr>
			<tr><td>gallery</td>
				<td>
					<input type="file" name="pics[]" multiple="">
					<?php $temp=explode(",", $row['gallery']);
					for($i=0;$i<count($temp);$i++){?>
					<img src="fs/<?php echo $temp[$i];?>" height="80" width="80"> <?php }?>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="update" id="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>