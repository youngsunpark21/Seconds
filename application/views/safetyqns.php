<!doctype html>
<html lang="en">

	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php $this->load->helper('url'); echo base_url();?>css/style.css">
    
    <title>Seconds</title>
	</head>	
	
	<body class="signinBody">
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="<?php echo site_url('start/index'); ?>">
            <img src="<?php echo base_url();?>image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            Seconds
          </a>

          <div class="d-inline-block">
            <a id="cardLinks" href="<?php echo site_url('register/index'); ?>">Register</a>
            <img src="<?php echo base_url();?>image/user.png" width="30" height="30" class="d-inline-block align-top" alt="myImage">
          </div>
      </nav>

    <div class="d-flex flex-column align-items-center mt-3">
        <img src="<?php echo base_url();?>image/logo.png" width="5%" height="5%" alt="logo">
        <h1>Seconds</h1>
    </div>

    <main>
      <div class="d-flex flex-column align-items-center my-3">
        <h1 class="display-4">Forget Password</h1>

        <!-- Create form -->
        <?php echo validation_errors(); ?>
        <?php echo form_open('forget/process_safetyqns'); ?>
        <!-- <form method="POST" action="signinfunc.php" class="d-flex flex-column align-items-center mt-2"> -->
          <div class="form-group" style="width: 150%;">
              <?php
              $this->load->library('session');

              if(isset($_SESSION['forget_safetyans_invalid'])){
                  echo "<p>Invalid answer. Please try again.</p>";
              }

              if(isset($_SESSION['password_retreive'])){
                echo "<p>This is your password is ";
                echo $_SESSION['password_retreive'];
                echo "</p>";
            }
              ?>
              <h5>Your safety question is</h5>
              <h3><?php echo $forget_safetyqns ?></h3>
              <h5>What is your safety answer?</h5>
              <input id="username-input" type="text" name="forget_safetyans" placeholder="Enter safety asnwer" class="form-control" required>
          </div>
          <div class="text-center mt-3">
              <button id="submit-button" type="submit" class="btn btn-primary text-center">Find password</button>
          </div>
        <?php echo form_close(); ?>
      </div>
    </main>