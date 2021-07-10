
<?php

$file_path = $_POST['suc'];
if ($file_path) 
{
	$file_name = 'FormsTemplates/' . $file_path;
	copy($file_name, 'booby.txt');

	$fz = fopen('booby.txt', 'w');

	$z = file_get_contents($file_name);

	preg_match('#<style>#', $z, $matches);
	$pos1 = strpos($z, $matches[0]);
	$pos1 += 7;
	$extra = $matches[0][0];

	preg_match('#</style>#', $z, $matches2);
	$pos2 = strpos($z, '/style');
	$pos2 -= 1;

	for ($i = $pos1; $i < $pos2; $i++) 
	{ 
		fwrite($fz, $z[$i]);
	}
	$alpha = '<pre>' . htmlentities(file_get_contents('booby.txt')) . '</pre>';


	fclose($fz);

	$fzz = fopen('booby.txt', 'w');

	preg_match('#<body>#', $z, $matchesx);
	$posx1 = strpos($z, $matchesx[0]);
	$posx1 += 7;

	$posx2 = strpos($z, '/body');
	$posx2 -= 1;

	for ($i = $posx1; $i < $posx2; $i++) 
	{ 
		fwrite($fzz, $z[$i]);
	}

	$beta = '<pre>' . htmlentities(file_get_contents('booby.txt')) . '</pre>';
	echo json_encode(array('a' => $alpha, 'b' => $beta));
	fclose($fzz);
}
else 
{
	echo 'error';
}









/*
$file_path = $_POST['suc'];
if ($file_path)//if ($_POST['suc']) 
{
	//$file_name = 'FormsTemplates/formTemplate1.html';
	$file_name = 'FormsTemplates/' . $file_path;
	$fp = fopen($file_name, 'r');
	//echo fread($fp, filesize($file_name));
	/*while(!feof($fp)) 
	{ 
		echo '<pre>' . fgets($fp) . '</pre>';
	}*/
	//$z = '<pre>' . htmlentities(file_get_contents($file_name)) . '</pre>';
	//echo json_encode(array('a' => $z, 'b' => 'hi'));
	/*echo '<pre>' . htmlentities(file_get_contents($file_name)) . '</pre>';
	fclose($fp);
}
else 
{
	echo 'error';
}*/



?>


