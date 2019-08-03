<!doctype html>
<html lang="en">

	<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url();?>css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Seconds</title>
	</head>	
	
	<body>
  <div id="page-container">
    <div id="content-wrap">
      <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="<?php echo site_url('start/index');?>">
            <img src="<?php echo base_url();?>image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            Seconds
          </a>

          
          <!-- Create a form -->
          <!-- validate error -->
          <?php echo form_open('search/index'); ?>
          <!-- <form class="form-inline"> -->
          <div class='search_bar'>
              <input class="form-control" id="searchbar" type="search" name="search_key" placeholder="Search" aria-label="Search" required><button class="btn btn-outline-success" id="searchbutton" type="submit">Search</button>
          </div>
              <?php
              echo form_close();
              ?>
          

          <div class='d-inline-block'>
            <?php
            //URL helper
            $this->load->helper('url');

            if(!isset($_SESSION['is_signed_in'])){
              echo "<a id='cardLinks' href='";
              echo site_url('signin/index');
              echo "'>Sign in / Register</a>";
            }
    
            if(isset($_SESSION['is_signed_in'])) {
              echo "<a id='cardLinks' href='";
              echo site_url('post/index');
              echo "'>Post /</a>";

              echo "<a id='cardLinks' href='";
              echo site_url('signout/index');
              echo "'> Sign Out /</a>";

              echo "<a id='cardLinks' href='";
              echo site_url('profile/index');
              echo "'> My Profile /</a>";

              echo "<a id='cardLinks' href='";
              echo site_url('wishlist/index');
              echo "'> My Wishlist</a>";
            }
            ?>
            <img src='<?php echo base_url();?>image/user.png' width='30' height='30' class='d-inline-block align-top' alt='myImage'>
          </div>
          
      </nav>