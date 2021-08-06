<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project Red Velvet - Home</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="ProjectRedVelvetStyle.css" id="style1">
	<link rel="stylesheet" type="text/css" href="" id="style2">
</head>

<body>
	<div class="noScript" id="nsId">
		<noscript>
			<h1>No Javascript!</h1><hr>
			<p>There's Javascript disabled on your system, Please enable it to view content.</p>
		</noscript>
	</div>
	<div class="withScript" id="wsId">

		<?php include 'ProjectRedVelvetNav.html'; ?>
		<div id="liveNewsId">
			<h1>Live News</h1>
			<div class="portal">
				<section></section>
				<?php include 'ProjectRedVelvetLiveP1.php'; ?>
			</div>

			<div class="portal">
				<section></section>
				<?php include 'ProjectRedVelvetLiveP1.php'; ?>
			</div>

			<div class="portal">
				<section></section>
				<?php include 'ProjectRedVelvetLiveP1.php'; ?>
			</div>
		</div>

	</div>
	<script src="ProjectRedVelvetScript.js"></script>
</body>
</html>	