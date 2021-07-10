<!DOCTYPE html>

<html lang="en">
<!-- head -->
<head>
	<title>Yash Agarwal</title>
	<noscript><meta http-equiv="refresh" content="2; URL=https://www.google.com/"></noscript>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="nmoLLJ3D8eS6hYCnBRkEGKLvBhlzRTsidi-_NYECPu4" />
	<link href="https://yashagarwal.epizy.com/" rel="canonical">
	<link rel="icon" type="image/icon type" href="Images/YA3.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik">
	<link rel="stylesheet" type="text/css" href="mystyle.css" id="link1">
	<link rel="stylesheet" type="text/css" href="" id="link2">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
	<!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>-->
</head>

<body id="body" onload="changeMode()">
	<noscript>
		Please enable JavaScript
	</noscript>
<!-- Navigation Menu -->	
	<div class="topnav" id="topnav1">
		<div class="navigation" id="nav">
			<button onclick="fun(this)" id="b1" title="Click to view Home Page"><i class="material-icons">home</i></button>
			<button onclick="fun(this)" id="b2" title="Click to view Bio Page">Bio</button>
			<button onclick="fun(this)" id="b3" title="Click to view Work Page">Work</button>
			<!--<button onclick="fun(this)" id="b4" title="Click to view Timeline Page">Timeline</button>-->
			<!--<button onclick="fun(this)" id="b5" title="Click to view Gallery Page">Gallery</button>-->
		</div>
		<div class="dateTime" id="date"></div>
		<div class="searchbar" id="s" >
			<form id="s" action="searchbar.php">
				<input type="search" name="searchres" id="search1" autocomplete="off" placeholder="Search...">
				<!--<button type="submit" onclick="" id="s2"><i class="material-icons">search</i></button>-->
				<span><i class="material-icons" id="s">search</i></span>
			</form>
		</div>
	</div>
	<!--<div id="anime">
		<div id="animeC"></div>
	</div>-->

	<div class="topnav2" id="topnav2id">
		<button id="tn2btnid"><i class="material-icons" id="tn2btnid">menu</i></button>
		<div class="nav" id="navId">
			<button onclick="fun(this)" id="b1" title="Click to view Home Page">Home</button>
			<button onclick="fun(this)" id="b2" title="Click to view Bio Page">Bio</button>
			<button onclick="fun(this)" id="b3" title="Click to view Work Page">Work</button>
		</div>
		<div class="dateTime2" id="date"></div>
		<!--<button><i class="material-icons" onclick="alert('Currently Not Available for this device');">search</i></button>-->
		<div class="searchbar" id="s" >
			<form id="s" action="searchbar.php">
				<input type="search" name="searchres" id="search1" autocomplete="off" placeholder="Search...">
				<!--<button type="submit" onclick="" id="s2"><i class="material-icons">search</i></button>-->
				<span><i class="material-icons" id="s">search</i></span>
			</form>
		</div>
	</div>

	<div class="searchDisplay">
		<h3>Search Results</h3>
		<div id="searchResultsId">No Suggestions</div>
	</div>
	
<!-- Home -->
	<div class="home" id="homeid">
		<div class="homeHeading" id="homeHeadingid">
			<div>
				<h1>Yash Agarwal</h1>
				<p>A Student & A budding Web Developer</p><br>
			</div>
			<div>
				<p id="quotez">
					"It is our choices, Harry, that show what we truly are, far more than our abilities."<br><i> —Albus Dumbledore</i>
				</p>
			</div>
		</div>
		<div class="homeImage" id="homeImageid"></div>
		<div class="homeImageBtn" id="homeImageBtnId">
			<button onclick="displayPreviousImage();" class="prev"><i class="material-icons">arrow_back</i></button>
			<button onclick="displayNextImage();" class="nex"><i class="material-icons">arrow_forward</i></button>
		</div>
	</div>
