

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project Blue Berry - Channels</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="ProjectBlueBerryStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<?php include 'ProjectBlueBerryNav.html'; ?>

	<div class="channelsClassA" id="channelsClassAid">
		<div class="channels">
			<h1>Channels</h1>
			<div class="channelsContainer">
				<div class="channelTile" id="cTile1"></div>
				<div class="channelTile" id="cTile2"></div>
				<div class="channelTile" id="cTile3"></div>
				<div class="channelTile" id="cTile4"></div>
				<div class="channelTile" id="cTile5"></div>
				<div class="channelTile" id="cTile6"></div>
				<div class="channelTile" id="cTile7"></div>
				<div class="channelTile" id="cTile8"></div>

				<div class="channelTile" id="cTile9"></div>
				<div class="channelTile" id="cTile10"></div>
				<div class="channelTile" id="cTile11"></div>
				<div class="channelTile" id="cTile12"></div>
			</div>
		</div>
	</div>
	<script>
		/*$(document).ready(function()
		{
			$.ajax({
				type: 'POST',
				url: 'lab.php',
				dataType: 'json',
				data: { fname: 'formTemp'},
				success: function (datal) 
				{
					var x1= [], x2 = [];
					var narr = $('[id^="cTile"]');
					for (var i = 0; i < datal.length; i++) 
					{
						x1[i] = document.createElement('img');
						x1[i].src = datal[i];
						x2[i] = narr[i];
						x2[i].appendChild(x1[i]);
					}
				}
			});
		});	*/		

	</script>
	<script src="ProjectBlueBerryScript.js"></script>
</body>
</html>