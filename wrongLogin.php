<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="Author" content="Michael Boyce">
		<meta name="Keywords" content="Hull, Friends, Of, The, Earth, Hull Friends of the Earth, Vegan, Enviroment">
		<meta name="Description" content="The official page of HFOE.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="css\style.css">
		<!-- Page Title -->
		<title>Hull Friends of the Earth</title> 
	</head>
	<body>
		<!-- Login Modal -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form action="authenticate.php" method="post" role="form">
				  <div class="form-group">
					<label for="username"><i class="fas fa-user"> User Name</i></label>
					<input type="text" name="username" placeholder="Username">
				  </div>
				  <div class="form-group">
					<label for="password"> <i class="fas fa-lock"> Password</i></label>
					<input type="text" name="password" placeholder="Password">
				  </div>
				  <input type="submit" value="Login" class="btn btn-primary"></input>
				</form>
			  </div>  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="declined()">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<!-- Nav Bar -->
		<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
			<!-- Brand (Title) Text -->
			<img src="images/hulllogo.png"></img>
			<!-- Collapsing Menu Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNav">
				<span class="navbar-toggler-icon"</span>
			</button>
		</nav>
		
		<!-- Content -->
		<div class="container-fluid">
			<div class="row">
				<?php
					session_start();
					if ($_SESSION['error'] == "username") {
						echo "<p>Your username was incorrect. Please try again.</p>";
					}
					else if ($_SESSION['error'] == "password") {
						echo "<p>Your password was incorrect. Please try again.</p>";
					}
				?>
			</div>
			<div class="row">
				<a class="btn btn-primary" href="index.html" role="button">Retry</a>
			</div>
		</div>
		
	<!-- Footer -->
		<footer class="page-footer pt-4 my-md-5 pt-md-5 border-top">
			<div class="row">
				<div class="col-sm-3 pl-5">
					<p class="text-muted">Copyright HFOE ©2020-2021</p>
					<p class="small">With special thanks to W3Schools, FontAwesome, and the developers of Bootstrap4 - you make the internet brilliant!</p>
				</div>
				<div class="col-sm-2 pl-5">
					<h5>Links:</h5>
					<a href="https://friendsoftheearth.uk/groups/hull" class="btn btn-link bg-dark"><img src="images/logo.png" style="width:100px;"></img></a>
				</div>
				<div class="col-sm-2 pl-5">
					<h5>Navigation:</h5>
					<a href="index.html" class="text-secondary"><h6>Home</h6></a>
					<a href="current_newsletter.php" class="text-secondary"><h6>Current Newsletters</h6></a>
					<a href="previous_newsletters.php" class="text-secondary"><h6>Previous Newsletters</h6></a>
					<a href="privacy_policy.html" class="text-secondary"<h6>Privacy Policy</h6></a>
				</div>
				<div class="col-sm-3 pl-5">
					<h5>Contact Us:</h5>
					<p>Coordinator Lee-ann Williams - leeann@hfoe.org.uk</p>
					<p>ECO Editor Hilary Byers - hilary@amskaya.yahoo.co.uk</p>
				</div>
			</div>
		</footer>
</html>