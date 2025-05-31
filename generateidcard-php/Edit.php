<?php
require("db.php");
include("auth.php");
$id=$_REQUEST['id'];
$query="SELECT* from students where id='".$id."'";
$result=mysqli_query($con,$query)or die (mysqli_error());
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="idcard.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>  
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a>|<a href="insert.php">insert New Record</a>|<a
href="logout.php">  Logout</a></p>
<h1>Update Record</h1>
<?php
$status="";
if(isset($_POST['new'])&& $_POST['new']==1)
{
$id=$_REQUEST['id'];
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
$update="UPDATE `students` SET `trn_date`='$trn_date',`college_name`='$college_name',`student_name`='$student_name',`college_id_no`='$college_id_no',`dob`='$dob',`department`='$department',`branch`='$branch',`phone_no`='$phone_no',`addr`='$address',`years`='$year',`submittedby`='$submittedby'WHERE id='".$id."'";
mysqli_query($con,$update)or die(mysqli_error());
$status="Record Updated Successfully.</br></br><a href='view.php'>View Updated Record</a>";
echo'<p style="color:#FF0000;">'.$status.'</p>';
}else{
?>
<div>
<div class="container">
  <h2 class="text-center mb-4">Student ID Card Generator</h2>
  <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="new" value="1"/>
<input name="id" type="hidden" value="<?php echo $row['id'];?>"/>
    <div class="form-group">
      <label>College Name</label>
      <input type="text" name="college_name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Upload Image</label>
      <input type="file" name="photo" class="form-control-file" accept="image/*" required>
    </div>
    <div class="form-group">
      <label>Student Name</label>
      <input type="text" name="student_name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Father Name</label>
      <input type="text" name="father_name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>College ID No</label>
      <input type="text" name="college_id_no" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Date of Birth</label>
      <input type="date" name="dob" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Department</label>
      <input type="text" name="department" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Branch</label>
      <input type="text" name="branch" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Phone Number</label>
      <input type="text" name="phone_no" class="form-control" required pattern="\d{10}">
    </div>
    <div class="form-group">
      <label>Address</label>
      <textarea name="address" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <label>Year of Batch</label>
      <input type="text" name="year" class="form-control" required placeholder="e.g., 2020-2024">
    </div>
    <button type="submit" name="submit"class="btn btn-primary btn-block">Generate ID Card</button>
  </form>
</div>
<?php
}
?>
</div>
</div>
</body>
</html>