﻿<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Genki School Clinic Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="font/flaticon.css">
    <link href="../../../css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="wrapper" class="wrapper">
        <div class="fxt-template-animation fxt-template-layout5">
            <div class="fxt-bg-img fxt-none-767" data-bg-image="img/figure/bg-first.png">
                <div class="fxt-intro">
                    <div class="sub-title">Welcome To</div>
                    <h1>Our Clinic</h1>
                    <p style="font-size: 15px; font-weight: 500;">Welcome to Your Clinic Management System Effortlessly manage your clinic with our streamlined solution. Our system simplifies clinic and clearance appointment scheduling, and manages your medical dispensary needs. Focus on providing exceptional care while we handle the administrative tasks. Experience the future of clinic management today!</p>
                </div>
            </div>
            <div class="fxt-bg-color">
                <div class="fxt-header">
                    <!-- < href="#" class="fxt-logo" style="font-size: 55px; color: rgb(27, 1, 61);"> -->
                        <span><img src="main/img/assets/GENKI.png" style="width: 40%;" alt="" ></span>

                        <div class="fxt-page-switcher">
                            <a href="index.php" class="switcher-text switcher-text1">LogIn</a>
                            <a href="register.php" class="switcher-text switcher-text2 active">Register</a>
                        </div>
                    
                </div>
                <div class="fxt-form">
                    <form id="register-form" method="POST">
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                            <input type="number" maxlength="6" class="form-control" name="schoolID"
                                placeholder="School ID" required="required">
                            <i class="flaticon-user"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name"
                                required="required">
                            <i class="flaticon-user"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                            <input type="text" class="form-control" name="middlename" placeholder="Middle Name"
                                required="required">
                            <i class="flaticon-user"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-1">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                                required="required">
                            <i class="flaticon-user"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-2">
                            <input type="email" class="form-control" name="email" placeholder="Your Email"
                                required="required">
                            <i class="flaticon-envelope"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-3">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                required="required">
                            <i class="flaticon-padlock"></i>
                        </div>
                        <div class="form-group fxt-transformY-50 fxt-transition-delay-4">
                            <div class="fxt-content-between">
                                <button type="submit" class="fxt-btn-fill">Register</button>
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" required>
                                    <label for="checkbox1">I agree the terms of services</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- <div class="fxt-footer">
					<ul class="fxt-socials">
						<li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-6"><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
						<li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-7"><a href="#" title="twitter"><i class="fab fa-twitter"></i></a></li>
						<li class="fxt-google fxt-transformY-50 fxt-transition-delay-8"><a href="#" title="google"><i class="fab fa-google-plus-g"></i></a></li>
						<li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-9"><a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="fxt-pinterest fxt-transformY-50 fxt-transition-delay-9"><a href="#" title="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
					</ul>
				</div> -->
            </div>
        </div>
    </div>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/validator.min.js"></script>
    <script src="js/main.js"></script>
    <script src="main/backend/js-backend/handler.js"></script>
</body>

</html>