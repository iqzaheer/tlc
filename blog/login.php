<?php


if(isset($_POST['name']) &&  $_POST['name'] !=""){

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$name' AND PASSWORD = '$password'";

$con = mysqli_connect("localhost","root","","blogs");

$rs = mysqli_query($con,$sql);

$count = mysqli_num_rows($rs);

//echo $count;

if($count == 1){

    $row = mysqli_fetch_array($rs);

    Header("Location: dashboard.php");
}
else
{
    $message = "Invalid Credentials";
}



}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<!-- Meta Data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wunderkind - Responsive HTML5 Onepage Parallax Theme</title>
        <meta name="description" content="A Template by Vossen Design"/>
        <meta name="keywords" content="HTML5, Bootstrap 3, CSS3, javascript, PHP, onepage, responsive, mobile"/>
        <meta name="author" content="Vossen Design"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
       	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    	
        <!-- Web Fonts -->        
        <link rel="stylesheet" href="fonts/raleway/stylesheet.css">
		<link rel="stylesheet" href="fonts/montserrat/stylesheet.css">
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom stlylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <!-- Font Awesome Icons -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- ionicons Icons -->
        <link href="css/ionicons.min.css" rel="stylesheet">
        <!-- Liquid Slider 2 stlylesheet -->
        <link rel="stylesheet" href="css/liquid-slider.css">
        <!-- CSS Animations -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Magnific Popup stlylesheet -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		<!-- YTPlayer stlylesheet -->
		<link href="css/YTPlayer.css" media="all" rel="stylesheet" type="text/css">
        <!-- Flexslider2 stlylesheet -->
        <link rel="stylesheet" href="css/flexslider.css">
        <!-- CubePortfolio stlylesheet -->
        <link rel="stylesheet" href="css/cubeportfolio.css">
        
		
        <!-- Skin Color -->
        <link rel="stylesheet" href="css/colors/blue.css" id="color-skins"/>
        
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
	</head>
	<body>
    	
		
        <!--Start Header-->
        <section id="fixed-navbar">
			<nav class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					    </button>
                        <a class="navbar-brand" rel="home" href="#" title="wunderkind."><h3>Wunderkind</h3></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="main-nav">
                      <ul class="nav navbar-nav  navbar-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index.html#about">About</a></li>
                        <li><a href="index.html#services">Services</a></li>
                        <li><a href="index.html#our-work">Work</a></li>
                        <li class="dropdown">
                          <span class="dropdown-toggle" data-toggle="dropdown">Features <b class="caret"></b></span>
                          <ul class="dropdown-menu">
                            <li><a href="index.html#get-connected">Get Connected</a></li>
                            <li><a href="index.html#clients">Clients</a></li>
                            <li><a href="index.html#price-list">Price List</a></li>
                            <li><a href="shortcodes.html"><span class="label label-primary">Shortcodes</span></a></li>  
                          </ul>
                        </li>
                        <li class="dropdown">
                          <span class="dropdown-toggle" data-toggle="dropdown"><span class="label label-primary">Blog</span> <b class="caret"></b></span>
                          <ul class="dropdown-menu">
                            <li><a href="blog.html">Blog Home</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                          </ul>
                        </li>
                        <li><a href="index.html#contact-form">Contact</a></li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</nav>
		</section>
        <!--End Header-->
        
        <section id="blog-page-title">
            <div class="container">
                <div class="row text-center" style="margin:60px 0 20px 0;">
                    <div class="col-lg-12 section-title wow flipInX">
                        <h1><small>Wunderkind</small><br><strong>Our Blog Posts</strong></h1>
                        <p class="lead">Read our latest, blog post.<span class="highlight"> Still Life in Motion.</span></p>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="site-wrapper">
            
            <div class="container">

                <div class='row'>
                    <div class='col-md-6 text-center wow flipInX'>
                        <img src='http://technidersolutions.com/img/logo.png' />
                    </div>
                    <div class='col-md-6 text-center wow flipInX' id="contact">
                        <div id="message" class='alert alert-danger'>
                            <?php

                                if(isset($message)){
                                    echo $message;
                                }

                             ?>
                        </div>
                        <form method="post" action="login.php" >
                        <fieldset>
                        <div class='row'>
                        <div class="col-md-12"> 
                            <input name="name" type="text" id="name" size="30" value="" placeholder="Login Id / Email"/>
                            <br />
                            <input name="password" type="password" id="password" size="30" value="" placeholder="Passwrod"/>
                            
                        </div>
                        </div>
                        
                        <div class='row'>
                        <div class="col-md-12 text-center">
                            <input type="submit" class="submit" id="submit" value="Submit" />
                        </div>
                    </div>
                        </fieldset>
                        </form>


                    </div>



                </div>

            </div><!-- End Container -->
            
        </div><!-- End Site Wrapper -->
                        
		<div id="back-to-top"><a href="#"><i class="ion-arrow-up-b ion-3x"></i></a></div>	
		
        <!-- Start Footer -->
        <footer id="footer">
            	<div class="container text-center">
                	<div class="row">
                    	<div class="col-md-12 footer-logo">
                        	<a href="#"><h4 class="white">Wunderkind.</h4></a>
                        </div>
                        <div class="footer-info">
                        	<p class="footer-copyright white">Copyright © 2014 <a href="#">Wunderkind</a>. All Rights Reserved.</p>
                        </div>
        			</div>
                </div>
        </footer>
        <!-- End Footer -->
    


        <!-- jQuery Plugins -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>  
        <script type="text/javascript" src="js/jquery.cubeportfolio.min.js"></script>
        <script src="js/jquery.mb.YTPlayer.js" type="text/javascript"></script>
        <script src="js/jquery.stellar.js" type="text/javascript"></script>    
        <script src="js/jquery.sticky.js" type="text/javascript"></script>   
        <script src="js/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="js/jquery.fitvids.js" type="text/javascript"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/toucheffects.js"></script>
        <script src="js/wow.min.js" type="text/javascript"></script>
        <script src="js/waypoints.min.js" type="text/javascript"></script>
		<script src="js/jquery.easing.1.3.min.js"></script>
		<script src="js/jquery.touchSwipe.min.js"></script>
        <script src="js/jquery.liquid-slider.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> 
        <script type="text/javascript" src="js/gmap3.min.js"></script> 
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
		<script src="js/jquery.backstretch.min.js"></script> 
		<script src="js/scripts.js" type="text/javascript"></script>
    
	</body>
</html>