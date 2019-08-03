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
      </nav>

      <div class="d-flex flex-column align-items-center mt-3">
          <h2>My Profile</h2>
          <img src="<?php echo base_url();?>image/user.png" width="90" height="90" class="d-inline-block align-top" alt="myImage">
          <!-- Use php or ajax to write about the profile -->

          <table>
            <tr>
              <td align="right">Username:</td>
              <?php
              echo "<td>";
              echo $username;
              echo "</td>";
              ?>
            </tr>
            <tr>
              <td align="right">First name:</td>
              <?php
              echo "<td>";
              echo $firstname;
              echo "</td>";
              ?>
            </tr>
            <tr>
              <td align="right">Last name:</td>
              <?php
              echo "<td>";
              echo $lastname;
              echo "</td>";
              ?>
            </tr>
            <tr>
              <td align="right">Email:</td>
              <?php
              echo "<td>";
              echo $email;
              echo "</td>";
              ?>
            </tr>
            <tr>
              <td align="right">Phone number:</td>
              <?php
              echo "<td>";
              echo $phonenum;
              echo "</td>";
              ?>
            </tr>
            <tr>
              <td align="right">Safety Question:</td>
              <?php
              echo "<td>";
              echo $safetyqns;
              echo "</td>";
              ?>
            </tr>
            <tr>
              <td align="right">Safety Answer:</td>
              <?php
              echo "<td>";
              echo $safetyans;
              echo "</td>";
              ?>
            </tr>
          </table>

          <!-- Create a form -->
          <!-- validate error -->
          <?php echo form_open('profile/loadEditPage'); ?>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button>
          <?php
            echo form_close();
          ?>
      </div>
      </div>
      </div>
