<?php
include 'header.php';

?>

<?php

if(isset($_POST['addfeature'])){
	$feature->add($user->user_id, $_POST['text']);
}

if(isset($_GET['remove'])){
	$feature->remove($_GET['id'], $user->user_id);
}

if(isset($_GET['vote'])){
	if($_GET['vote'] == "no"){
		$feature->vote('down', $_GET['fid'], $user->user_id); // testing
	}

	if($_GET['vote'] == "yes"){
		$feature->vote('up', $_GET['fid'], $user->user_id); // testing
	}
}

if(isset($_FILES['file-input']))
	$user->fileUp($_FILES['file-input']);
?>



  <body data-spy="scroll" data-offset="0" data-target="#theMenu">
		
	<!-- Menu -->
	<nav class="menu" id="theMenu">
		<div class="menu-wrap">
			<h1 class="logo"><a href="index.php">FEATCHER</a></h1>
			<i class="icon-remove menu-close"></i>
			<?php
				if($user->isLoggedIn()){
			?>
			<div class="image-upload">
				<form action="" method="POST" id="myForm"enctype="multipart/form-data">
    			<label for="file-input">


					<?php
							if(!empty($user->getAvatar())){
								echo '<img class="honderd" src="assets/userAva/'.$user->getAvatar().'"/>';
							}else{
					?>
        			<img class="honderd" src="assets/img/AddPic.png"/>
					<?php
						}
					?>


    			</label>
   			 	<input id="file-input" name="file-input" type="file"/>
   			 	</form>
			</div>
			<?php 
				}
			?>
			<a href="index.php" class="smoothScroll">Home</a>
			<?php
				if($user->isLoggedIn()){
			?>
			<a href="#feature" class="smoothScroll">Add feature</a>
			<?php 
				}
			?>
			<a href="#popular" class="smoothScroll">Popular</a>
			<a href="#newest" class="smoothScroll">Newest</a>

			

		</br>
			<?php
				if(!$user->isLoggedIn()){
			?>
			<a href="login.php">Log in</a>
			<?php 
				}
			?>
			<?php
				if($user->isAdmin()){
			?>
			<a href="adduser.php">Add user</a><!-- is_admin -->
			<?php 
				}
			?>
			<?php
				if($user->isLoggedIn()){
			?>
			<a href="logout.php">Log out</a>
			<?php 
				}
			?>
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



	<!-- ========== ADD FEATURE SECTION ========== -->
	<?php
		if($user->isLoggedIn()){
	?>

	<section id="feature" name="feature"></section>
	<div id="f">
		<div class="container">
			<div class="row">
				<h3>ADD FEATURE</h3>
				<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
				
				<!-- INTRO INFORMATIO-->
				<div class="col-lg-6 col-lg-offset-3">

					<form method="post">
						<textarea name="text" class="form-control"></textarea><br/>
						
						<p><button type="submit" class="btn btn-warning" name="addfeature">Add</button></p>
					</form>

					
				</div>								
			</div>
		</div><!-- /container -->
	</div><!-- /f -->
	<?php 
		}
	?>



	
	<!-- ========== MOST POPULAR SECTION ========== -->
	<section id="popular" name="popular"></section>
	<div id="f">
		<div class="container">
			<div class="row">
				<h3>MOST POPULAR FEATURES</h3>
				<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
				
				
			

			<!-- BEGIN TOP 5 -->
			<div class="head col-lg-12">
			<table class="table">
				<tr>
					<td width="40%">Feature</td>
					<td width="20%">User</td>
					<td width="20%">Votes</td>
					<td>#</td>
				</tr>
			</table>
			</div>

			<?php
			$q = $db->conn->query('SELECT f.*, (SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="1") AS voteUp,
											   (SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="0") AS voteDown,
											   (
											   		(SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="1")
											   		-
											   		(SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="0")
											   	) as totalVote,
											   	u.name  

												FROM feature as f LEFT JOIN feature_vote as fv ON (f.feature_id = fv.feature_id) 
												LEFT JOIN user 	as u ON (f.user_id = u.user_id)
												GROUP BY feature_id ORDER BY totalVote DESC LIMIT 5');
			
			?>

			<?php
			while($f = $q->fetch_assoc()){
			?>
			<div class="head col-lg-12">
			<table class="table">
				<tr style="background-color: <?=($f['totalVote'] > 0) ? '#B3FFBF' : '#FFC5C5'; ?>;">
					<td width="40%"><?=$f['text']?></td>
					<td width="20%"><?=$f['name']?></td>
					<td width="20%"><?=($f['totalVote'])?></td>
					<td><a href="?vote=yes&userid=<?=$user_id?>&fid=<?=$f['feature_id']?>">Yes</a> / <a href="?vote=no&userid=<?=$user_id?>&fid=<?=$f['feature_id']?>">No</a></td>
					<!-- Delete feature -->
					<?php
						if($user->isAdmin()){
					?>		
					<td><a href="?remove=true&id=???&userid=???">Delete</a>
					<?php 
						}
					?>
				</tr>
			</table>
			</div>
			<?php
			}
			?>

		</div>
		<!-- EINDE TOP 5 -->

					
					<?php
						if(!$user->isLoggedIn()){

						
					 ?>
					<a href="login.php"><p><button type="button" class="btn btn-warning">I WANT TO PROPOSE FEATURES TOO!</button></p></a>
					<?php 
						}
					?>

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
				
			
			<!-- BEGIN LAATSTE 10 -->
			<div class="head col-lg-12">
			<table class="table">
				<tr>
					<td width="40%">Feature</td>
					<td width="20%">User</td>
					<td width="20%">Votes</td>
					<td>#</td>
				</tr>
			</table>
			</div>

			<?php
			$q = $db->conn->query('SELECT f.*, (SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="1") AS voteUp,
											   (SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="0") AS voteDown,
											   (
											   		(SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="1")
											   		-
											   		(SELECT COUNT(*) FROM feature_vote WHERE feature_id = f.feature_id AND state="0")
											   	) as totalVote,
											   	u.name 
									FROM feature as f 
									LEFT JOIN feature_vote as fv ON (f.feature_id = fv.feature_id) 
									LEFT JOIN user 	as u ON (f.user_id = u.user_id)
									GROUP BY feature_id ORDER BY created_on DESC LIMIT 10');

			
			?>

			<?php
			while($f = $q->fetch_assoc()){
			?>
			<div class="head col-lg-12">
			<table class="table">
				<tr style="background-color: <?=($f['totalVote'] > 0) ? '#B3FFBF' : '#FFC5C5'; ?>;">
					<td width="40%"><?=$f['text']?></td>
					<td width="20%"><?=$f['name']?></td> <!-- MOET NAME UIT tabel USER-->
					<td width="20%"><?=($f['totalVote'])?></td>
					<td><a href="?vote=yes&userid=<?=$user_id?>&fid=<?=$f['feature_id']?>">Yes</a> / <a href="?vote=no&userid=<?=$user_id?>&fid=<?=$f['feature_id']?>">No</a></td>
					<!-- Delete feature -->
					<?php
						if($user->isAdmin()){
					?>		
					<td><a href="?remove=true&id=<?=$f['feature_id']?>">Delete</a>
					<?php 
						}
					?>
				</tr>
			</table>
			</div>
			<?php
			}
			?>

		</div>
		<!-- EINDE LAATSTE 10 -->
					
					<?php
						if(!$user->isLoggedIn()){

						
					 ?>
					<a href="login.php"><p><button type="button" class="btn btn-warning">I WANT TO PROPOSE FEATURES TOO!</button></p></a>
					<?php 
						}
					?>
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




