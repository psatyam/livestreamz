<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themexy.com/demo/Dawat/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2016 12:35:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dawat</title>
     
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-theme.min.css" rel="stylesheet"> 
    <!-- Font Awesome  -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet"> 
    <!-- Countdown -->
    <link href="<?php echo base_url();?>assets/css/jquery.countdown.css" rel="stylesheet"> 
    <link href="<?php echo base_url();?>assets/css/bootstrap-switch.min.css" rel="stylesheet"> 
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    
    <!-- Owl Carousel css -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" type="text/css" media="screen"> 
    <!-- Flexslider  -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/flexslider/flexslider.css"> 
    <!-- style.css-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body> 
    <header class="row page_top">
    <div class="container">
        <div class="row">
            <nav class="navbar menu_part">
            <!-- mobile menu -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="#"><img src="images/header/logo.png" alt="#"></a>
                </div>

                <!-- Menu -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                    <div class="search_button">
                        <a type="button" class="btn btn-searce" data-toggle="collapse" data-target="#search"><i class="fa fa-search"></i></a>
                        <div id="search" class="search_p collapse">
                            <input type="search" placeholder="Search...">
                        </div>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="<?php echo site_url();?>">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                              <ul class="dropdown-menu">
                                 <li><a href="schedule.html">Schedule</a></li>
                              </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                            <?php if($user['logged_in']!=1){?>
                            <li><a href="<?php echo site_url()?>/user/login">Login</a></li>
                            <?php }elseif($user['login_type']!="facebook"){?>
                            <li><a href="<?php echo site_url()?>/content/account">My Account</a></li>
                            <li><a href="<?php echo site_url()?>/user/signout">Logout</a></li>
                            <?php }else{?>
                            <li><a href="<?php echo site_url()?>/content/account">My Account</a></li>
                            <li><a href="<?php echo site_url()?>/user/facebooklogout">Logout</a></li>
                            <?php }?>
                        </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
        <div class="page_title">
            <h2><?php echo $heading ?></h2>
            <!--<h4>So get ready to attend this awesome event &amp; book your seat now!  </h4>-->
        </div>
    </div>
</header>