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
        <h2 class="display-5">Insert item image</h2>

        <!-- Create image upload form -->
        <?php echo form_open_multipart('picture/uploadPic');?>
        <?php echo form_upload(['name'=>'userfile', 'value'=>'Save']); ?>
          <?php echo form_error('userfile', '<div class="text-danger">', '</div>'); ?>
          
          <?php echo form_submit(['name'=>'submit', 'value'=>'PUBLISH_IMAGE']);?>

        <?php echo form_close();?>
      </div>
    </div>
    </div>