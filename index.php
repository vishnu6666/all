<html>
<head>
	</script>
</head>
<body>
	<form  action="insert.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" ></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><input type="radio" name="gender" value="male" >Male
					<input type="radio" name="gender" value="female">Female</td>
			</tr>
			<tr>
				<td>Hobby</td>
				<td><input type="checkbox" name="hobby[]" value="cricket" >cricket
					<input type="checkbox" name="hobby[]" value="wb" >wb
					<input type="checkbox" name="hobby[]" value="fb" >fb</td>
			</tr>
			<tr>
				<td>Education</td>
				<td><select name="education">
					<option>BE</option>
					<option>ME</option>
					<option>Btech</option>
					<option>Mtech</option>
				</select></td>
			</tr>
			<tr>
				<td>image</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td>Gallery</td>
				<td><input type="file" name="photos[]" multiple=""></td>
			</tr>
			
			<tr>
				<td><input type="submit" name="submit" value="submit" id="submit"></td>
			</tr>
		</table>
	</form>
</body>
</html>
