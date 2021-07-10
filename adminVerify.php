
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
	//ini_set('SMTP','myserver');
	//ini_set('smtp_port',25);

	/*if (!empty(isset($msg)) and !empty(isset($to))) 
	{
		$msg = wordwrap($msg, 70);

		mail($to, $sub, $msg, $head);
	
	}*/


require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = "587"; // typically 587 
$mail->SMTPSecure = 'tls'; // ssl is depracated
//$mail->SMTPAuth = true;
$mail->Username = "legoyashx@gmail.com";
$mail->Password = "Yash120100";
$mail->setFrom("legoyashx@gmail.com", "Yash Agarwal");
$mail->addAddress( $to, "TBD");
$mail->Subject = 'Any_subject_of_your_choice';
$mail->msgHTML( $msg ); // remove if you do not want to send HTML email
$mail->AltBody = 'HTML not supported';
//$mail->addAttachment('docs/brochure.pdf'); //Attachment, can be skipped

$mail->send();
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