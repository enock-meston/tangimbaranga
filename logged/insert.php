<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/
 
require('db.php');


$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$dat =$_REQUEST['dat'];
$tim =$_REQUEST['tim'];
$ins_query="insert into newrecord (`dat`,`tim`) values ('$dat','$tim')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/css.css" />
</head>
<body style="background-image: url(images/2.jpg);">
<div class="form">

<div>
<h1 style="color:orange">Insert New Record</h1>
<div style=" box-shadow: 0 0 1rem 0 rgba(0, 0, 0, .2);
            border-radius: 1rem;
            position: relative;
            z-index: 1;
           background-color: violet;
            overflow: hidden;
                text-align:center;
                padding: 5rem;
            font-size:20px;
            height: 400px;
                color: white;">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />

Time in
<p><input type="time" name="tim"  /></p>
Date
<p><input type="date" name="dat"  /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;font-size: 14px;"><?php echo $status; ?></p>
<p style="font-size: 15px;"> <a href="index.php">Home</a>| <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></p>


</div>

</div>
</div>
</body>
</html>
