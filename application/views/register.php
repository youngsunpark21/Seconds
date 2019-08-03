<!doctype html>
<html lang="en">

	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url();?>css/style.css">
    
    <title>Seconds</title>
	</head>	
	
	<body class="signinBody">
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="<?php echo site_url('start/index'); ?>">
            <img src="<?php echo base_url();?>image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            Seconds
          </a>

          <div class="d-inline-block">
            <a id="cardLinks" href="<?php echo site_url('signin/index'); ?>">Sign In</a>
            <img src="<?php echo base_url();?>image/user.png" width="30" height="30" class="d-inline-block align-top" alt="myImage">
          </div>
      </nav>

    <div class="d-flex flex-column align-items-center mt-3">
        <img src="<?php echo base_url();?>image/logo.png" width="100" height="100" alt="logo">
        <h1>Seconds</h1>
    </div>

    <div class="d-flex flex-column align-items-center mt-3">
        <h1 class="display-4">Register</h1>
    </div>
    <div class="d-flex flex-column align-items-center mt-3">
      <?php
      $this->load->library('session');

      if(isset($_SESSION['repeated_username'])){
        echo "<p>This username is used. Please use other username.</p>";
      }

      if(isset($_SESSION['repeated_email'])){
        echo "<p>This email is used. Please use other email.</p>";
      }
      ?>
      <!-- Create a form -->
      <?php echo validation_errors(); ?>
      <?php echo form_open('register/index'); ?>
      <!-- <form method="POST" action="registerfunc.php" class="d-flex flex-column align-items-center mt-2"> -->
        <div class="form-group col-xs-5 col-lg-5 col-centered">
            <input id="username-input" type="text" name="register_username" placeholder="Enter username" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input id="useremail-input" type="email" name="register_email" placeholder="Enter email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input id="userphone-input" type="text" name="register_phonenum" placeholder="Enter phone number" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input name="register_fname" type="text" aria-label="First name" placeholder="First name" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input name="register_lname" type="text" aria-label="Last name" placeholder="Last name" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input id="psw" name="register_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="Enter password" class="form-control" required>
        </div>
        <div id="message">
            <h6>Password must contain the following:</h6>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input name="register_password_cfrm" id="pswconfirm" type="password" placeholder="Confirm password" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input id="usersafetyqns-input" type="text" name="register_safetyqns" placeholder="Enter safety question" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-5 mt-3 col-centered">
            <input id="usersafetyqns-input" type="text" name="register_safetyans" placeholder="Enter answer for the safety question" class="form-control" required>
        </div>
        <div>
            <input type="checkbox" aria-label="Checkbox for remember" required>
            <small>By signing up I agree to Seconds' Terms of Use and Privacy Policy and I consent to receiving marketing from Seconds and third party offers.</small>
          </div>
        <div class="text-center mt-3">
            <button id="submit-button" type="submit" class="btn btn-primary text-center">Register</button>
        </div>
      <?php
      echo form_close();
      ?>
      <div>
        <small>Already have an account?</small>
        <a href="<?php echo site_url('signin/index'); ?>"><small>Sign in</small></a>
      </div>
    </div>
