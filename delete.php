<?PHP
include("connect.php");
$id=$_GET['did'];
$sqld="DELETE FROM form WHERE id=$id";
$queryq=mysqli_query($con,$sqld);
if($queryq){
	header("location:select.php");
}
?>