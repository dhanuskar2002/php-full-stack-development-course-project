<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="idcard.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a>| <a href="insert.php">insert New Round</a>|<a
 href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>S.No</strong></th>
<th><strong>Name</strong></th>
<th>Roll no</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
<th><strong>generateidcard</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select *from `students` ORDER BY id desc;";
$result=mysqli_query($con,$sel_query);
While($row=mysqli_fetch_assoc($result)) { 
    ?>
<tr><td align="center"><?php echo $count;?></td>
<td align="center"><?php echo $row["student_name"];?></td>
<td align="center"><?php echo $row["college_id_no"];?></td>
<td align="center"><a href="edit.php?id=<?php echo $row["id"];?>">Edit</a></td>
<td align="center"><a href="delete.php?id=<?php echo $row["id"];?>">Delete</a></td></tr>
<td align="center"><a href="generateidcard.php?id=<?php echo $row["id"];?>">generateid</a></td></tr>
<?php $count++;}?>
</tbody>
</table>
</div>
</body>
</html>
