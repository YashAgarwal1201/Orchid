<!DOCTYPE html>

<html lang="en">
<!-- head -->
<head>
	<title>Yash Agarwal</title>
	<noscript><meta http-equiv="refresh" content="2; URL=https://www.google.com/"></noscript>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="nmoLLJ3D8eS6hYCnBRkEGKLvBhlzRTsidi-_NYECPu4" />
	<link rel="icon" type="image/icon type" href="Images/YA3.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="mystyle.css" id="link1">
	<!--<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 800px)" href="" id="style1">-->
	<link rel="stylesheet" type="text/css" href="" id="link2">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="myscript.js"></script>
	<!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>-->
	<!--<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 800px)" href="" id="style1">-->
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
			<form id="s" action="">
				<input type="search" name="" id="search1" autocomplete="off" placeholder="Search...">
				<button type="submit" onclick="" id="s2"><i class="material-icons">search</i></button>
			</form>
		</div>
	</div>

	<div class="topnav2" id="topnav2id">
		<button onclick="topnav2(this)" id="tn2btnid"><i class="material-icons">menu</i></button>
		<div class="nav" id="navId">
			<button onclick="fun(this)" id="b1" title="Click to view Home Page">Home</button>
			<button onclick="fun(this)" id="b2" title="Click to view Bio Page">Bio</button>
			<button onclick="fun(this)" id="b3" title="Click to view Work Page">Work</button>
		</div>
		<div class="dateTime" id="date"></div>
		<button><i class="material-icons">search</i></button>
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
			<button onclick="displayPreviousImage();"><i class="material-icons">arrow_back</i></button>
			<button onclick="displayNextImage();"><i class="material-icons">arrow_forward</i></button>
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
			<h2>Academic Project</h2>
			<div>
				<h3>August, 2020 - <br>currently ongoing</h3>
				<p>Academic project on "Facial Recogniton based Attendance System".<br>Role: Group communicator (or, Group Manager).</p>
			</div>
			<!--<div class="pa1">
				<h3>August, 2020 - <br>currently ongoing</h3>
				<p>Academic project on "Facial Recogniton based Attendance System".</p>
			</div>-->
		</div>
		<div class="bioCertification" id="bioCertificationid">
			<h2>Certifications</h2>
			<div class="bc1">
				<h3>July 26, 2020</h3>
				<p>Completed certification for "Crash course on Python" by Google on Coursera.</p>
			</div>
			<div class="bc1">
				<h3>July 27, 2020</h3>
				<p>Completed certification for "Introduction to HTML5" by University of Michigan on Coursera.</p>
			</div>
		</div>
		<div class="bioSkills" id="bioSkillsid">
			<h2>Skills</h2>
			<!--<div class="sk1">
				<h3>HTML</h3>
				<div class="skContent">
					<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i>
				</div>
			</div>
			<div class="sk1">
				<h3>CSS</h3>
				<div class="skContent">
					<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i>
				</div>
			</div>
			<div class="sk1">
				<h3>JavaScript</h3>
				<div class="skContent">
					<i class="material-icons">star</i><i class="material-icons">star</i><i class="material-icons">star</i>
				</div>
			</div>
			<div class="sk1">
				<h3>PHP</h3>
				<div class="skContent">
					<i class="material-icons">star</i>
				</div>
			</div>-->
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
					<td><h3>Jquery</h3></td>
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
	</div>	
<!-- Projects -->
	<div class="projects" id="projectsid">
		<h1>Work</h1>
		<div class="projectCategory" id="projectCategoryid">
			<button onclick="projectView(this)" id="temp" title="Click to view Templates" style="font-weight: bold;">Templates</button>
			<!-- <button onclick="projectView(this)" id="ac" title="Click to view Academic projects">Academic</button> -->
			<button onclick="projectView(this)" id="my" title="Click to view timeline of this website">This</button>
		</div>
		<div class="projectTemplate" id="projectTemplateid">
			<!--<div class="pt1">
				<h3>August, 2020 - <br>currently ongoing</h3>
				<p>Academic project on "Facial Recogniton based Attendance System".</p>
			</div>-->
			<?php include 'formTemplates.html'; ?>
			<?php include 'searchTemplates.html'; ?>
		</div>
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
		<div class="projectTimeline" id="projectTimelineid">
  			<div class="container left" id="l">
    			<div class="content">
      				<button onclick="version(this)" title="Click to view this version" id="v1"><h2>January, 2021</h2></button>
      				<p>Initial release.</p>
    			</div>
  			</div>
  			<div class="container right" id="r">
    			<div class="content">
      				<button onclick="version(this)" title="Click to view this version" id="v2"><h2>February, 2021</h2></button>
      				<p>Major UI update.</p>
    			</div>
  			</div>
  			<div class="container left" id="l">
    			<div class="content">
      				<button onclick="version(this)" title="Click to view this version" id="v3"><h2>May, 2021</h2></button>
      				<p>Major UI update.</p><p>Added Contact Form.</p><p>Detailed Work Profile.</p>
    			</div>
  			</div>
  			<div class="container right" id="r">
    			<div class="content">
      				<button onclick="" title="TBA" disabled=""><h2>Later, 2021</h2></button>
      				<p>TBA.</p>
    			</div>
  			</div>
		</div>
	</div>	
