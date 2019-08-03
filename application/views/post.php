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
    <div id="page-container">
    <div id="content-wrap">
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="<?php echo site_url('start/index'); ?>">
            <img src="<?php echo base_url();?>image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            Seconds
          </a>
      </nav>

    <div class="d-flex flex-column align-items-center mt-3">
        <img src="<?php echo base_url();?>image/logo.png" width="5%" alt="logo">
        <h1>Seconds</h1>
    </div>

    <div class="d-flex flex-column align-items-center mt-3">
      <h1 class="display-4">Post a new item</h1>
      <h2 class="display-5">Write information about the item</h2>

      <!-- Create a form -->
      <?php echo validation_errors(); ?>
      <?php echo form_open('post/index'); ?>
      <!-- <form method="POST" action="registerfunc.php" class="d-flex flex-column align-items-center mt-2"> -->
        <div class="form-group col-xs-5 col-lg-10 col-centered mt-3" style="width: 150%;">
            <input id="item_title" type="text" name="item_title" placeholder="Title of post" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-10 col-centered mt-3" style="width: 150%;">
            <input name="cost" id="cost" type="text" placeholder="Cost of item" class="form-control" required>
        </div>
        <div class="form-group col-xs-5 col-lg-10 col-centered mt-3" style="width: 150%;">
            <input id="item_desc" type="text" name="item_desc" placeholder="Description" class="form-control" required>
        </div>

        <div class="text-center mt-3">
            <button id="submit-button" type="submit" class="btn btn-primary text-center">Post</button>
        </div>
      <?php
      echo form_close();
      ?>
    </div>
    </div>
