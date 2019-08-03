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
  <div id="page-container">
    <div id="content-wrap">
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
        <img src="<?php echo base_url();?>image/logo.png" width="100" height="100" alt="logo">
        <h1>Seconds</h1>
    </div>

      <div class="d-flex flex-column align-items-center mt-3">
          <h1 class="display-4">Sign In</h1>
      </div>

      <div class="d-flex flex-column align-items-center mt-3">
        <?php
        $this->load->library('session');
        if(!isset($_SESSION['is_signed_in']) && isset($_SESSION['attempt_signin'])){
          echo "<p> Wrong username or password. Please try it again.</p>";
        }
        ?>

        <!-- Create form -->
        <?php echo validation_errors(); ?>
        <?php echo form_open('signin/index'); ?>
        <!-- <form method="POST" action="signinfunc.php" class="d-flex flex-column align-items-center mt-2"> -->
          <div class="form-group col-xs-5 col-lg-10 col-centered" style="width: 150%;">
              <input id="username-input" type="text" name="username" placeholder="Enter username" class="form-control" required>
          </div>
          <div class="form-group col-xs-5 col-lg-10 col-centered mt-2" style="width: 150%;">
              <input id="password-input" type="password" name="password" placeholder="Enter password" class="form-control" required>
          </div>
          <div class="text-center mt-3">
            <input type="checkbox" name="remember" aria-label="Checkbox for remember">
            <small>Remember me</small>
          </div>
          <div class="text-center mt-3">
              <button id="submit-button" type="submit" class="btn btn-primary text-center">Sign In</button>
          </div>
        </form>


        <div>
          <small>Forgot your password?</small>
          <?php
          //URL helper
          $this->load->helper('url');

            echo "<a href='";
            echo site_url('forget/index');
            echo "'><small>Find now</small></a>";
          
          ?>
        </div>
        <div>
          <small>Don't have an account?</small>
          <?php
          //URL helper
          $this->load->helper('url');

          if(!isset($_SESSION['is_signed_in'])){
            echo "<a href='";
            echo site_url('register/index');
            echo "'><small>Register now</small></a>";
          }
          ?>
        </div>
      </div>
      </div>
