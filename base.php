<!DOCTYPE html>
<?php require_once 'ti.php' ?>


<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="style.css" type="text/css"> 
</head>

<body>
	<?php startblock('navbar') ?>
		<nav class="navbar navbar-expand-md navbar-dark m-0 style transparent">
			<img src="T2G Logo.png" width="" height="50" class="d-inline-block align-top m-0" alt="">
			<div class="container" style="opacity: 0.2;">
			  <a class="navbar-brand m-0" href="#"></a>
			  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			  <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
			    <ul class="navbar-nav"></ul>
			  </div>
			</div>
			<a class="btn navbar-btn ml-2 btn-light text-primary body baloo" href="/taft2GO/Host">Become a Host</a>
			<a class="btn navbar-btn ml-2 btn-light text-primary body baloo" href="/taft2GO/Help">Help
			  <br> </a>
			<a class="btn navbar-btn ml-2 btn-light text-primary baloo" href="/taft2GO/Signup">Sign Up</a>
			<a class="btn navbar-btn ml-2 btn-light text-primary baloo" href="/taft2GO/Login">Log In</a>
		</nav>
	<?php endblock() ?>

	<?php startblock('content') ?>
	<?php endblock() ?>

	<?php startblock('footer') ?>
		<div class="bg-dark text-white">
		    <div class="container">
		      <div class="row">
		        <div class="p-4 col-md-3">
		          <img src="T2GO Logo.png" width="" height="50" class="d-inline-block align-top m-0" alt="">
		          <p class="text-white">A website where you can find the right place for you to stay.</p>
		        </div>
		        <div class="p-4 col-md-3">
		          <h2 class="mb-4 baloo">Mapsite</h2>
		          <ul class="list-unstyled">
		            <a href="#" class="text-white">Home</a>
		            <br>
		            <a href="about.html" class="text-white">About us</a>
		            <br>
		            <a href="#" class="text-white">Our services</a>
		            <br>
		            <a href="#" class="text-white">Stories</a>
		          </ul>
		        </div>
		        <div class="p-4 col-md-3">
		          <h2 class="mb-4 baloo">Contact</h2>
		          <p>
		            <a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>+63 - 999 550 5462</a>
		          </p>
		          <p>
		            <a href="mailto:info@pingendo.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@taft2GO.com</a>
		          </p>
		          <p>
		            <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>2401 Taft Ave., MNL</a>
		          </p>
		        </div>
		        <div class="p-4 col-md-3">
		          <h2 class="mb-4 text-light baloo">Subscribe</h2><i class="fa fa-fw fa-facebook fa-3x text-white"></i><i class="fa fa-fw fa-twitter fa-3x text-white"></i><i class="fa fa-fw fa-instagram text-white fa-3x"></i> </div>
		      </div>
		      <div class="row">
		        <div class="col-md-12 mt-3">
		          <p class="text-center text-white">© Copyright 2017 Taft2GO - All rights reserved. </p>
		        </div>
		      </div>
		    </div>
	  	</div>
	<?php endblock() ?>
	
  
  

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>