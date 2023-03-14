<?php
         $name=$_POST['name'];
use AfricasTalking\SDK\AfricasTalking;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";
require_once"vendor/autoload.php";

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'winwritesofficial@gmail.com';				
	$mail->Password = 'capdwmpqvrnwqnxc';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom($userEmail, $userName);		
	$mail->addAddress('vincentbettoh@gmail.com',"+254702502952@vtext.com");	
	$mail->isHTML(true);								
	$mail->Subject = 'Subject';
	$mail->Body=$name;
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
	$username = 'MBNS'; // use 'sandbox' for development in the test environment
$apiKey   = '4562797a65bc7c29f2da3cdd65cfdd9b2889bd25d67d0d3fa80839ff3bf16e31'; // use your sandbox app API key for development in the test environment
$AT       = new AfricasTalking($username, $apiKey);

// Get one of the services
$sms      = $AT->sms();

// Use the service
$result   = $sms->send([
    'to'      => $phone,
    'message' => 'The book '.$name.' is available on store you can order now.'
]);

print_r($result);

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
