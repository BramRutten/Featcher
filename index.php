<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Featcher</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/modernizr.custom.js"></script>
	

	
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">
		
	<!-- Menu -->
	<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a href="index.php">FEATCHER</a></h1>
			<i class="icon-remove menu-close"></i>
			<a href="index.php" class="smoothScroll">Home</a>
			<a href="index.php" class="smoothScroll">Popular</a>
			<a href="index.php" class="smoothScroll">Newest</a>

			

		</br>
			<a href="login.php">Login</a>
			<a href="adduser.php">Add user</a><!-- is-admin -->
		</br>
			<a href="https://twitter.com/Bram_Rutten"><i class="icon-twitter"></i></a>
			<a href="mailto:contact@bramrutten.be"><i class="icon-envelope"></i></a>
		</div>
		
		<!-- Menu button -->
		<div id="menuToggle"><i class="icon-reorder"></i></div>
	</nav>


	
	<!-- ========== HEADER SECTION ========== -->
	<section id="home" name="home"></section>
	<div id="headerwrap">
		<div class="container">
			<div class="logo">
				<img src="assets/img/logo.png">
			</div>
			<br>
			<div class="row">
				<h1>FEATCHER</h1>
				<br>
				<h3>Propose new epic features!</h3>
				<br>
				<br>
				<div class="col-lg-6 col-lg-offset-3">
				</div>
			</div>
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	
	
	<!-- ========== MOST POPULAR SECTION ========== -->
	<section id="popular" name="popular"></section>
	<div id="f">
		<div class="container">
			<div class="row">
				<h3>MOST POPULAR FEATURES</h3>
				<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
				
				<!-- INTRO INFORMATIO-->
				<div class="col-lg-6 col-lg-offset-3">
					<p>Hier komt de top 10 rated Features.</p>
					
					<p><button type="button" class="btn btn-warning">I WANT TO PROPOSE FEATURES TOO!</button></p>
				</div>								
			</div>
		</div><!-- /container -->
	</div><!-- /f -->
	

	<!-- ========== NEWEST PROPOSITIONS SECTION ========== -->	
	<section id="newest" name="newest"></section>
	<div id="f">
		<div class="container">
			<div class="row centered">
				<h3>NEWEST PROPOSITIONS</h3>
					<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
				
				<!-- INTRO INFORMATIO-->
				<div class="col-lg-6 col-lg-offset-3">
					<p>Hier komen de laatste Features.</p>
					
					<p><button type="button" class="btn btn-warning">I WANT TO PROPOSE FEATURES TOO!</button></p>
				</div>								
			</div>
		</div><!-- container -->
	</div>	<!-- f -->



	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>




<!-- select * from images where fbid IN (select fbid from ratings HAVING count(fbid) > 150 group by fbid)  -->