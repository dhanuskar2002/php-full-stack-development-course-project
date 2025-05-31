<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="idcard.css">
   <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

<?php
require('db.php');
include("auth.php");
$status="";
if(isset($_POST['new'])&& $_POST['new']==1)
{
$trn_date= date("Y-m-d H:i:s");
$college_name = mysqli_real_escape_string($con, $_POST['college_name']);
    $student_name = mysqli_real_escape_string($con, $_POST['student_name']);
    $father_name = mysqli_real_escape_string($con, $_POST['father_name']);
    $college_id_no = mysqli_real_escape_string($con, $_POST['college_id_no']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $branch = mysqli_real_escape_string($con, $_POST['branch']);
    $phone_no = mysqli_real_escape_string($con, $_POST['phone_no']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
   

    // Handle image upload
    $image_path = "";
    if (isset($_FILES['student_image']) && $_FILES['student_image']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image_path = $target_dir . basename($_FILES["student_image"]["name"]);
        move_uploaded_file($_FILES["student_image"]["tmp_name"], $image_path);
    }
$submittedby=$_SESSION["username"];
$query = "INSERT INTO `students`(`id`, `trn_date`, `college_name`, `image_path`, `student_name`,`father_name`, `college_id_no`, `dob`, 
`department`, `branch`, `phone_no`, `addr`, `years`, `submittedby`) VALUES ('','$trn_date','$college_name',
'$image_path','$student_name','$father_name','$college_id_no','$dob','$department','$branch','$phone_no','$address',
'$year','$submittedby')";
mysqli_query($con,$query)or die(mysql_error());
$status="New Record inserted Successfully.</br></br><a href='view.php'>View inserted Record</a>";
}
?>

<div class="container">
  <h2 class="text-center mb-4">Student ID Card Generator</h2>
  <form  action="" method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="new" value="1"/>
    <div class="form-group">
      <label>College Name</label>
      <input type="text" name="college_name" class="form-control" >
    </div>
    <div class="form-group">
      <label>Upload Image</label>
      <input type="file" name="student_image" class="form-control-file" accept="image/*" >
    </div>
    <div class="form-group">
      <label>Student Name</label>
      <input type="text" name="student_name" class="form-control" >
    </div>
    <div class="form-group">
      <label>Father Name</label>
      <input type="text" name="father_name" class="form-control" >
    </div>
    <div class="form-group">
      <label>College ID No</label>
      <input type="text" name="college_id_no" class="form-control" >
    </div>
    <div class="form-group">
      <label>Date of Birth</label>
      <input type="date" name="dob" class="form-control">
    </div>
    <div class="form-group">
      <label>Department</label>
      <input type="text" name="department" class="form-control">
    </div>
    <div class="form-group">
      <label>Branch</label>
      <input type="text" name="branch" class="form-control" >
    </div>
    <div class="form-group">
      <label>Phone Number</label>
      <input type="text" name="phone_no" class="form-control" >
    </div>
    <div class="form-group">
      <label>Address</label>
      <textarea name="address" class="form-control" ></textarea>
    </div>
    <div class="form-group">
      <label>Year of Batch</label>
      <input type="text" name="year" class="form-control" >
    </div>
    <button type="submit" name="submit"class="btn btn-primary btn-block">Generate ID Card</button>
  </form>
</div>

<p style="color:#FF0000;"><?php echo $status?></p>
</div>
</div>
</body>
</html>



