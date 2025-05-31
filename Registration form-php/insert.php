<?php
require('db.php');
include("auth.php");
$status="";
if(isset($_POST['new'])&& $_POST['new']==1)
{
$trn_date= date("Y-m-d H:i:s");
$name=$_REQUEST['name'];
$age=$_REQUEST['age'];
$submittedby=$_SESSION["username"];
$ins_query="INSERT INTO `new_record`(`id`, `trn_date`, `name`, `age`, `submittedby`) VALUES ('','$trn_date','$name','$age','$submittedby')";
mysqli_query($con,$ins_query)or die(mysql_error());
$status="New Record inserted Successfully.</br></br><a href='view.php'>View inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>insert New Record</title>
<h1>Insert New Record</h1>
<form name="form" method="post" action="">
<input type="hidden" name="new" value="1"/>
<p><input type="text" name="name" placeholder="Enter Name" required/></p>
<p><input type="text" name="age" placeholder="Enter Age" required/></p>
<p><input type="submit" type="submit" value="submit"/></p>
</form>
<p style="color:#FF0000;"><?php echo $status?></p>
</div>
</div>
</body>
</html>



