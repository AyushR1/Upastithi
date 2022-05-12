  <?php

  ob_start();
  session_start();

  //checking if the session is valid
  if ($_SESSION['name'] != 'oasis') {
    header('location: am/login.php');
  }
  ?>

  <?php include('connect.php'); ?>


  <?php
  try {

    //checking form data and empty fields
    if (isset($_POST['done'])) {

      if (empty($_POST['name'])) {
        throw new Exception("Name cannot be empty");
      }
      if (empty($_POST['dept'])) {

        throw new Exception("Department cannot be empty");
      }
      if (empty($_POST['batch'])) {
        throw new Exception("Batch cannot be empty");
      }
      if (empty($_POST['email'])) {
        throw new Exception("Email cannot be empty");
      }

      //initializing the Student Roll No
      $sid = $_POST['id'];

      //udating students information to database table "students"
      $result = mysqli_query($con, "update students set st_name='$_POST[name]',st_dept='$_POST[dept]',st_batch='$_POST[batch]',st_sem='$_POST[semester]', st_email = '$_POST[email]' where st_id='$sid'");
      $success_msg = 'Updated  successfully';
    }
  } catch (Exception $e) {

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
    <link rel="stylesheet" type="text/css" href="../styles.css">

    <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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

    <!-- Content, Tables, Forms, Texts, Images started -->
    <center>

      <div class="row">
        <div class="content">
          <div class="row justify-content-center">
            <h2 class="heading-section" style="color: white">Update Account</h2>
          </div>
          <br>

          <!-- Error or Success Message printint started -->
          <p>
            <?php

            if (isset($success_msg)) {
              echo $success_msg;
            }
            if (isset($error_msg)) {
              echo $error_msg;
            }

            ?>
          </p><!-- Error or Success Message printint ended -->

          
          <br>
          <form action="" method="post">
            <br>
            <label class="control-label" style="color: white">Student Roll No </label>
            <input type="text" name="sr_id" placeholder="(ex. 20cs3018)">
            <input type="submit" name="sr_btn" class="btn btn-secondary" value="Go!">

            <br>

          </form>


          <?php

          if (isset($_POST['sr_btn'])) {

            //initializing Student Roll No from form data
            $sr_id = $_POST['sr_id'];

            $i = 0;

            //searching students information respected to the particular ID
            $all_query = mysqli_query($con, "select * from students where students.st_id='$sr_id'");
            while ($data = mysqli_fetch_array($all_query)) {
              $i++;

          ?>
              <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
                <table class="table table-hover table-dark">

                  <tr>
                    <td>Student Roll No:</td>
                    <td><?php echo $data['st_id']; ?></td>
                  </tr>

                  <tr>
                    <td>Student's Name:</td>
                    <td><input type="text" name="name" value="<?php echo $data['st_name']; ?>"></input></td>
                  </tr>

                  <tr>
                    <td>Department:</td>
                    <td><input type="text" name="dept" value="<?php echo $data['st_dept']; ?>"></input></td>
                  </tr>

                  <tr>
                    <td>Batch:</td>
                    <td><input type="text" name="batch" value="<?php echo $data['st_batch']; ?>"></input></td>
                  </tr>

                  <tr>
                    <td>Semester:</td>
                    <td><input type="text" name="semester" value="<?php echo $data['st_sem']; ?>"></input></td>
                  </tr>

                  <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" value="<?php echo $data['st_email']; ?>"></input></td>
                  </tr>
                  <input type="hidden" name="id" value="<?php echo $sr_id; ?>">

                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary col-md-3 col-md-offset-7" value="Update" name="done" /></td>

                  </tr>

                </table>
              </form>
          <?php
            }
          }
          ?>


        </div>

      </div>

    </center>
    <!-- Contents, Tables, Forms, Images ended -->

  </body>
  <!-- Menus ended -->

  </html>