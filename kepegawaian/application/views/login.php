<!DOCTYPE html>
<html>
<head>
	<title>Login Karyawan</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL('assets/images/icon.png'); ?>" />
	<!-- My Style -->
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL('assets/custome/mystyle.css'); ?>">
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL('assets/bootstrap4/css/bootstrap.min.css'); ?>">
	<style>
		#devs {
			position: absolute;
			background-color: #222;
			top: 10px;
			padding: 5px 10px;
			font-size: 11px;
			display: none;
		}
		.hi {
			color: #444;
			display: none;
			background-color: rgb(255, 255, 188);
			border: 2px solid #dbdb81;
			padding: 10px;
			position: absolute;
			width: 380px;
			border-radius: 3px;
			top: -60px;
			font-size: 14px;
			box-shadow: 0px 0px 5px #999;
			text-align: center;
			right: 0px;
		}
	</style>
</head>
<body id="login">
<!-- Say Hello -->
<div class="container">
  <div class="row">
    <div class="col-lg-4 offset-lg-4 col-md-12" id="box-login">
		<?php
	    /* This sets the $time variable to the current hour in the 24 hour clock format */
	    $time = date("H");
	    /* Set the $timezone variable to become the current timezone */
	    $timezone = date("e");
	    /* If the time is less than 1200 hours, show good morning */
	    if ($time < "12") {
	        $hi = "Selamat Pagi";
	    } else
	    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
	    if ($time >= "12" && $time < "17") {
	        $hi = "Selamat Sore";
	    } else
	    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
	    if ($time >= "17" && $time < "19") {
	        $hi = "Selamat Malam";
	    } else
	    /* Finally, show good night if the time is greater than or equal to 1900 hours */
	    if ($time >= "19") {
	        $hi = "Selamat Malam";
	    }
	    ?>
		<div class="hi">
			<em>Hi, <b><?= $hi; ?></b>, silahkan login ..</em>
		</div>
    	<h6 id="devs"><code style="color: yellow">Development</code></h6>
    	<div class="img">
			<img src="<?= BASE_URL('assets/images/icon.png') ?>" alt="Logo Employe" width="70">
			<h4 class="font-weight-light mt-3 mb-0" id="title">Login Karyawan</h4>
    	</div>
    	<hr class="mb-3 mt-0">
		<?= $this->session->flashdata('msg-error'); ?>
    	<div class="form">
			<!-- Login -->
    		<form id="formLogin" action="<?= SITE_URL('user/auth/signin'); ?>" method="POST">
			  <div class="form-group">
			    <label for="inputUsername">Username</label>
			    <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
			  </div>
			  <div class="form-group">
			    <label for="inputPassword">Password</label>
			    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
			  </div>
			  <div class="text-center mt-4">
				  <button type="submit" id="btnLogin" class="btn">Login</button>
			  </div>
			</form>
			<!-- Forgot Password -->
    		<form id="formForgotPassword" class="d-none">
			  <div class="form-group">
			    <label for="inputUsernameForgot">Username</label>
			    <input type="text" class="form-control" id="inputUsernameForgot" placeholder="Username">
			     <small id="emailHelp" class="form-text fs-1 text-muted">Masukkan Username Anda untuk mengatur ulang katasandi. <br>hubungi Administrator jika lupa username: (+6281215909900)</small>
			  </div>
			  <div class="text-center mt-4">
				  <button type="submit" id="btnForgot" class="btn">Forgot Password</button>
			  </div>
			</form>
			<div class="text-center mt-2">
			  	<a class="text-muted text-center fs-2 mt-2" id="pageForgotPassword">Forgot Password?</a>
			</div>
    	</div>
    </div>
  </div>
</div>


<!-- Bootstrap 4 and jQuery -->
<script type="text/javascript" src="<?= BASE_URL('assets/jQuery/jQuery-3.3.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?= BASE_URL('assets/bootstrap4/js/bootstrap.min.js'); ?>"></script>
<script>
$(document).ready(function(){
	// Say hello for UX
	$('.hi').delay("slow").fadeIn();
	$('.hi').delay(3000).fadeOut();

	// Form Validation
	$('#inputUsername').focus(function(){
		$(this).css('borderColor', '#D8D8D8');
	})
	$('#inputPassword').focus(function(){
		$(this).css('borderColor', '#D8D8D8');
	})
	$('#btnLogin').click(function(e){
		isValid = true;

		if ($('#inputUsername').val() == ''){
			$('#inputUsername').css('borderColor', '#ff6b6b');
			isValid = false;
		}
		if ($('#inputPassword').val() == ''){
			$('#inputPassword').css('borderColor', '#ff6b6b');
			isValid = false;
		}

		if (isValid === false){
			e.preventDefault();
		}
	});

	// Toggle page forgot password 
	$('#pageForgotPassword').click(function(){
		if ($(this).text() == 'Forgot Password?'){
			$(this).text('Login Page');
			$('#title').text('Forgot Password');
			$('#formLogin').addClass('d-none');
			$('#formForgotPassword').removeClass('d-none');
		} else if ($(this).text() == 'Login Page'){
			$('#title').text('Login Karyawan');
			$('#formForgotPassword').addClass('d-none');
			$('#formLogin').removeClass('d-none');
			$(this).text('Forgot Password?');
		}
	});
});
</script>
</body>
</html>