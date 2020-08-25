<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="Michael Boyce">
  <meta name="Keywords" content="Hull, Friends, Of, The, Earth, Hull Friends of the Earth, Vegan, Enviroment">
  <meta name="Description" content="The official page of HFOE.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet" type="text/css" />

  <title>Hull Friends of the Earth</title> <!-- Page Title -->

  <style>
  </style>

 </head>
 <body>
	<div id="wrapper"> <!-- Total Wrapper -->
		<div id="header"> <!-- Header Area -->
			<a href="index.php"> <img src="images/logo.png" class="image"> </img> </a>
			<div id="nav"> <!-- Navigation Bar -->
				<ul class="nav">
					<li class="right"> <a href="previous_newsletters.php"> Previous Newsletters </a> </li>
					<li class="right"> <a href="current_newsletter.php"> Current Newsletters </a> </li>
					<li class="right"> <a href="index.php"> Home </a> </li>
				</ul>
			</div>
		</div>
		<div id="content"> <!-- Main Content -->
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
		</div>
		<div id="gallery"> <!-- Gallery Area -->
		</div>
		<div id="footer"> <!-- Footer --> 
			<div id="footerLeft">
				<p>
					Contact Us:
					<br/>
					Coordinator Lee-ann Williams - leeann@hfoe.org.uk
					<br/>
					ECO Editor Hilary Byers - hilary@amskaya.yahoo.co.uk
				</p>
			</div>
			<div id="footerRight">
				<a href="https://friendsoftheearth.uk/"><img src="images/logo.png" style="height: 50px; background-color: #c3c3c3;"/></a>
				<br/><br/>
				<a href="https://friendsoftheearth.uk/groups/hull"><img src="images/hulllogo.png" style="height: 50px; background-color: #c3c3c3;"/></a>
			</div>
		</div>
	</div>
 </body>