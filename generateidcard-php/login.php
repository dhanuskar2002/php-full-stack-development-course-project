<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="idcard.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
      require('db.php');
      session_start();
// if form submitted, insert values into the database.
if (isset($_POST['username'])){

    $username= stripslashes($_REQUEST['username']);// removes backslashes 
    $username= mysqli_real_escape_string($con,$username);// escapes special characters in a string
    $password=stripslashes($_REQUEST['password']);
    $password=mysqli_real_escape_string($con,$password);
    //checking is user existing in the database or not
    $query="SELECT*FROM `users` WHERE username='$username' and password='$password'";
    $result=mysqli_query($con,$query)or die(mysqli_error());
    $rows=mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['username']=$username;
       
        header("Location:index.php");//Redirect user to index.php
    }else{
        echo"<div class='form'><h3>Username/password is incorrect,</h3><br/>Click here to<a href='login.php'>Login</a></div>'";
    }
    }else
    {
    ?>
<div class="form">
<h1>Log in</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="username" required/>
<input type="password" name="password" placeholder="password" required/>
<input name="submit" type="submit" value="login"/>
</form>
<p>Not registered yet?<a href='registration.php'>Register here</a></p>
</div>
<?php
}
?>