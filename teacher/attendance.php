<?php

ob_start();
session_start();

if ($_SESSION['name'] != 'oasis') {
  header('location: login.php');
}
?>

<?php
include('connect.php');
try {

  if (isset($_POST['att'])) {

    $course = $_POST['whichcourse'];

    foreach ($_POST['st_status'] as $i => $st_status) {

      $stat_id = $_POST['stat_id'][$i];
      $dp = date('Y-m-d');
      $course = $_POST['whichcourse'];

      $stat = mysqli_query($con, "insert into attendance(stat_id,course,st_status,stat_date) values('$stat_id','$course','$st_status','$dp')");

      $att_msg = "Attendance Recorded.";
    }
  }
} catch (Execption $e) {
  $error_msg = $e->$getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>RGIPT Attendance Management System</title>
  <meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="../main.css">

  <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <style type="text/css">
    .status {
      font-size: 10px;
    }
  </style>

</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link" href="index.php">Home</a>
          <a class="nav-item nav-link" href="students.php">Students</a>
          <a class="nav-item nav-link" href="teachers.php">Faculties</a>
          <a class="nav-item nav-link" href="attendance.php">Attendance</a>
          <a class="nav-item nav-link" href="report.php">Report</a>
          <a class="nav-item nav-link" href="/ATTEDANCE2/logout.php">Logout</a>
        </div>
      </div>
    </nav>

  </header>

  <center>

    <div class="row">

      <div class="content">
        <div class="row justify-content-center">
          <h2 class="heading-section" style="color: white">Attendance of <?php echo date('Y-m-d'); ?></h2>
        </div>
        <br>

        <center>
          <p><?php if (isset($att_msg)) echo $att_msg;
              if (isset($error_msg)) echo $error_msg; ?></p>
        </center>

        <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">

          <div style="display:inline">
            <div style="float: left;">
              <div class="form-group">

              <label class="control-label" style="color: white">Select Batch</label>

                <select name="whichbatch" id="input1">
                  <option name="eight" value="2024">2024</option>
                  <option name="seven" value="2025">2025</option>
                </select>
              </div>
            </div>

            <div style="display:inline">
              <div style="float: left; ">
                <form action="" method="post">

                  <div class="form-group">

                    <label class="control-label" style="color: white">Select Course</label>
                    <select name="whichcourse" id="input1">
                      <option name="dbms" value="dbms">Database Management Systems</option>
                      <option name="web" value="web">Web Technology</option>
                    </select>

                  </div>
              </div>
            </div>
            </div>


            <input type="submit" class="btn btn-secondary col-md-2 col-md-offset-5" value="Show!" name="batch" />

        </form>



        <table class="table table-hover table-dark">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Department</th>
              <th scope="col">Batch</th>
              <th scope="col">Semester</th>
              <th scope="col">Email</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <?php

          if (isset($_POST['batch'])) {

            $i = 0;
            $radio = 0;
            $batch = $_POST['whichbatch'];
            $all_query = mysqli_query($con, "select * from students where st_batch='$batch' order by st_id asc");

            while ($data = mysqli_fetch_array($all_query)) {
              $i++;
          ?>

              <body>
                <tr>
                  <td><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
                  <td><?php echo $data['st_name']; ?></td>
                  <td><?php echo $data['st_dept']; ?></td>
                  <td><?php echo $data['st_batch']; ?></td>
                  <td><?php echo $data['st_sem']; ?></td>
                  <td><?php echo $data['st_email']; ?></td>
                  <td>
                    <label>Present</label>
                    <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" checked>
                    <label>Absent </label>
                    <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent">
                  </td>
                </tr>
              </body>

          <?php

              $radio++;
            }
          }
          ?>
        </table>

        <center><br>
          <input type="submit" class="btn btn-warning col-md-2 col-md-offset-10" value="Save!" name="att" />
        </center>

        </form>
      </div>

    </div>

  </center>

</body>

</html>