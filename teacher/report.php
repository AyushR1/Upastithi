<?php

ob_start();
session_start();

if ($_SESSION['name'] != 'oasis') {
  header('location: login.php');
}
?>
<?php include('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>RGIPT Attendance Management System</title>
  <meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="../main.css">
  <link rel="stylesheet" type="text/css" href="../styles.css">

  <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
          <h2 class="heading-section" style="color: white">Individual Report</h2>
        </div>
        <br>

        <form action="" method="post">

          <div class="form-group">

            <label class="control-label" style="color: white">Select Course</label>
            <select name="whichcourse" id="input1">
              <option name="dbms" value="dbms">Database Management Systems</option>
              <option name="web" value="web">Web Technology</option>
            </select>



            <br>
            <label class="control-label" style="color: white">Student Roll No </label>
            <input type="text" name="sr_id" placeholder="(ex. 20cs3018)">
            <input type="submit" name="sr_btn" class="btn btn-secondary" value="Go!">

            <br>

        </form>

        <br>
        <div class="row justify-content-center">
          <h2 class="heading-section" style="color: white">Mass Report</h2>
        </div>
        <br>
        <form action="" method="post">
          <div class="form-group">

            <label class="control-label" style="color: white">Select Course</label>
            <select name="whichcourse" id="input1">
              <option name="dbms" value="dbms">Database Management Systems</option>
              <option name="web" value="web">Web Technology</option>
            </select>



            <br>
            <label class="control-label" style="color: white">Date (yyyy-mm-dd)</label>
            <input type="text" name="date" placeholder="(ex. 2022-05-12)">
            <input type="submit" name="sr_date" class="btn btn-secondary" value="Go!">
        </form>
        <br>

        <br>

        <br>

        <?php

        if (isset($_POST['sr_btn'])) {

          $sr_id = $_POST['sr_id'];
          $course = $_POST['whichcourse'];

          $single = mysqli_query($con, "select * from reports where reports.st_id='$sr_id' and reports.course = '$course'");

          $count_tot = mysqli_num_rows($single);
        }

        if (isset($_POST['sr_date'])) {

          $sdate = $_POST['date'];
          $course = $_POST['whichcourse'];

          $all_query = mysqli_query($con, "select * from reports where reports.stat_date='$sdate' and reports.course = '$course'");
        }
        if (isset($_POST['sr_date'])) {

        ?>

          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">Student Roll No</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Batch</th>
                <th scope="col">Date</th>
                <th scope="col">Attendance Status</th>
              </tr>
            </thead>


            <?php

            $i = 0;
            while ($data = mysqli_fetch_array($all_query)) {

              $i++;

            ?>
              <tbody>
                <tr>
                  <td><?php echo $data['st_id']; ?></td>
                  <td><?php echo $data['st_name']; ?></td>
                  <td><?php echo $data['st_dept']; ?></td>
                  <td><?php echo $data['st_batch']; ?></td>
                  <td><?php echo $data['stat_date']; ?></td>
                  <td><?php echo $data['st_status']; ?></td>
                </tr>
              </tbody>

          <?php
            }
          }
          ?>

          </table>


          <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
            <table class="table table-hover table-dark">

              <?php


              if (isset($_POST['sr_btn'])) {

                $count_pre = 0;
                $i = 0;
                while ($data = mysqli_fetch_array($single)) {
                  $i++;
                  if ($data['st_status'] == "Present") {
                    $count_pre++;
                  }
                  if ($i <= 1) {
              ?>


                    <tbody>
                      <tr>
                        <td>Student Roll No: </td>
                        <td><?php echo $data['st_id']; ?></td>
                      </tr>

                      <tr>
                        <td>Student Name: </td>
                        <td><?php echo $data['st_name']; ?></td>
                      </tr>

                      <tr>
                        <td>Department: </td>
                        <td><?php echo $data['st_dept']; ?></td>
                      </tr>

                      <tr>
                        <td>Batch: </td>
                        <td><?php echo $data['st_batch']; ?></td>
                      </tr>

                  <?php
                  }
                }

                  ?>

                  <tr>
                    <td>Total Class (Days): </td>
                    <td><?php echo $count_tot; ?> </td>
                  </tr>

                  <tr>
                    <td>Present (Days): </td>
                    <td><?php echo $count_pre; ?> </td>
                  </tr>

                  <tr>
                    <td>Absent (Days): </td>
                    <td><?php echo $count_tot -  $count_pre; ?> </td>
                  </tr>

                    </tbody>

                  <?php

                }

                  ?>
            </table>
          </form>

      </div>

    </div>

  </center>

</body>

</html>