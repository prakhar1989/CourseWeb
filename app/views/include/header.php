<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Course Registration</title>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" type="text/css" media="screen" charset="utf-8"/>
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
<?php
  if(isLoggedIn())
  {
?>
    <style>
      body{padding-top:40px;}
    </style>
<?php
  }
?>
  </head>
  <body>
<?php
  if(isLoggedIn())
  {
?>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="#">Round 3</a>
          <ul class="nav pull-left">
          <li class="active"><a href="#">Hi, <?php echo getUserName(); ?></a></li>
          <li class="pull-right"><?php echo anchor("logout", "Logout");?></li>
          </ul>
        </div>
      </div>
    </div>
<?php 
  }
?>
    <div id="header">
      <div class="container">
        <h1>COURSE REGISTRATION PORTAL</h1>
        <div class="iimc">
          <h2>IIM Calcutta</h2>
        </div>
      </div>
    </div>
