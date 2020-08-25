<html lang="en">
	<head>
		<?php
			session_start();
			
			$error = Null;
			
			if (!isset($_SESSION['loggedin'])) {
				header('Location: index.html');
				exit;
			}
			
			if(isset($_POST["submitUpload"])) {
				
				$target_dir = "newsletters/";
				$target_name_tmp = explode(".", $_FILES["uploadFile"]["name"]);
				$target_name = $_POST["month"] . "." . end($target_name_tmp);
				$target_file = $target_dir . $target_name;
				$uploadOk = 1;
				$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
				if($fileType !== "pdf") {
					$uploadOk =0;
					$error = "File type is not a PDF. Please only upload in PDF format.";
				} 
				
				if (file_exists($target_file)) {
					$uploadOk = 0;
					$error = "File already exists with that name.";
				}
				
				if ($uploadOk == 0) {
				} 
				else {
					move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file);
				}
			}
			
			if (isset($_POST["submitRemove"])) {
				$target_dir = "newsletters/";
				$target_name = $_POST["month"] . ".pdf";
				$target_file = $target_dir . $target_name;
				
				if (!file_exists($target_file)) {
					$error = "Sorry, but we weren't able to find that newsletter.";
				}
				
				if (file_exists($target_file)) {
					unlink($target_file);
				}
			}
		?>
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
		<!-- Nav Bar -->
		<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
			<!-- Brand (Title) Text -->
			<a class="navbar-brand mx-auto" href="index.html"><img src="images/hulllogo.png"></img></a>
			<!-- Collapsing Menu Button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNav">
				<span class="navbar-toggler-icon"</span>
			</button>
			<!-- Navigation Links -->
			<div class="collapse navbar-collapse" id="collapsibleNav">
				<ul class="navbar-nav ml-4">
					<li class="nav-link">
						<a href="index.html" class="text-secondary">Home</a>
					</li>
					<li class="nav-link">
						<a href="current_newsletter.php" class="text-secondary">Current Newsletters</a>
					</li>
					<li class="nav-link">
						<a href="previous_newsletters.php" class="text-secondary">Previous Newsletters</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<!-- Content -->
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<h1>File Upload:</h1>
					<p>Upload a new newsletter issue.</p>
					<form action="upload.php" method="post" enctype="multipart/form-data">
					  <div class="form-row">
						<input type="file" class="form-control-file" name="uploadFile" id="uploadFile">
					  </div>
					  <div class="form-row">
						<div class="form-col>
							<label for="month">Date of Release (Month, Year):</label>
							<input type="month" class="form-control" name="month" id="month">
						</div>
					  </div>
					  <input type="submit" value="Upload" name="submitUpload">
					</form>
				</div>
				<div class="col">
					<h2> Current Newsletters: </h2>
					<?php
						$files = scandir('newsletters', SCANDIR_SORT_DESCENDING);
						
						foreach ($files as $key => $value) {
							if (empty($value)) {
							   unset($files[$key]);
							}
						}
						
						if ($files[0] == "..") {
							echo "<br/><br/><br/>Sorry, but we were not able to find any newsletters. Perhaps try the <a href='current_newsletter.php'> Current Newsletters </a> page?";
						}
						else {
							
							echo "<ul class='issuesList'>";

							foreach ($files as $key => $value) {
								if ($value == ".." || $value == ".") {
									break;
								}
								else {
									$value = pathinfo($value, PATHINFO_FILENAME);
									
									echo "<li class='item'>" . "<a href='newsletters/" . $value . ".pdf' target='_blank'>  Issue Date: " . $value . "</a>" . "</li>";
								}
							}
							
							echo "</ul>";
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h1>File Remove:</h1>
					<p>Remove a newsletter issue.</p>
					<form action="upload.php" method="post" enctype="multipart/form-data">
					  <div class="form-row">
						<div class="form-col>
							<label for="month">Date of Release (Month, Year):</label>
							<input type="month" class="form-control" name="month" id="month">
						</div>
					  </div>
					  <input type="submit" value="Remove" name="submitRemove">
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php echo "<p style='color: red;'>" . $error . "</p>"; ?>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a class="btn btn-primary" href="logout.php" role="button">Logout</a>
				</div>
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
		<!-- Bootstrap Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>