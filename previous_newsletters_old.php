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
			<h1 style="margin: 0;"> Previous Newsletters: </h1>
			<p> You can download all previous newsletters posted by clicking the links below. </p>
			<p> The links will open a PDF file in a new tab if your browser supports this, from which you can dowload it by pressing the download button in the top right. </p>
			<p> The file will automatically be downloaded if your browser does not suport this, such as Internet Explorer. </p>
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
					echo "<br/><br/><br/>Sorry, but we were not able to find any newsletters. Perhaps try the <a href='current_newsletter.php'> Current Newsletters </a> page?";
				}
				else {
					//usort($files, "findLatest");

					foreach ($files as $key => $value) {
						if ($value == ".." || $value == ".") {
							break;
						}
						else {
							$value = pathinfo($value, PATHINFO_FILENAME);

							echo "<dir id='issue '" . $value . "' style='background-color: white; margin: 0;'>";
							echo "Download or view: ";
							echo "<a href='newsletters/" . $value . ".pdf' target='_blank'> Issue " . $value . "</a>";
							echo "</dir>";
						}
					}
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