<!-- Bio -->
	<div class="bio" id="bioid">
		<h1>Bio</h1>
		<!-- <p>Yash Agarwal, born on January 12th, 2000, is currently a Bachelor of Technology student in DIT University, Dehradun.</p> -->
		<p>Hey here, this is Yash Agarwal, a Bachelor of Technology in Computer Science & Engineering student in DIT University, Dehradun.</p>
		<?php include 'mylife.html'; ?>
		<div class="bioEducation" id="bioEducationid">
			<h2>Education</h2>
			<div>
				<h3>2018 - 2022</h3>
				<p>Bachelor of Technology in Computer Science and Engineering<br>DIT University, Dehradun, India</p>
			</div>
			<div>
				<h3>March, 2018</h3>
				<p>Completed 12th (Intermediate)<br>Modern Era Public School, Bijnor, India</p>
			</div>
			<div>
				<h3>March, 2016</h3>
				<p>Completed 10th (High School)<br>Modern Era Public School, Bijnor, India</p>
			</div>
		</div>
		<div class="bioAcademic" id="bioAcademicid">
			<h2>Academic Projects</h2>
			<div>
				<h3>August, 2020 - <br>currently ongoing</h3>
				<p>Academic project on "Facial Recogniton based Attendance System".<br>Role: Group communicator (or, Group Manager).</p>
			</div>
			<div class="pa1">
				<h3>January, 2021 - <br>April, 2021</h3>
				<p>Research project on "Entrepreneurship & Start-up".<br>Role: Group Manager.</p>
			</div>
		</div>
		<div class="bioCertification" id="bioCertificationid">
			<h2>Certifications</h2>
			<div class="bc1">
				<h3>July 26, 2020</h3>
				<p>Completed certification for "<u onclick='$("#cmc1").css({"display":"block", "z-index":"10"});'>Crash course on Python by Google</u>" on Coursera.</p>
			</div>
			<div class="bc1">
				<h3>July 27, 2020</h3>
				<p>Completed certification for "<u onclick='$("#cmc2").css({"display":"block", "z-index":"10"});'>Introduction to HTML5 by University of Michigan</u>" on Coursera.</p>
			</div>
		</div>
		<div class="modalContainerCollection" id="cmc1">
			<div class="modalContentCollection">
				<button onclick="$('#cmc1').css('display', 'none');" title="Close this modal"><i class="material-icons">close</i></button>
				<p id="cfm1"><br>
					<script>
						var x = document.createElement("img");
						x.src = "Images/CF2.PNG";
						var src = document.getElementById('cfm1');
						src.appendChild(x);
					</script><br>
				</p>
			</div>
		</div>
		<div class="modalContainerCollection" id="cmc2">
			<div class="modalContentCollection">
				<button onclick="$('#cmc2').css('display', 'none');" title="Close this modal"><i class="material-icons">close</i></button>
				<p id="cfm2"><br>
					<script>
						var x = document.createElement("img");
						x.src = "Images/CF1.PNG";
						var src = document.getElementById('cfm2');
						src.appendChild(x);
					</script><br>
				</p>
			</div>
		</div>
		<div class="bioSkills" id="bioSkillsid">
			<h2>Skills</h2>
			<table>
				<tr>
					<td><h3>HTML</h3></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
				</tr>
				<tr>
					<td><h3>CSS</h3></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
				</tr>
				<tr>
					<td><h3>JavaScript</h3></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><h3>PHP</h3></td>
					<td><i class="material-icons">star</i></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><h3>jQuery</h3></td>
					<td><i class="material-icons">star</i></td>
					<td><i class="material-icons">star</i></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div>
				<p>Other programming languages worked on are C/C++, Python.</p>
			</div>
		</div>
		<div class="bioContact" id="bioContactid">
			<h2>Contact</h2>
			<div>
				<h3>E-mail</h3>
				<p>legoyashx@outlook.com</p>
			</div>
		</div>
		<div class="bioShare" id="bioShareid">
			<h2>Share</h2>
			<div>
				<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
					<!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a>-->
					<a class="a2a_button_facebook"></a>
					<a class="a2a_button_twitter"></a>
					<a class="a2a_button_email"></a>
					<a class="a2a_button_whatsapp"></a>
					<a class="a2a_button_linkedin"></a>
					<a class="a2a_button_telegram"></a>
					<a class="a2a_button_google_gmail"></a>
					<a class="a2a_button_reddit"></a>
				</div>
			</div>
		</div>
	</div>	
<!-- Projects -->
	<div class="projects" id="projectsid">
		<h1>Work</h1>
		<div class="projectCategory" id="projectCategoryid">
			<button onclick="projectView(this)" id="temp" title="Click to view Designs" style="font-weight: bold;">Designs</button>
			<button onclick="projectView(this)" id="collect" title="Click to view Collections">Collections</button>
			<button onclick="projectView(this)" id="tictac" title="Click to view Tic Tac Toe project">Tic Tac Toe</button>
		</div>
		<div class="projectTemplate" id="projectTemplateid">
			<section id="formTemplates">
				<?php include 'formTemplates.html'; ?>
			</section>
			<section id="searchTemplates">
				<?php include 'searchTemplates.html'; ?>
			</section>
			<section id="navigationTempId">
				<?php include 'navBars.html'; ?>
			</section>
			<section id="videoPlayers">
				<?php //include 'VideoPlayers/videoPlayers.html'; ?>
			</section>
			<!--<?php //include 'collections.html'; ?>-->
		</div>
		<div class="collect" id="collectid">
			<?php include 'collections.html'; ?>
		</div>
		<div class="ticTac" id="ticTacid"></div>
		<!-- <div class="projectAcademic" id="projectAcademicid">
			<div class="pa1">
				<h3>August, 2020 - <br>currently ongoing</h3>
				<p>Academic project on "Facial Recogniton based Attendance System".<br/>Role: Group communicator (or, Group Manager).</p>
			</div>
			<div class="pa1">
				<h3>August, 2020 - <br>currently ongoing</h3>
				<p>Academic project on "Facial Recogniton based Attendance System".</p>
			</div>
		</div> -->
		<!--<div class="projectTimeline" id="projectTimelineid"></div>-->
	</div>	
