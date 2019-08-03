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
  
  <body>
<nav class="navbar navbar-light bg-light">
          <a class="navbar-brand" href="<?php echo site_url('start/index');?>">
            <img src="<?php echo base_url();?>image/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            Seconds
          </a>

          <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </nav>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clothing
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Outers</a>
                    <a class="dropdown-item" href="#">Tops</a>
                    <a class="dropdown-item" href="#">Bottoms</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Electronics
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Computers</a>
                    <a class="dropdown-item" href="#">Mobile Phones</a>
                    <a class="dropdown-item" href="#">Other Gadgets</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Stationery
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Files/Binders</a>
                    <a class="dropdown-item" href="#">Pen/Penciles</a>
                    <a class="dropdown-item" href="#">Others</a>
                  </div>
              </li>
            </ul>

          </div>
      </nav>

      <div class="d-flex flex-column align-items-center mt-3">
        <div class="card mb-3" style="width:70%;">

            <?php
              //reconnect to database
              $this->load->database();

              //load array helper
              $this->load->helper('array');

              //retrieve item picture
              $pic_sql = "SELECT picture FROM pictures WHERE item_id = ?";
              $pic_query = $this->db->query($pic_sql, array($item_id));
              $picture = $pic_query->row_array();

              if($picture['picture'] != null){
                echo "<img src='";
                echo $picture['picture'];
                echo "' class='card-img-top' alt='sampleItem' style='width:30%; align-self: center;'>";
              } else {
                echo "<img src='";
                echo base_url();
                echo "image/sampleItem.jpg' class='card-img-top' alt='sampleItem' style='width:30%; align-self: center;'>";
              }
            ?>
            
            <div class="card-header">
                <div class="d-flex d-flex justify-content-between">
                    <h2 class="card-title"><?php echo $item_title?></h2>
                    <h2>$<?php echo $cost?></h2>
                </div>
            </div>
            <div class="card-body">
                    <p class="card-text"><?php echo $item_desc?></p>
                    <p class="card-text"><small class="text-muted"><?php echo "posted by ".$username?></small></p>
                    <p class="card-text"><small class="text-muted"><?php echo $time?></small></p>
            </div>
            <div class="container">
            <form method="POST" id="comment_form">
              <div class="form-group">
              <input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
              </div>
              <div class="form-group">
              <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
              </div>
              <div class="form-group">
              <input type="hidden" name="comment_id" id="comment_id" value="0" />
              <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
              </div>
            </form>
            <span id="comment_message"></span>
            <br />
            <div id="display_comment"></div>
            </div>
        </div>
      </div>