
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=false">
	<title>Feeds</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style>
		* { 
			box-sizing: border-box;
			line-height: 1.0; }
			body { width: 100%; }
		video { width: 50%; border:30px solid crimson; margin-left: auto; margin-right: auto;}
		audio { width: 50%; border: 30px solid crimson; background-color: black;}	
		iframe { height: 1078px; width: 863px; }

.modalContainer { 
	display: none;
	position: fixed;
	left: 0;
	top: 0; 
	z-index: 1; 
	width: 100%; 
	background-color: darkslategrey; 
	padding: 5%; 
	overflow: auto;
	height: 100%; }
.modalContainer::-webkit-scrollbar { 
	width: 0; }	
.modalContainer .modalContent { 
	padding: 5%;
	width: 80%; 
	margin-right: auto; 
	margin-left: auto; 
	background-color: indianred;
	border-top-right-radius: 15%;
	border-bottom-left-radius: 15%;  }	
.modalContent button { 
	top: 0;
	left: 0;
	display: inline-block; 
	outline: none; 
	border: 2px solid black;
	font-size: 19px; 
	line-height: 30px; 
	border-radius: 30%; 
	background: none; }  
.modalContent button:hover { 
	cursor: pointer; 
	color: white; 
	border-color: white; }	
.modalContent button i { 
	vertical-align: middle; }		
.heading {
      text-align: center; }

.container { 
      width: 300px; 
      padding: 5px;
      margin-left: auto; 
      margin-right: auto; }
.container input { 
      display: inline-block;
      outline: none; 
      background: none;
      border: 2px solid black;
      border-radius: 25px;
      line-height: 30px;
      padding-left: 10px;
      padding-right: 10px;
      width: 100%; }    
.container button { 
      cursor: pointer;
      display: inline-block; 
      outline: none; 
      border: none; 
      background: none; 
      color: black; 
      text-decoration: none; }

.b1 { 
      margin-bottom: 50px;
      display: flex;
      flex-flow: row;
      justify-content: space-between;
      align-items: center; }
.form input[type=text]::placeholder { 
      color: black; }   
.form input[type=text]:hover::placeholder { 
      color: white; }
.form input:focus { 
      border-color: white; }              
.form button {
      padding-left: 10px;
      padding-right: 10px;
      width: 45%; 
      margin-left: auto; 
      margin-right: auto; 
      border: 2px solid black; }    
.form button:hover { 
      background: white; 
      border-color: white; }  

.others {
      background: indianred; 
      padding: 10px; }
.others button { 
      width: 100%; 
      padding: 10px; }
.others button:hover { 
      background: black; 
      color: white; 
      border-radius: 25px;}  
	</style>
</head>
<body>
	<button id="loginBtn">Login</button>
	<div class="modalContainer" id="mc1">
		<div class="modalContent">
			<button onclick='$("#mc1").css("display", "none");'><i class="material-icons">close</i></button>
			<?php include 'login1.html'; ?>
		</div>
	</div>
	<script>
		$('#loginBtn').click(function() {
			$('#mc1').css("display", "block");
		});
	</script>
	<!--<video id="video-cam"></video>-->
	<!--<audio id='audio-pl'></audio>-->
	<!--<iframe src="formTemplate3.html"></iframe>
	<div id="frame"></div>
	<script>
		var x = document.createElement("iframe");
		x.src = "formTemplate3.html";
		var src = document.getElementById('frame');
		src.appendChild(x);
	</script>-->
   <!--<script>
        navigator.mediaDevices.getUserMedia({ video: true, audio: true })
        .then(mediaStream => {
            const video = document.getElementById('video-cam');
            const audio = document.getElementById('audio-pl');
            video.srcObject = mediaStream;
            audio.srcObject = mediaStream;
            video.onloadedmetadata = (e) => {
                video.play();
            };
            audio.onloadedmetadata = (e) => {
            	audio.play();
            };
        })
        .catch(error => {
            alert('You have to enable the mic and the camera');
        });
    </script>-->
</body>
</html>