<?php 

$var = $_POST['fname'];

if (isset($var) and !empty($var)) 
{
	$dir = "ProjectBlueBerryImages/Images/Cropped";
	$ass = array(0);
	if (is_dir($dir))
	{
		$files = scandir($dir, 0);
		for($i = 2, $j = 0; $i < count($files), $j < count($files) - 2; $i++, $j++)
		{
	    		$ass[$j] = $dir . '/' . $files[$i] ;
		}
		echo json_encode($ass);
	}
	else 
	{
		echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
	}
}
else
	echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";

?>