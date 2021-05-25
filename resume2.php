<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yash Agarwal</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="r2style.css">
	<style>
		* {  box-sizing: border-box; }
		html { scroll-behavior: smooth; }
		body { 
			margin: 0.0px; 
			font-size: 120%; 
			background-color: rgba(10,40,70,0.6); }
	</style>
	<!--<link rel="stylesheet" type="text/css" media="screen and (max-width: 900px)" href="r2style.css">-->
</head>
<body>
	<div class="header">
		<div class="TopNav">
			<a href="#i1">Details</a>
			<a href="#i2">Projects</a>	
			<a href="#i3">Achivements</a>
			<a href="#i4">Education</a>
			<p><span id="datetime"></span></p>
			<script>
				var dt = new Date();
				document.getElementById("datetime").innerHTML = dt.toLocaleString();
			</script>
		</div>
	</div>
	<div class="row1">
		<div class="row1_column1">
			<h1>Yash Agarwal</h1><br>
			<p>"It is our choices, Harry, that show what we truly are, far more than our abilities."<br>— Albus Dumbledore</p>
		</div>
		<div class="row1_column2">
			<img src="IMG_1.jpg" alt="Yash Agarwal"/>
		</div>
	</div>
	<div class="row5" id="i1">
		<h2 style="text-align: center;">Details</h2><br>
		<p><b>D.O.B.</b><br>12<sup>th</sup> of Januray, 2000<br><br><b>Address:</b><br>Pragati Vihar, Near Karan Hospital<br>Bijnor (246701), U.P.<br><br>
		<b>Contact:</b><br>(+91) 9012962020<br><a href="mailto:legoyashx@outlook.com">legoyashx@outlook.com</a><br><br>
		<b>Nationality:</b><br>Indian</p>
	</div>
	<div class="row2" id="i2">
		<h2 style="text-align: center;">Projects</h2><br>
		<p>Currently Developing an academic Group project on "Face Based Attendance System"<br>Tenure: August, 2020 - currently ongoing<br>Position: Group Communicator (or, Group Leader)</p>
	</div>
	<div class="row6">
		<h2 style="text-align: center;">Skills</h2><br>
		<p><b>Programming Languages worked on:</b><br>HTML, CSS, Javascript, C, Python.<br><br><b>Languages speak:</b><br>English, Hindi.</p>
	</div>
	<div class="row3" id="i3">
		<h2 style="text-align: center;">Achievements</h2><br>
		<p>Online Certification on "Crash Course On Python by Google" on Coursera<br>Score: 94%<br><br>
		Online Certification on "Introduction To HTML5 by University of Michigan" on Coursera<br>Score: 92.83%</p>
	</div>
	<div class="row4" id="i4">
		<h2 style="text-align: center;">Education History</h2><br>
		<p><b>Bachelor of Technology in Computer Science and Engineering</b><br>DIT University, Dehradun<br>Batch: 2018-2022<br>Current Aggregate CGPA: 7.1<br><br><b>12<sup>th</sup> (Intermediate)</b><br>Modern Era Public School, Bijnor<br>Year passed: 2018<br>Aggregate percentage: 77%<br><br>
		<b>10<sup>th</sup> (High school)</b><br>Modern Era Public School, Bijnor<br>Year Passed: 2016<br>Aggregate percentage: 89%<br></p><br>
	</div>
</body>
</html>