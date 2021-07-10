
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project Sugar Cube</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		* { 
			box-sizing: border-box; }
		body { 
			margin: 0.0;
			width: 100%;
			font-family: 'lucida', monospace;
			background-color: #ffef96;
			background: linear-gradient(120deg, #bc5a45, #ffef96); }
		body::-webkit-scrollbar { width: 8px; }
		body::-webkit-scrollbar-thumb { background: #50394c; border-radius: 10px;}
		body::-webkit-scrollbar-track { background: #ffef96; }	
		.mainContainerGallery { 
			padding: 50px 20px; }
		.containerGallery { 
			width: 100%;
			display: flex;
			flex-flow: row wrap;
			justify-content: flex-start;
			align-items: center; }
		.sec { 
			margin: 20px;
			width: 320px; 
			height: 400px; 
			box-shadow: 5px 5px 10px #bc5a45;
			border-radius: 8px; }
		.sec div { 
			border-radius: 10px 10px 0px 0px;
			width: 100%; 
			height: 80%;  }
		.sec div img { 
			width: 100%; 
			height: 100%; 
			border-radius: 10px 10px 0px 0px;}		
		.sec p { 
			background: #50394c;
			color: #ffef96;
			margin: 0px;
			padding: 10px;
			border-radius: 0px 0px 10px 10px;
			width: 100%;
			height: 20%; }				
	</style>
</head>
<body>
	<div class="mainContainerGallery" id="mainContainerGalleryId">
		<h1>Gallery</h1>
		<div class="containerGallery" id="containerGalleryId">
			<section class="sec" id="secId1">
				<div id="unit1"></div>
				<p></p>
				<div class="secControls"></div>
			</section>
			<section class="sec" id="secId2">
				<div id="unit2"></div>
				<p></p>
			</section>
			<section class="sec" id="secId3">
				<div id="unit3"></div>
				<p></p>
			</section>
			<section class="sec" id="secId4">
				<div id="unit4"></div>
				<p></p>
			</section>
			<section class="sec" id="secId5">
				<div id="unit5"></div>
				<p></p>
			</section>
			<section class="sec" id="secId6">
				<div id="unit6"></div>
				<p></p>
			</section>
			<section class="sec" id="secId7">
				<div id="unit7"></div>
				<p></p>
			</section>
			<section class="sec" id="secId8">
				<div id="unit8"></div>
				<p></p>
			</section>
		</div>
	</div>
	<div id="comm">
		
	</div>
	<script>
		$(document).ready(function () {
			$('img').bind('contextmenu', function(e){ return false;});
			$('video').bind('contextmenu', function(e){ return false;});
		});

		$("#mainContainerGalleryId").ready(function () {
			$.ajax({
				type: 'GET',
				url: 'imageSrc.php',
				cache: false,
				dataType: 'json',
				data: { fname: 'gallery' },
				success: function (datal) {
					//x.src = datal[0];
					//alert(datal[0]);
					//array = JSON.parse(datal);
					//var array = $.parseJSON(datal);
					//$('#comm').text(array.length);
					var x1 = [], x2 = [];
					var carr = $('section [id^="unit"]');
					var secarr = $(' [id^="secId"] p');
					for (var i = 0; i < 8/*datal.length*/; i++) 
					{
						x1[i] = document.createElement('img');
						x1[i].src = datal[i];
						x2[i] = carr[i];
						x2[i].appendChild(x1[i]);
						secarr[i].innerHTML = datal[i];
					}
				}
			});
		});
	</script>	
</body>
</html>