
<?php

$var = $_GET['fname'];

switch ($var) 
{
	case 'gallery':
		
		if (isset($var) and !empty($var)) 
		{
			$dir = "Images";
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
	break;
	

	case 'navBar':

		if (isset($var) and !empty($var)) 
		{
			$dir2 = "NavigationBars/NavigationBarsImages";
			$ass2 = array(0);
			if (is_dir($dir2))
			{
				$files2 = scandir($dir2, 0);
				for($i = 2, $j = 0; $i < count($files2), $j < count($files2) - 2; $i++, $j++)
				{
			    		$ass2[$j] = $dir2 . '/' . $files2[$i] ;
				}
				echo json_encode($ass2);
			}
			else 
			{
				echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
			}
		}
		else
			echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
	break;

	case 'searchTemp':

		if (isset($var) and !empty($var)) 
		{
			$dir2 = "SearchTemplates/SearchTemplatesImages";
			$ass2 = array(0);
			if (is_dir($dir2))
			{
				$files2 = scandir($dir2, 0);
				for($i = 2, $j = 0; $i < count($files2), $j < count($files2) - 2; $i++, $j++)
				{
			    		$ass2[$j] = $dir2 . '/' . $files2[$i] ;
				}
				echo json_encode($ass2);
			}
			else 
			{
				echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
			}
		}
		else
			echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
	break;

	case 'formTemp':

		if (isset($var) and !empty($var)) 
		{
			$dir2 = "FormsTemplates/FormsTemplatesImages";
			$ass2 = array(0);
			if (is_dir($dir2))
			{
				$files2 = scandir($dir2, 0);
				for($i = 2, $j = 0; $i < count($files2), $j < count($files2) - 2; $i++, $j++)
				{
			    		$ass2[$j] = $dir2 . '/' . $files2[$i] ;
				}
				echo json_encode($ass2);
			}
			else 
			{
				echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
			}
		}
		else
			echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
	break;	

	default:
		
		echo "OOPS, SORRY BUT AN ERROR HAS OCCURED. PLEASE TRY AFTER SOME TIME.";
		break;
}


?>