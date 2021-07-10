<?php 

$query = $_POST['searchq'];

if (isset($query)) 
{
	if($query == "template")
	{	
		include 'formTemplates.html';
		include 'searchTemplates.html';
		//echo "<p>Form Templates</p>" . include 'formTemplates.html';// . "<p>Search Templates</p><br>";
	}
	elseif ($query == "bio") 
	{
		//echo "<p>Bio</p>";
		echo "<button onclick=\"\" id=\"b2\" title=\"Click to view Bio Page\"><i>Bio</i></button>";
	}
	elseif ($query == "tictac")
	{
		echo "<p>Tic Tac Toe</p>";
	}
	elseif ($query == "projects" or $query =="work")
	{
		echo "<button onclick=\"\" id=\"b3\" title=\"Click to view Work Page\"><i>Work<i/></button><br>";
		echo "<p>Form Templates</p><p>Search Templates</p><p>Tic Tac Toe Game</p><br>";
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