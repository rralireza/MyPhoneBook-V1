<?php 
	require_once "class/management.php";
	$logsObj = new Log();
	$connect = $logsObj->config();
	if (isset($_POST['btn'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$passowrd = $_POST['password'];
		$logsObj->register($firstname , $lastname , $email , $username , $passowrd);
	}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="logcss/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">PhoneBook user Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(logimages/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Register</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
			<form class="signin-form" method="post">
						<div class="form-group mt-3">
			      			<input type="text" name="firstname" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">First Name</label>
			      		</div>
						<div class="form-group mt-3">
			      			<input type="text" name="lastname" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">Last Name</label>
			      		</div>
						<div class="form-group mt-3">
			      			<input type="text" name="email" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">E-Mail</label>
			      		</div>
			      		<div class="form-group mt-3">
			      			<input type="text" name="username" class="form-control" required>
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" name="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="btn">Register</button>
		            </div>
		            
		          </form>
		          <p class="text-center">Have an account?! <a data-toggle="tab" href="login.php">Login</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="logjs/jquery.min.js"></script>
  <script src="logjs/popper.js"></script>
  <script src="logjs/bootstrap.min.js"></script>
  <script src="logjs/main.js"></script>

	</body>
</html>