<!-- Gallery -->
	<div class="gallery" id="gallid">
		<div class="galleryHeading" id="galleryHeadingid">
			<h1>Gallery</h1>
		</div>
		<div class="elfsight-app-961a2392-5e74-4f11-8cd4-3cb86a7a554b" id="i1"></div>
	</div>	
<!-- Upward Scroll Button -->
	<button onclick="" id="extraMenu"><i class="material-icons" id="extraMenu">menu</i></button>
	<div class="extraBtn">		
		<button id="pagescrollup" title="go to top"><i class="material-icons" id="pagescrollup">arrow_upward</i></button>
		<button id="pagescrolldown" title="go to bottom"><i class="material-icons" id="pagescrolldown">arrow_downward</i></button>
		<button id="smb1"><i class="material-icons" id="smb1">fullscreen</i></button>
		<button id="smb2"><i class="material-icons" id="smb2">fullscreen_exit</i></button>
		<button><a href="" title="Click to view" id="inf"><i class="material-icons">info</i></a></button>
		<!--<button onclick="return false;" id="extraM"><i class="material-icons" id="extraM">menu</i></button>-->
	</div>	
<!-- Footer -->
	<div class="footer" id="footerid">
		<h2>Want to say something ?</h2>
		<form action="FeedbackHandeler.php" method="POST" target="_parent" onsubmit="return false;" id="form1">
			<div id="f1">
				<label>Name:</label><br>
				<input type="text" name="Name" placeholder="Your Name..." required="" autocomplete="off" size="50">
			</div><br>
			<div id="f2">
				<label>E-mail:</label><br>
				<input type="email" name="E-mail" placeholder="Your E-mail..." required="" autocomplete="off" size="25">
			</div><br>
			<div id="f3">
				<label>Message:</label><br>
				<textarea name="Message" placeholder="Your Message..." autocomplete="off" required="" size="150"></textarea>
			</div><br>
			<div id="f9">
				<label>Website:</label><br>
				<input type="text" name="website" placeholder="Your website..." autocomplete="off">
			</div><br>
			<div id="f4">
				<button type="submit" title="Submit your Message"><i class="material-icons">send</i></button>
				<button type="reset" title="Discard your Message"><i class="material-icons">delete</i></button>
			</div>
		</form>
		<p>Replies can be expected within 24 hours.</p>
		<!--<div class="details" id="detailsid">
			<details>
				<summary>Some Important Info</summary>
				<p><a href="" title="Click to view" id="inf">Info</a></p>
			</details>
		</div>-->
	</div>
	<script>

		$(document).ready(function()
		{
			$.ajaxSetup({cache: false}); //default values for future AJAX requests, browser will not cache the requested pages.
			//setInterval(displayNextImage,5000);
			setInterval(quotesL, 2000);

			var img1 = document.createElement("img"); 
			img1.src = "Images/Yash Agarwal.png"; 
			var src = document.getElementById('homeImageid');
			img1.id = "hI";
			src.appendChild(img1);


			$('img').bind('contextmenu', function(e){ return false;});
			$('video').bind('contextmenu', function(e){ return false;});
			//$('.extraBtn').hide();
		});

		function displayNextImage() 
		{
            x = (x === images.length - 1) ? 0 : x + 1;
            document.getElementById("hI").src = images[x];
        }
        function displayPreviousImage() 
        {
            x = (x <= 0) ? images.length - 1 : x - 1;
            document.getElementById("hI").src = images[x];
        }

		function displayNextImage() 
		{
			//$('#hI').animate({borderColor: 'purple'});
            x = (x === images.length - 1) ? 0 : x + 1;
            //$('#hI').slideUp();
            document.getElementById("hI").src = images[x];
            //$('#homeImageid').slideToggle(1000);
            //$('#hI').fadeIn(1000);
        }
        var images = [], x = -1;
        images[0] = "Images/YashAgarwal_1.png";
        images[1] = "Images/Yash Agarwal.png";
        images[2] = "Images/YashAgarwal_2.png";
        images[3] = "Images/YA.png";

        function quotesL()
		{
			$.ajax({
				type: "POST",
				url: "quotes.php",
				data: { get_quote: "quote" },
				success: function(response)
				{
					$('#quotez').html(response);
				}
			});
			//$('#quotez').load('quotes.php');
		}

		document.getElementById('inf').href = "info.html";

		var tic = document.createElement('iframe');
		tic.src = 'TicTacToe.html';
		tic.id = 'TicTacToeId';
		var ticsrc = document.getElementById('ticTacid');
		ticsrc.appendChild(tic);

	</script>
	<script async src="https://static.addtoany.com/menu/page.js"></script>
	<script src="myscript.js"></script>
</body>
</html>