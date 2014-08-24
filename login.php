<?php
include 'header.php';

if(isset($_SESSION['hash'])){
header('Location: index.php');
}
?>

<?php

if(isset($_POST['login'])){
	$user->login($_POST['email'], $_POST['password']);
}



?>


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
				<a href="index.php"><img src="assets/img/logo.png"></a>
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
	
	
	
	<!-- ========== LOGIN SECTION ========== -->
	<section id="popular" name="popular"></section>
	<div id="f">
		<div class="container">
			<div class="row">
				<h3>LOGIN</h3>
				<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
				
				<div class="col-lg-6 col-lg-offset-3">
					<p>If you don't have an account ask an administrator.</p>


						<!-- begin login form -->
						<form action="" method="post">
					 		<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
							<p><button type="submit" value="login" name="login" class="btn btn-warning">Login</button></p>
						</form>
						<!-- Einde login form -->



				</div>								
			</div>
		</div><!-- /container -->
	</div><!-- /f -->
	

	


	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>
