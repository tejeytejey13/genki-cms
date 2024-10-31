<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Genki School Clinic Management System</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="shortcut icon" href="main/img/assets/PNJK PNG.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?ver=1.0">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
	<div id="loading-show" class="loading"></div>
	<div id="toast-container" class="toast-container top-right"></div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<form class="login100-form validate-form" id="login-form" method="POST">
				<span class="login100-form-title p-b-43" >
					<h3 style="font-size: 2rem; font-weight: bold; color: #134280 !important;">Welcome Back!</h3>
					<h6 style="margin-top: 1vh; font-weight: 100; font-size: 1rem; color: #134280 !important;">Don't have an account yet? <a
							href="register.php" style="font-weight: 100; font-size: 1rem; color: #134280;">Sign Up</a>
					</h6>
				</span>

				
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>

				<div class="login100-more" style="background-image: url('img/figure/bg-first.png');">
				</div>
			</div>
		</div>
	</div>
    <script src="js/jquery-3.5.0.min.js?ver=1.0"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/validator.min.js"></script>
    <script src="js/main.js"></script>
	<script src="main/backend/js-backend/handler.js"></script>

</body>

</html>