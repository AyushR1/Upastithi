<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

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
          <a class="nav-item nav-link" href="report.php">My Report</a>
          <a class="nav-item nav-link" href="account.php">My Account</a>
          <a class="nav-item nav-link" href="/ATTEDANCE2/logout.php">Logout</a>
        </div>
      </div>
    </nav>

</header>

<center>

    <div class="row">



      <div class="content">
        
      <div class="row justify-content-center">
        <h2 class="heading-section" style="color: white">Student List</h2>
      </div>

        <br>
        <form method="post" action="">
          <label class="control-label" style="color: white">Batch </label>
          <input type="text" name="sr_batch" placeholder="(ex. 2024)">
          <input type="submit" name="sr_btn" class="btn btn-secondary" value="Go!">
        </form>
        <br>
        <table class="table table-hover table-dark">
          <thead>
            <tr>
              <th scope="col">Student Roll No</th>
              <th scope="col">Name</th>
              <th scope="col">Department</th>
              <th scope="col">Batch</th>
              <th scope="col">Semester</th>
              <th scope="col">Email</th>
            </tr>
          </thead>

          <?php

          if (isset($_POST['sr_btn'])) {

            $srbatch = $_POST['sr_batch'];
            $i = 0;

            $all_query = mysqli_query($con, "select * from students where students.st_batch = '$srbatch' order by st_id asc ");

            while ($data = mysqli_fetch_array($all_query)) {
              $i++;

          ?>
              <tbody>
                <tr>
                  <td><?php echo $data['st_id']; ?></td>
                  <td><?php echo $data['st_name']; ?></td>
                  <td><?php echo $data['st_dept']; ?></td>
                  <td><?php echo $data['st_batch']; ?></td>
                  <td><?php echo $data['st_sem']; ?></td>
                  <td><?php echo $data['st_email']; ?></td>
                </tr>
              </tbody>

          <?php
            }
          }
          ?>

        </table>

      </div>

    </div>

  </center>


</body>
</html>