<!-- Timeline -->
	<!--<div class="timeline" id="timelineid">
		<h1>Timeline</h1>
		<div class="timelineTime" id="timelineTimeid">
  			<div class="container left" id="l">
    			<div class="content">
      				<h3>August, 2018</h3>
      				<br><i class="material-icons">school</i>
      				<p>Started Under-Graduation <br>at DIT university</p>
    			</div>
  			</div>
  			<div class="container right" id="r">
    			<div class="content">
      				<h3>March, 2018</h3>
      				<br><i class="material-icons">grade</i>
      				<p>Completed 12th standard</p>
    			</div>
  			</div>
  			<div class="container left" id="l">
    			<div class="content">
      				<h3>March, 2016</h3>
      				<br><i class="material-icons">grade</i>
      				<p>Completed 10th standard</p>
    			</div>
  			</div>
  			<div class="container right" id="r">
    			<div class="content">
      				<h3>April, 2007</h3>
      				<br><i class="material-icons">school</i>
      				<p>Started school <br>at Modern Era Public School</p>
    			</div>
  			</div>
  			<div class="container left" id="l">
    			<div class="content">
      				<h3>January 12, 2000</h3>
      				<br><i class="material-icons">cake</i>
      				<p>Born on this day</p>
    			</div>
  			</div>
		</div>
	</div>	-->
<!-- Gallery -->
	<div class="gallery" id="gallid">
		<div class="galleryHeading" id="galleryHeadingid">
			<h1>Gallery</h1>
		</div>
		<div class="elfsight-app-961a2392-5e74-4f11-8cd4-3cb86a7a554b" id="i1"></div>
	</div>	
<!-- Upward Scroll Button -->		
	<button onclick="scrollbtn()" id="pagescrollup" title="go to top"><i class="material-icons">arrow_upward</i></button>
	<button onclick="scrollbtn2()" id="pagescrolldown" title="go to bottom"><i class="material-icons">arrow_downward</i></button>
<!-- Footer -->
	<div class="footer" id="footerid">
		<h2>Want to say something ?</h2>
		<form action="myForm.php" method="POST" target="_parent" onsubmit="return false;" id="form1">
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
		<div class="details" id="detailsid">
			<details>
				<summary>Some Important Info</summary>
				<p><a href="" title="Click to view">Info</a></p>
			</details>
		</div>
	</div>
	<script>
		$(document).ready(function()
		{
			$.ajaxSetup({cache: false});
			setInterval(displayNextImage,5000);
			setInterval(quotesL, 20000);

			var img1 = document.createElement("img"); 
			img1.src = "Images/Yash Agarwal.png"; 
			var src = document.getElementById('homeImageid');
			img1.id = "hI";
			src.appendChild(img1);

			$('img').bind('contextmenu', function(e){ return false;});
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
            x = (x === images.length - 1) ? 0 : x + 1;
            document.getElementById("hI").src = images[x];
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
		}
		//Form Handling
		$("#form1").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.

			var badWords = [
				"fuck", "stfu", "crap", "shit", "trash", "bitch", "bc", "bullshit", "cuss", "hell", "curse", "getlost", "moth", "fath", "douche", "abuse"
				];
			var name = $("[name='Name']").val().toLowerCase();
			var msg = $("[name='Message']").val().toLowerCase();
			if ($.inArray(name, badWords) !== -1 || $.inArray(msg, badWords) !== -1) 
			{
				alert("You Message contains bad words, Kindly remove them.");
			}
			else 
			{
				var form = $(this);
    			var Url = form.attr('action');
    			$.ajax({
    			       type: "POST",
    			       url: Url,
    			       data: form.serialize(), // serializes the form's elements.
    			       success: function(datal)
    			       {
    			       		$(":selected").val('');
    			       		$("#footerid > h2").hide();
    			       		$("#form1").text(/*"Your Message is delivered."*/datal);
    			           	//alert("Form Successfully submitted"); // show response from the php script.
    			       }
    	    	});
    		}
		});
	</script>
</body>
</html>