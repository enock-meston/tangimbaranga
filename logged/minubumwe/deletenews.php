<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');

$sql="DELETE from news where id='".$_GET['id']."'";
$query=mysqli_query($conn,$sql);
if ($query) {
	unlink("imagee/".$row['filename']);
	header("location:addnews.php");
	echo "deleted";
	
}
else
{
	echo "fail";
}

?>