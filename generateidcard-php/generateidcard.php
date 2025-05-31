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

<?php
$count=1;
$sel_query="SELECT*from `students` ORDER BY id desc;";
$result=mysqli_query($con,$sel_query);
$row=mysqli_fetch_assoc($result);
 
 echo' <div class="id-card">
      <h2>' .$row['college_name'] . '</h2>
      <img src="' .$row['image_path'] . '" alt="Student Photo">
      <div class="info">
        <strong>Name:</strong> ' .$row['student_name'] . '<br>
        <strong>Father Name:</strong> ' .$row['father_name'] . '<br>
        <strong>College ID:</strong> ' .$row['college_id_no'] . '<br>
        <strong>DOB:</strong> ' . $row['dob']. '<br>
        <strong>Department:</strong> ' .$row['department'] . '<br>
        <strong>Branch:</strong> ' . $row['branch']. '<br>
        <strong>Phone:</strong> ' . $row['phone_no'] . '<br>
        <strong>Address:</strong> ' . $row['addr'] . '<br>
        <strong>Year:</strong> ' .$row['years'] . '
      </div>
    </div>';
    
        ?>
</div>
</body>
</html>
