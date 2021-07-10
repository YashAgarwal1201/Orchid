
<?php

$name = filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
$email = filter_var($_POST["E-mail"], FILTER_SANITIZE_EMAIL);
$msg = $_POST["Message"];


$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST["website"]) && $_POST["website"] == "") 
{
	if(!empty($name) && !empty($email) && !empty($msg))
	{
		date_default_timezone_set("Asia/Kolkata");
		$fp = fopen("Feedback_Handeler.csv","a"); 
		$fp1 = file("Feedback_Handeler.csv");
	    if($fp)
	    {

	    	$cvsData = $ip . "," . date("d/m/Y") . "," . date("h:i:sa") . "," . $name . "," . $email . "," . $msg . "\n";
	    	fwrite($fp,$cvsData);
	    	echo "Your Message is delivered.";
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