<?php

//$var = $_GET['fname'];
//if (isset($var) and !empty($var)) 
{
	$dir = "FormsTemplates/FormsTemplatesImages";
	$ass = array(0);
	if (is_dir($dir))
	{
		$files = scandir($dir, 0);
		for($i = 2, $j = 0; $i < count($files), $j < count($files) - 2; $i++, $j++)
		{
	    	//print $dir . '/' . $files[$i] . "\n";
	    	//for($j = 0; $j < count($files); $j++)
	    	{
	    		$ass[$j] = $dir . '/' . $files[$i] ;
	    		//echo $ass[$j];
	    	}
		}
		echo json_encode($ass);
		//echo count($ass);
		//print_r($ass);
	}
	else 
	{
		echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
	}
}
//else
	//echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";



?>