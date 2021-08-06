<?php 

$query = $_GET['searchq'];

if (isset($query) and !empty($query)) 
{
	// search query arrays (to be heavily modified in future)
	$arr1 = array("temp", "templ", "templa", "templat", "template", "templates", "templates ", "template ");
	
	$arr2 = array("bio", "abo", "abou", "about", "bio ", "about ");
	
	$arr3 = array("work", "works", "proj", "proje", "projec", "project", "projects", "work ", "project ", "projects ");
	
	$arr4 = array("tic", "tictac", "tictactoe", "tict", "ticta", "tictact", "tictacto", "tic", "tic tac", "tic tac toe", "tictactoe ", "tic tac toe ", "tictac ", "tic ");
	
	$arr5 = array("form", "forms", "formst", "formste", "formstem", "formstemp", "forms t", "forms te", "forms tem", "form t", "form te", "forms ", "form ", "form template", "formtemplate ");
	
	$arr6 = array("sea", "sear", "searc", "search", "search ", "searcht", "searchte", "searchtem", "searchtemp", "searchtempl", "searchtempla", "searchtemplat", "searchtemplate", "searchtemplates", "searchtemplate ", "searchtemplates ", "search t", "search te", "search tem", "search temp", "search templ", "search templa", "search templat", "search template");
	
	$arr7 = array("nav", "navs", "navb", "navba", "navbar", "navbars", "nav ", "nav b", "nav ba", "nav bar", "nav bars", "nav bars ", "navi", "navig", "naviga", "navigat", "navigati", "navigatio", "navigation", "navigation ", "navigation b", "navigations", "navigations ");

	$arr8 = array("grad", "gradi", "gradie", "gradien", "gradient", "gradients", "gradient ", "gradients ", "line", "linea", "linear", "linear ", "linear g", "linear gr", "linear gra", "linear grad", "linear gradi", "linear gradie", "linear gradien", "linear gradient", "linear gradients");

	//search results display mech. (to be heavily modified in future)
	if(in_array($query, $arr1))
	{	
		$start = '<div class="projectTemplate" id="projectTemplateid">' . '<section id="formTemplates">';
		$s1 = '</section>' . '<section id="searchTemplates">';
		$s2 = '</section>' . '<section id="navigationTempId">';
		$s3 = '</section>' . '<section id="videoPlayers">';
		$end = '</section>' . '</div>';

		echo $start;
		include 'formTemplates.html';
		echo $s1;
		include 'searchTemplates.html';
		echo $s2;
		include 'navBars.html';
		echo $s3;
		echo $end;
		//echo "<p>Form Templates</p>" . include 'formTemplates.html';// . "<p>Search Templates</p><br>";
	}
	elseif (in_array($query, $arr2)) 
	{
		//echo "<p>Bio</p>";
		echo "<button onclick=\"\" id=\"b2\" title=\"Click to view Bio Page\"><i>Bio</i></button>";
	}
	elseif (in_array($query, $arr4))
	{
		$start = '<div class="ticTac" id="ticTacid">' . '<h2>Tic Tac Toe</h2>';
		$end = '</div>';

		echo $start;
		include 'TicTacToe.html';
		echo $end;
	}
	elseif (in_array($query, $arr3))
	{
		echo "<button onclick=\"\" id=\"b3\" title=\"Click to view Work Page\"><i>Work<i/></button><br>";
		echo "<p>Form Templates</p><p>Search Templates</p><p>Tic Tac Toe Game</p><br>";
	}
	elseif (in_array($query, $arr5))
	{
		$start = '<div class="projectTemplate" id="projectTemplateid">' . '<section id="formTemplates">';
		$end = '</section>' . '</div>';

		echo $start;
		include 'formTemplates.html';
		echo $end;
	}
	elseif (in_array($query, $arr6))
	{
		$start = '<div class="projectTemplate" id="projectTemplateid">' . '<section id="searchTemplates">';
		$end = '</section>' . '</div>';
		
		echo $start;
		include 'searchTemplates.html';
		echo $end;	
	}
	elseif (in_array($query, $arr7)) 
	{
		$start = '<div class="projectTemplate" id="projectTemplateid">' . '<section id="navigationTempId">';
		$end = '</section>' . '</div>';
		
		echo $start;
		include 'navBars.html';
		echo $end;
	}
	elseif (in_array($query, $arr8))
	{
		$start = '<div class="gradient" id="gradientid">' . '<h2>Gradients</h2>';
		$end = '</div>';

		echo $start;
		include 'LinearGradients.html';
		echo $end;
	}
	elseif ($query == "info")
	{
		echo "<p><a href=\"info.html\" title=\"Click to view\" id=\"inf\"><i>Info</i></a></p>";
		//echo "<iframe src=\"formTemplates.html\"></iframe>";
	}
	else
		echo "No Suggestions";
}
else
	echo "No Suggestions";

?>