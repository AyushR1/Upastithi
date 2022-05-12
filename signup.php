<?php

include('connect.php');

try {

  if (isset($_POST['signup'])) {

    if (empty($_POST['email'])) {
      throw new Exception("Email cann't be empty.");
    }

    if (empty($_POST['uname'])) {
      throw new Exception("Username cann't be empty.");
    }

    if (empty($_POST['pass'])) {
      throw new Exception("Password cann't be empty.");
    }

    if (empty($_POST['fname'])) {
      throw new Exception("Username cann't be empty.");
    }
    if (empty($_POST['phone'])) {
      throw new Exception("Username cann't be empty.");
    }
    if (empty($_POST['type'])) {
      throw new Exception("Username cann't be empty.");
    }

    $result = mysqli_query($con, "insert into admininfo(username,password,email,fname,phone,type) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')");
    $success_msg = "Signup Successfully!";
  }
} catch (Exception $e) {
  $error_msg = $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>RGIPT Attendance Management System</title>
  <meta charset="UTF-8">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <header>

    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section">RGIPT Attendance Management System</h2>
        <h3 class="heading-section">Sign Up</h3>
      </div>
    </div>

  </header>
  <center>

    <div class="row">



      <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
        <div style="color: green;">
          <?php
          if (isset($success_msg)) echo $success_msg;
          ?>
        </div>
        <div style="color: red;">
          <?php
          if (isset($error_msg)) echo $error_msg;
          ?>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-3 control-label" style="color: white">Email</label>
          <div class="col-sm-7">
            <input type="text" name="email" class="form-control" id="input1" placeholder="Enter your email" />
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-3 control-label" style="color: white">Username</label>
          <div class="col-sm-7">
            <input type="text" name="uname" class="form-control" id="input1" placeholder="choose username" />
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-3 control-label" style="color: white">Password</label>
          <div class="col-sm-7">
            <input type="password" name="pass" class="form-control" id="input1" placeholder="choose a strong password" />
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-3 control-label" style="color: white">Full Name</label>
          <div class="col-sm-7">
            <input type="text" name="fname" class="form-control" id="input1" placeholder="Enter your full name" />
          </div>
        </div>

        <div class="form-group">
          <label for="input1" class="col-sm-3 control-label" style="color: white">Phone Number</label>
          <div class="col-sm-7">
            <input type="text" name="phone" class="form-control" id="input1" placeholder="Enter your phone number" />
          </div>
        </div>


        <div class="form-group" class="radio">
          <label for="input1" class="col-sm-3 control-label" style="color: white">Role</label>
          <div class="col-sm-7">
            <label>
              <input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
            </label>
            <label>
              <input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher
            </label>
            <label>
              <input type="radio" name="type" id="optionsRadios1" value="admin"> Admin
            </label>
          </div>
        </div>

        <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" value="Signup" name="signup" />
      </form>
    </div>
    <br>
    <p><strong>Already have an account? <a href="index.php">Login</a> here.</strong></p>

    </div>

  </center>

</body>

</html>