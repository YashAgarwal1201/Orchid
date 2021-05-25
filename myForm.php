
<?php

$name = filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["E-mail"], FILTER_SANITIZE_EMAIL);
$msg = $_POST["Message"];


$ip = $_SERVER['REMOTE_ADDR'];
$line_number = false;
$count = 0;

if (isset($_POST["website"]) && $_POST["website"] == "") 
{
	if(!empty($name) && !empty($email) && !empty($msg))
	{
		date_default_timezone_set("Asia/Kolkata");
		//$cvsData = $name . "," . $email . "," . $msg . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $ip . "\n";
		$fp = fopen("form.csv","a"); 
		$fp1 = file("form.csv");
	    if($fp)
	    {
	    	while (list($key, $line) = each($fp1) and !$line_number) 
	    	{
	    		$line_number = (strpos($line, $ip) !== FALSE);
	    	}
	    	if ($line_number) 
	    	{
	    		echo "Message already sent";
	    	}
	    	else
	    	{
	    		$cvsData = $ip . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $name . "," . $email . "," . $msg . "\n";
	    		//$cvsData = $name . "," . $email . "," . $msg . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $ip . "\n";
	    		fwrite($fp,$cvsData);
	    		echo "Your Message is delivered.";
	    	}
	        fclose($fp); // Close the file
	    } 
	}
	else
	{
		echo "Empty form";
	}
}
else
{
	http_response_code(400);
}/*
$name = filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["E-mail"], FILTER_SANITIZE_EMAIL);
$msg = $_POST["Message"];

$badWords = array("fuck", "stfu", "crap", "shit", "trash", "bitch", "bc", "bullshit", "cuss", "hell", "curse", "getlost", "moth", "fath", "douche", "abuse");
$checkName = strtolower($name);
$checkMsg = strtolower($msg);

$ip = $_SERVER['REMOTE_ADDR'];
$line_number = false;
$count = 0;

if (isset($_POST["website"]) && $_POST["website"] == "") 
{
	if(!empty($name) && !empty($email) && !empty($msg))
	{
		foreach ($badWords as $check) 
		{
			if (strrpos($checkName, $check) !== FALSE && strrpos($checkMsg, $check) !== FALSE) 
			{
				echo "You are using Bad Words. Kindly remove them.";
				break;
			}
			else
			{
				date_default_timezone_set("Asia/Kolkata");
				//$cvsData = $name . "," . $email . "," . $msg . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $ip . "\n";
				//$fp = fopen("sampleForm.txt","a"); 
				//$fp1 = file("sampleForm.txt");
				$fp = fopen("form.csv","a"); 
				$fp1 = file("form.csv");
	    		if($fp)
	    		{
	    			while (list($key, $line) = each($fp1) and !$line_number) 
	    			{
	    				$line_number = (strpos($line, $ip) !== FALSE);
	    			}
	    			if ($line_number) 
	    			{
	    				echo "Message already sent";
	    			}
	    			else
	    			{
	    				$cvsData = $ip . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $name . "," . $email . "," . $msg . "\n";
	    				//$cvsData = $name . "," . $email . "," . $msg . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $ip . "\n";
	    				fwrite($fp,$cvsData);
	    				echo "Your Message is delivered.";
	    			}
	        		fclose($fp); // Close the file
	        		break;
	    		}
			}
		}
	}
	else
	{
		echo "You are trying to send an empty msg";
	}	
}
else
{
	http_response_code(400);
}
/*if (isset($_POST["website"]) && $_POST["website"] == "") 
{
	if(!empty($name) && !empty($email) && !empty($msg))
	{
		date_default_timezone_set("Asia/Kolkata");
		//$cvsData = $name . "," . $email . "," . $msg . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $ip . "\n";
		$fp = fopen("sampleForm.txt","a"); 
		$fp1 = file("sampleForm.txt");
	    if($fp)
	    {
	    	while (list($key, $line) = each($fp1) and !$line_number) 
	    	{
	    		$line_number = (strpos($line, $ip) !== FALSE);
	    	}
	    	if ($line_number) 
	    	{
	    		echo "Message already sent";
	    	}
	    	else
	    	{
	    		$cvsData = $ip . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $name . "," . $email . "," . $msg . "\n";
	    		//$cvsData = $name . "," . $email . "," . $msg . "," . date("Y/m/d") . "," . date("h:i:sa") . "," . $ip . "\n";
	    		fwrite($fp,$cvsData);
	    		echo "Your Message is delivered.";
	    	}
	        fclose($fp); // Close the file
	    } 
	}
	else
	{
		echo "You are trying to send an empty msg";
	}
}
else
{
	http_response_code(400);
}*/
?>