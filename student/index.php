<?php

ob_start();
session_start();

if ($_SESSION['name'] != 'oasis') {
  header('location: /ATTEDANCE2/index.php');
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
          <a class="nav-item nav-link" href="index.php">Home</a>
          <a class="nav-item nav-link" href="students.php">Students</a>
          <a class="nav-item nav-link" href="report.php">My Report</a>
          <a class="nav-item nav-link" href="account.php">My Account</a>
          <a class="nav-item nav-link" href="/ATTEDANCE2/logout.php">Logout</a>
        </div>
      </div>
    </nav>

  </header>




  <!-- Menus ended -->

  <center>
    <div class="home">
      <main role="main" class="inner cover">
        <img src="/ATTEDANCE2/img/tcr.png" height="200px" width="300px" />
        <h1 class="cover-heading">Be attentive and be regular :)</h1>
        <p class="lead">
          <a href="report.php" class="btn btn-lg btn-secondary">View your Attendance</a>
        </p>
      </main>
    </div>

    <!-- Contents, Tables, Forms, Images ended -->

  </center>

</body>
<!-- Body ended  -->

</html>