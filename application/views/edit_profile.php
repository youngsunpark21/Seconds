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
      </nav>

      <div class="d-flex flex-column align-items-center mt-3">
          <h2>Edit Profile</h2>
          <img src="<?php echo base_url();?>image/user.png" width="90" height="90" class="d-inline-block align-top" alt="myImage">

          <!-- Create a form -->
      <?php echo validation_errors(); ?>
      <?php echo form_open('profile/edit'); ?>
      <!-- <form method="POST" action="registerfunc.php" class="d-flex flex-column align-items-center mt-2"> -->
        <div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
            <p>Email:</p>
            <input id="edit_useremail" type="email" name="edit_email" placeholder="<?php echo $email;?>" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
            <p>Phone number:</p>
            <input id="edit_userphone" type="text" name="edit_phonenum" placeholder="<?php echo $phonenum;?>" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
            <p>First name:</p>
            <input name="edit_fname" type="text" aria-label="First name" placeholder="<?php echo $firstname;?>" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
            <p>Last name:</p>
            <input name="edit_lname" type="text" aria-label="Last name" placeholder="<?php echo $lastname;?>" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
            <p>Safety question:</p>
            <input id="usersafetyqns-input" type="text" name="edit_safetyqns" placeholder="<?php echo $safetyqns;?>" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-9 mt-3 col-centered">
            <p>Safety answer:</p>
            <input id="usersafetyqns-input" type="text" name="edit_safetyans" placeholder="<?php echo $safetyans;?>" class="form-control" required>
        </div>
        <div class="text-center mt-3 mb-3">
            <button id="submit-button" type="submit" class="btn btn-primary text-center">Save changes</button>
        </div>
      <?php
      echo form_close();
      ?>

      </div>

    </body>