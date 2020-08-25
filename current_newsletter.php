<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="Author" content="Michael Boyce">
		<meta name="Keywords" content="Hull, Friends, Of, The, Earth, Hull Friends of the Earth, Vegan, Enviroment">
		<meta name="Description" content="The official page of HFOE.">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" href="css\styles.css">
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116198504-2"></script>
		<script>
			function setCookie(cname,cvalue,exdays) {
			  var d = new Date();
			  d.setTime(d.getTime() + (exdays*24*60*60*1000));
			  var expires = "expires=" + d.toGMTString();
			  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}

			function getCookie(cname) {
			  var name = cname + "=";
			  var decodedCookie = decodeURIComponent(document.cookie);
			  var ca = decodedCookie.split(';');
			  for(var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
				  c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
				  return c.substring(name.length, c.length);
				}
			  }
			  return "";
			}
			
			function accepted() {
				setCookie("consent", "True", 30);
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				gtag('set', 'anonymizeIp', true);

				gtag('config', 'UA-116198504-2');
			}
			
			function declined() {
				setCookie("consent", "False", 30);
			}
		
			function checkCookie() {
			  var consent = getCookie("consent");
			  if (consent == "False") {
				console.log("Cookies declined beforehand")
			  }
			  else {
				if (consent != "True") {
					$(document).ready(function(){
						$("#cookieConsent").modal('show');
					});
				  }
				}
			}
			
			$(document).ready(checkCookie());

		</script>
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
		
		<?php
				/*function findLatest($date1, $date2) {
					 if (strtotime($time1) < strtotime($time2)) 
						return 1; 
					else if (strtotime($time1) > strtotime($time2))  
						return -1; 
					else
						return 0; 
				}*/

				$files = scandir('newsletters', SCANDIR_SORT_DESCENDING);
				
				foreach ($files as $key => $value) {
					if (empty($value)) {
					   unset($files[$key]);
					}
				}
				
				if ($files[0] == "..") {
					echo "<br/><br/><br/>Sorry, but we were not able to find the latest newsletter. Perhaps try the <a href='previous_newsletter.php'> Previous Newsletters </a> page?";
				}
				else {
					//usort($files, "findLatest");

					$latestFile = $files[0];

					echo "<iframe src='newsletters/" . $latestFile . "'  style='width: 100%; height:100%;' frameborder='0'></iframe>";
				}
		?>
		
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