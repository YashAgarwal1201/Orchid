
<?php

if (!empty(isset($_POST['aLogin']))) 
{
	$email = $_POST['Email'];
	$pass = $_POST['Password'];

	if (!empty(isset($email)) and !empty(isset($pass))) 
	{
		if ($email == 'legoyashx@gmail.com' or $pass == 'yash') 
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		echo 'Sorry, but something is wrong!!!';
	}
}
if (!empty(isset($_POST['resp']))) 
{
	$msg = $_POST['Message'];
	$to = $_POST['sEmail'];
	$sub = 'My First Mail';
	$head = 'From: legoyashx@hotmail.com';

	if (!empty(isset($msg)) and !empty(isset($to))) 
	{
		$msg = wordwrap($msg, 70);

		mail($to, $sub, $msg, $head);
	
	}
}
/*function loginVerify()
{
	$email = $_POST['Email'];
	$pass = $_POST['Password'];

	if (!empty(isset($email)) and !empty(isset($pass))) 
	{
		if ($email == 'legoyashx@gmail.com' and $pass == 'Yash!admin') 
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		echo 'Sorry, but something is wrong!!!';
	}
}*/

/*function myResponse()
{
	echo 'oh hello there!!';
}*/

/*$email = $_POST['Email'];
$pass = $_POST['Password'];

if (!empty(isset($email)) and !empty(isset($pass))) 
{
	if ($email == 'legoyashx@gmail.com' and $pass == 'Yash!admin') 
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}
else
{
	echo 'Sorry, but something is wrong!!!';
}*/

?>