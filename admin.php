<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="nmoLLJ3D8eS6hYCnBRkEGKLvBhlzRTsidi-_NYECPu4" />
	<link href="https://yashagarwal.epizy.com/" rel="canonical">
	<link rel="icon" type="image/icon type" href="Images/YA3.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		* { 
			box-sizing: border-box; }
		body { 
			background: #c1946a;
			margin: 0.0;
			text-align: center; }
		h1, h2, h3, i { 
			font-family: Spectral, serif; }
		p, button, a, span, summary, details, .dateTime, .datetime2, label, #quotez, ul, li { 
			font-size: 19px;
			font-family: Rubik, sans-serif; }	
		.adminPanelLogin {
			width: 40%;
			margin: 100px auto;
			background: #405d27;
			border-radius: 15px;
			text-align: left;
			padding: 50px 15px 50px 15px; }
		.adminPanelLogin h1 { 
			text-align: center;
			margin-bottom: 100px; }	
		.emailContainer, .passwordContainer { 
			padding: 10px;
			margin: 5px;
			border: 2px solid white;
			border-radius: 10px; }
		.formAction { 
			padding: 10px;
			margin: 5px;
			width: 100%; }	
		button, input, textarea { 
			resize: none;
			display: inline-block;
			background: none;
			border: none;
			outline: none;
			line-height: 30px;
			padding: 5px; }	
		button { 
			background: white;
			width: 47%;
			margin: auto;
			border-radius: 5px;
			cursor: pointer;
			color:  #405d27; }
		button:hover { 
			background: #3e4444; }
		input { 
			width: 50%; }			
		i, input::placeholder, textarea::placeholder { 
			vertical-align: middle; }
		input::placeholder, textarea::placeholder { 
			color: white; }	

		.adminPanelWork { 
			padding: 5px;
			width: 100%; }
		.pNav { 
			padding: 10px;
			margin: 20px 50px;
			text-align: left; }
		.pNav button { 
			border-radius: 0px;
			background: none;
			width: auto;
			color: black;
			padding: 20px; }
		.pNav button:hover { 
			color: white; }
		.pNav #pb1 { 
			background-color: #405d27;
			color: black; }
		.pNav #pb1:hover { 
			border-top-right-radius: 25%;
			border-bottom-left-radius: 25%; 
			border: none; }		

		.pHome, .pResponses { 
			text-align: left; }

		.pHome { 
			display: none; }

		.pResp { 
			padding: 5px;
			display: flex;
			flex-flow: row wrap;
			justify-content: space-between;
			align-items: flex-start; }
		.pResp1, .pResp2 { 
			width: 49%;
			padding: 10px;
			background-color: #405d27;
			border-radius: 25px;
			height: 500px; }

		.pResp2 form { 
			padding: 5px; }
		.pResp2 div { 
			width: 100%;
			padding: 10px;
			margin: 5px; }	
		.pResp2 input, .pResp2 textarea {
			font-size: 15px;
			font-family:  Rubik, sans-serif;
			color: #c1946a;
			border: 2px solid black;
			width: 100%; 
			padding: 5px; }
		.pResp2 textarea { height: 200px; }											
	</style>
</head>
<body>

	<div class="adminPanelLogin">
		<h1>Admin Panel Login</h1>
		<form id="aPanel" action="adminVerify.php">
			<div class="emailContainer">
				<label>E-mail:</label>
				<input type="email" name="Email" placeholder="Your E-mail..." autocomplete="off" required>
			</div>
			<div class="passwordContainer">
				<label>Password:</label>
				<input type="password" name="Password" placeholder="Your Password..." autocomplete="off" required>
			</div>
			<div class="formAction">
				<button type="submit" value="aLogin" name="aLogin"><i class="material-icons">send</i></button>
				<button type="reset"><i class="material-icons">delete</i></button>
			</div>
		</form>
		<span id="fError"></span>
	</div>

	<div class="adminPanelWork">
		<div class="pNav">
			<button id="pb1"><i class="material-icons" id="pb1">home</i></button>
			<button id="pb2">Responses</button>
			<button id="pb3">TBA</button>
			<button id="pb4">TBA</button>
		</div>
		<h1>Admin Panel</h1>
		<div class="pHome" id="pHomeId">
			<h2>Home</h2>
		</div>
		<div class="pResponses" id="pResonsesId">
			<h2>Responses</h2>
			<div class="pResp">
				<div class="pResp1">
					<h3>Messages Received</h3>
					<?php 
						$fp = fopen('quotes.php', 'r');
						echo $fp;
						fclose($fp);
					?>
				</div>
				<div class="pResp2">
					<h3>Your Response</h3>
					<form id="response" action="adminVerify.php">
						<div>
							<label>To:</label>
							<input type="email" name="sEmail" placeholder="Receiver's E-mail..." required>
						</div>
						<div>
							<label>Message:</label>
							<textarea name="Message" placeholder="Message..." required></textarea>
						</div>
						<div>
							<button type="submit" value="resp" name="resp"><i class="material-icons">send</i></button>
							<button type="reset"><i class="material-icons">delete</i></button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

	<script>

		$('.emailContainer input').focus(function () {
			$('.emailContainer').css('border-color', 'black');
		}).blur(function () {
			$('.emailContainer').css('border-color', 'white');
		});

		$('.passwordContainer input').focus(function () {
			$('.passwordContainer').css('border-color', 'black');
		}).blur(function () {
			$('.passwordContainer').css('border-color', 'white');
		});

		$('#aPanel').submit(function (ev) {
			ev.preventDefault();
			var form = $(this);
    		var Url = form.attr('action');
    		$.ajax({
    			type: "POST",
    			url: Url,
    			data: form.serialize(), // serializes the form's elements.
    			success: function(datal)
    			{
    				if (datal == 1) 
    				{
    					$('.adminPanelLogin').hide();
    				}
    				else
    				{
    					$('#fError').text('Login Unsucessful');
    					$(':selected').val('');
    				}
    			}
    		});
		});

		$('#response').submit(function (ev) {
			ev.preventDefault();
			var form = $(this);
			var URL = form.attr('action');
			$.ajax({
				type: 'POST',
				url: URL,
				data: form.serialize(),
				success: function(datal)
				{
					alert('sucess');
					$(':selected').val('');
				}
			})
		})
	</script>
</body>
</html>