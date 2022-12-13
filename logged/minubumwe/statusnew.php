<?php
session_start();
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'tangimbaraga');
?>

<?php

if(isset($_GET['status']))
{
	$status=$_GET['status'];
	
	$select_status="SELECT * from news where id='$status'";
	$quer=mysqli_query($conn,$select_status);

	while($row=mysqli_fetch_array($quer))
	{
		$st=$row->$status;
	
	if($st=='1')
	{
		$status2=0;
	}
	else
	{
		$status2=1;
	}
	$ud="UPDATE news set status='$status2' where id='$status' ";
	$update=mysqli_query($conn,$ud);
	if($update)
	{
		header("Location:addnews.php");
	}
	else
	{
		header("Location:addnewnews.php");
	}
	}
	?>
     
    <?php
}
?>