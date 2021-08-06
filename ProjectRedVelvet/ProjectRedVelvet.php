

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

		<div class="topNews" id="topNewsId">
			<h1>Top News</h1>
			<?php include 'ProjectRedVelvetTopNews.php'; ?>
		</div>

		<div>
			<h2>Based on your History</h2>
			<?php include 'ProjectRedVelvetHistory.php'; ?>
		</div>

		<div class="topTrend">
			<h1>Trending</h1>
			<?php include 'ProjectRedVelvetTopTrending.php'; ?>
		</div>

		<div class="">
			<h2>Political</h2>
			<?php include 'ProjectRedVelvetHistory.php'; ?>
		</div>

		<div class="">
			<h2>Global</h2>
			<?php include 'ProjectRedVelvetHistory.php'; ?>
		</div>

		<div class="">
			<h2>Entertainment</h2>
			<?php include 'ProjectRedVelvetHistory.php'; ?>
		</div>

		<div class="">
			<h2>Sports</h2>
			<?php include 'ProjectRedVelvetHistory.php'; ?>
		</div>

	</div>
	<script src="ProjectRedVelvetScript.js"></script>
</body>
</html>