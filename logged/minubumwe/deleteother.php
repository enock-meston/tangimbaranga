<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');

$sql="DELETE from otherinstitutionrequest where id='".$_GET['id']."'";
$query=mysqli_query($conn,$sql);
if ($query) {
	unlink("../../doc/".$row['speechcopy']);
	header("location:otherre.php");
	echo "deleted";
	
}
else
{
	echo "fail";
}

?>