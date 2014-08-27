<?php
include 'header.php';

?>

<?php

if(isset($_POST['adduser'])){

	if(!empty($_POST['name']) | !empty($_POST['email']) | !empty($_POST['password'])){
		$user->signup($_POST['name'], $_POST['email'], $_POST['password'], $_POST['isadmin']);
	}else{
		$error = "notempty";
	}
	
}



?>

  <body data-spy="scroll" data-offset="0" data-target="#theMenu">
		
	<!-- Menu -->
	<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a href="index.php">FEATCHER</a></h1>
			<i class="icon-remove menu-close"></i>
			<a href="index.php" class="smoothScroll">Home</a>
		
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
				<h3>ADD USER</h3>
				<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
				
				<div class="col-lg-6 col-lg-offset-3">
				


						<!-- begin login form -->
						<form action="" method="post">
					 		<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="name" type="text" class="form-control" name="name" value="" placeholder="username">                                        
                            </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="email" type="text" class="form-control" name="email" placeholder="email">
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>

                     		<div style="margin-bottom: 25px" class="input-group">
                                      <input type="checkbox" name="isadmin" value="1"> Admin<br>  
                            </div>

							<?php
							if(isset($error)){
								echo '<div class="alert alert-danger" role="alert">Please fill all fields! (except the radio button obviously)</div>';
							}
							?>

							<p><button type="submit" value="adduser" name="adduser" class="btn btn-warning">Add</button></p>
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
