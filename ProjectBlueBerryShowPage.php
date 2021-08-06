<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project Blue Berry - Show</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="ProjectBlueBerryStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<!--?php include 'ProjectBlueBerryNav.html'; ?-->

	<div class="showPageClassA" id="showPageClassAid">
		<div class="Btn">
			<button onclick="" title="Go Back">
				<i class="material-icons" title="Go Back">arrow_backward</i>
			</button>
		</div>
		<div class="showPageContent" id="sPage1">
			<div class="showMain" id="showMainId">
				<div class="showDesc" id="showDescId">
					<h1>Show Title</h1>
					<p>Eng | 2020 | A</p>
					<p>Available Audios: TBD, TBD<br>Available Subtitles: TBD, TBD</p>
					<div class="showDescBtn">
						<button>Watch Episode 1</button>
						<button><i class="material-icons">library_add</i></button>
						<button><i class="material-icons">share</i></button>
					</div>
					<div class="showSeason">
						<select name="seasonSelect" id="seasonSelectId" form="">
						  <option value="season1">Season 1</option>
						  <option value="season2">Season 2</option>
						  <option value="season3">Season 3</option>
						</select>
					</div>
				</div>
				<div class="showPost" id="showPostId">
					<img src="ProjectBlueBerryImages/Images/Cropped/Originals.png">
				</div>
			</div>
			<div class="categoryBtn" id="showCategoryBtnid">
				<button id="epi" title="Click to view Episodes" style="background-color: #123456;">Episodes</button>
				<button id="trai" title="Click to view Trailers and Extras">Clips & Info</button>
				<button id="more" title="Click to view More Like This">More Like This</button>
			</div>	
			<div class="showEps" id="showEpsId">
				<div class="categoryContentTile" id="cTile1"><p>E1: No Description</p></div>
				<div class="categoryContentTile" id="cTile2"><p>E2: No Description</p></div>
				<div class="categoryContentTile" id="cTile3"><p>E3: No Description</p></div>
				<div class="categoryContentTile" id="cTile4"><p>E4: No Description</p></div>
				<div class="categoryContentTile" id="cTile5"><p>E5: No Description</p></div>
				<div class="categoryContentTile" id="cTile6"><p>E6: No Description</p></div>
				<div class="categoryContentTile" id="cTile7"><p>E7: No Description</p></div>
				<div class="categoryContentTile" id="cTile8"><p>E8: No Description</p></div>
				<div class="categoryContentTile" id="cTile9"><p>E9: No Description</p></div>
			</div>
			<div class="clipInfo" id="clipInfoId">
				<div class="sInfo" id="sInfoId">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="sClip" id="sClipId">
					<div class="categoryContentTile" id="cTile"><p>Clip 1: No Description</p></div>
					<div class="categoryContentTile" id="cTile"><p>Clip 2: No Description</p></div>
				</div>
			</div>
			<div class="moreLike" id="moreLikeId">
				<div class="categoryContentTile">
					<div  id="cat1z1" class="thumbnail" title="click to view this"></div>
					<div class="middle">
						<div class="text">
							<p>Content 1</p>
						</div>
					</div>
				</div>

				<div class="categoryContentTile">
					<div  id="cat1z2" class="thumbnail" title="click to view this"></div>
					<div class="middle">
						<div class="text">
							<p>Content 2</p>
						</div>
					</div>
				</div>

				<div class="categoryContentTile">
					<div  id="cat1z3" class="thumbnail" title="click to view this"></div>
					<div class="middle">
						<div class="text">
							<p>Content 3</p>
						</div>
					</div>
				</div>

				<div class="categoryContentTile">
					<div  id="cat1z4" class="thumbnail" title="click to view this"></div>
					<div class="middle">
						<div class="text">
							<p>Content 4</p>
						</div>
					</div>
				</div>

				<div class="categoryContentTile">
					<div  id="cat1z5" class="thumbnail" title="click to view this"></div>
					<div class="middle">
						<div class="text">
							<p>Content 5</p>
						</div>
					</div>
				</div>

				<div class="categoryContentTile">
					<div  id="cat1z6" class="thumbnail" title="click to view this"></div>
					<div class="middle">
						<div class="text">
							<p>Content 6</p>
						</div>
					</div>
				</div>

				<div class="categoryContentTile">
					<div  id="cat1z7" class="thumbnail" title="click to view this"></div>
					<div class="middle">
						<div class="text">
							<p>Content 7</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<script src="ProjectBlueBerryScript.js"></script>
</body>
</html>