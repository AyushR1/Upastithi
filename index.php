<?php

if (isset($_POST['login'])) {
	//start of try block

	try {

		//checking empty fields
		if (empty($_POST['username'])) {
			throw new Exception("Username is required!");
		}
		if (empty($_POST['password'])) {
			throw new Exception("Password is required!");
		}
		//establishing connection with db and things
		include('connect.php');

		//checking login info into database
		$row = 0;
		$result = mysqli_query($con, "select * from admininfo where username='$_POST[username]' and password='$_POST[password]' and type='$_POST[type]'");

		$row = mysqli_num_rows($result);

		if ($row > 0 && $_POST["type"] == 'teacher') {
			session_start();
			$_SESSION['name'] = "oasis";
			header('location: teacher/index.php');
		} else if ($row > 0 &&  $_POST["type"] == 'student') {
			session_start();
			$_SESSION['name'] = "oasis";
			header('location: student/index.php');
		} else if ($row > 0 && $_POST["type"] == 'admin') {
			session_start();
			$_SESSION['name'] = "oasis";
			header('location: admin/index.php');
		} else {
			throw new Exception("Username,Password or Role is wrong, try again!");

			header('location: login.php');
		}
	}

	//end of try block
	catch (Exception $e) {
		$error_msg = $e->getMessage();
	}
	//end of try-catch
}

?>

<!DOCTYPE html>
<html>

<head>

	<title>RGIPT Attendance Management System</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="style.css">
</head>


<body class="img js-fullheight">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">RGIPT Attendance Management System</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center">Have an account? Login</h3>
						<h3 class="mb-4 text-center" style="color: red;">
							<?php
							if (isset($error_msg)) {

								echo $error_msg;
							}
							?>
						</h3>

						<form method="post" class="signin-form">
							<div class="form-group">

								<input type="text" name="username" class="form-control" id="input1" placeholder="Username" />
							</div>

							<div class="form-group">

								<input type="password" name="password" class="form-control" id="input1" placeholder="Password" />

							</div>

							<div class="mb-4 text-center">
								<div class="form-group" class="radio">

									<label class="btn btn-secondary btn-sm"><input type="radio" name="type" id="optionsRadios1" value="student" checked> Student
									</label>
									<label class="btn btn-secondary btn-sm">
										<input type="radio" name="type" id="optionsRadios1" value="teacher"> Teacher

									</label>
									<label class="btn btn-secondary btn-sm"><input type="radio" name="type" id="optionsRadios1" value="admin"> Admin</label>

								</div>
							</div>


							<div class="mb-4 text-center">
								<input type="submit" class="btn btn-success" value="Login" name="login" />
								<a href="reset.php" style="color: #fff"> Forgot Password?</a>

							</div>
						</form>
						<br>

					</div>

				</div>

			</div>

			<br>
			<br>
			<div class="mb-4 text-center">
				<div class="btn btn-outline-warning">
					<a href="signup.php" style="color: #fff">Sign Up</a>
				</div>
			</div>
		</div>

	</section>
	</center>
</body>

</html>