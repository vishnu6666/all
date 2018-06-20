<?php include("connect.php");?>
<html>
<header>
</header>
	<body>
		<table>
			<tr>
				<td>id</td>
				<td>name</td>
				<td>gender</td>
				<td>hobby</td>
				<td>education</td>
				<td>image</td>
				<td>action</td>
			</tr>
				<?php 
				$sqls="SELECT * FROM form ";
				$query=mysqli_query($con,$sqls);
				while($row=mysqli_fetch_array($query)){
				?>
			<tr>
				<td><?php echo $row['0']?></td>
				<td><?php echo $row['1']?></td>
				<td><?php echo $row['2']?></td>
				<td><?php echo $row['3']?></td>
				<td><?php echo $row['4']?></td>
				<td>
				<img src="fs/<?php echo $row['5'];?>" height="80" width="80"/></td>
				<td>
				<?php $temp=explode(",",$row['6']);
				foreach ($temp as $pik) {
				?>
				<img src="fs/<?php echo $pik; ?>" height="80" width="80"/>
				<?php } ?>
				</td>
				<td><a href="delete.php?did=<?php echo $row['0']; ?>">Delete</a></td>
				<td><a href="update.php?uid=<?php echo $row['0']; ?>">Update</a></td>
			<?php }	?>
			</tr>
		</table>
	</body>
</html>
