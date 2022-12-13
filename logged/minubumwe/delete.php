<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

$con = mysqli_connect("localhost","root","","smarte") or die(mysql_error());

$id=$_REQUEST['id'];
$query = "DELETE FROM newrecord WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: time.php"); 
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

$con = mysqli_connect("localhost","root","","smarte") or die(mysql_error());

$id=$_REQUEST['id'];
$query = "DELETE FROM minute WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: time.php"); 
?>