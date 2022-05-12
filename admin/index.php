<?php

ob_start();
session_start();

if ($_SESSION['name'] != 'oasis') {

  header('location: /ATTEDANCE2/index.php');
}
?>

<?php

include('connect.php');

//data insertion
try {

  //checking if the data comes from students form
  if (isset($_POST['std'])) {

    //students data insertion to database table "students"
    $result = mysqli_query($con, "insert into students(st_id,st_name,st_dept,st_batch,st_sem,st_email) values('$_POST[st_id]','$_POST[st_name]','$_POST[st_dept]','$_POST[st_batch]','$_POST[st_sem]','$_POST[st_email]')");
    $success_msg = "Student added successfully.";
  }

  //checking if the data comes from teachers form
  if (isset($_POST['tcr'])) {

    //teachers data insertion to the database table "teachers"
    $res = mysqli_query($con, "insert into teachers(tc_id,tc_name,tc_dept,tc_email,tc_course) values('$_POST[tc_id]','$_POST[tc_name]','$_POST[tc_dept]','$_POST[tc_email]','$_POST[tc_course]')");
    $success_msg = "Teacher added successfully.";
  }
} catch (Execption $e) {
  $error_msg = $e->getMessage();
}

?>



<!DOCTYPE html>
<html lang="en">
<!-- head started -->

<head>
  <title>RGIPT Attendance Management System</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../main.css">

  <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="../styles.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .message {
      padding: 10px;
      font-size: 15px;
      font-style: bold;
      color: black;
    }
  </style>
</head>
<!-- head ended -->

<!-- body started -->

<body>

  <!-- Menus started-->
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link" href="signup.php">Create Users</a>
          <a class="nav-item nav-link" href="index.php">Add Data</a>
          <a class="nav-item nav-link" href="/ATTEDANCE2/logout.php">Logout</a>
        </div>
      </div>
    </nav>

  </header>


  <!-- Menus ended -->

  <center>
    <!-- Error or Success Message printint started -->
    <div class="message">
      <?php if (isset($success_msg)) echo $success_msg;
      if (isset($error_msg)) echo $error_msg; ?>
    </div>
    <!-- Error or Success Message printint ended -->

    <!-- Content, Tables, Forms, Texts, Images started -->
    <div class="content">
      <div style="padding: 20px;">
        <div  id="student">
          <form method="post" class="form-horizontal col-md-6 col-md-offset-3" style="width: 50%;float: left;  padding: 20px;">
            <div class="col-md-6 text-center mb-5">
              <h2 class="heading-section" style="color: white;">Add Student's Information</h2>
            </div>
            <div class="form-group">
              <div class="col-sm-7">
                <input type="text" name="st_id" class="form-control" id="input1" placeholder="Student Roll No" />
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-7">
                <input type="text" name="st_name" class="form-control" id="input1" placeholder="student full name" />
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-7">
                <input type="text" name="st_dept" class="form-control" id="input1" placeholder="department ex. CSE" />
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-7">
                <input type="text" name="st_batch" class="form-control" id="input1" placeholder="batch e.x 2024" />
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-7">
                <input type="text" name="st_sem" class="form-control" id="input1" placeholder="semester ex. 4" />
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-7">
                <input type="email" name="st_email" class="form-control" id="input1" placeholder="valid email" />
              </div>
            </div>


            <input type="submit" class="btn btn-secondary col-md-2 col-md-offset-8" value="Add Student" name="std" />
          </form>
          <div id="teacher">
            <form method="post" class="form-horizontal col-md-6 col-md-offset-3" style="width: 50%; float: left;  padding: 20px ">
              <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section" style="color: white;">Add Teacher's Information</h2>
              </div>
              <div class="form-group">
                <div class="col-sm-7">
                  <input type="text" name="tc_id" class="form-control" id="input1" placeholder="teacher's id" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-7">
                  <input type="text" name="tc_name" class="form-control" id="input1" placeholder="teacher full name" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-7">
                  <input type="text" name="tc_dept" class="form-control" id="input1" placeholder="department ex. CSE" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-7">
                  <input type="email" name="tc_email" class="form-control" id="input1" placeholder="valid email" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-7">
                  <input type="text" name="tc_course" class="form-control" id="input1" placeholder="course ex. Web" />
                </div>
              </div>

              <input type="submit" class="btn btn-secondary col-md-2 col-md-offset-8" value="Add Teacher" name="tcr" />
            </form>

          </div>

        </div>
      </div><br>
      <!-- Contents, Tables, Forms, Images ended -->

  </center>
</body>
<!-- Body ended  -->

</html>