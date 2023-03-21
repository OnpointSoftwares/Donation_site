<?php
// Initialize the variables
use AfricasTalking\SDK\AfricasTalking;
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require_once "PHPMailer/src/PHPMailer.php";
  require_once "PHPMailer/src/Exception.php";
  require_once "PHPMailer/src/SMTP.php";
  require_once"vendor/autoload.php";
$consumer_key = '8An32lxeMj9PYYOLVDLsGFllTqAJRyNw';
$consumer_secret = 'UnGPrTj4AGhQMLD5';
$Business_Code = '174379';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$Type_of_Transaction = 'CustomerPayBillOnline';
$Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$phone_number = $_POST['phone'];
$OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$total_amount =$_POST['amount'];
$CallBackURL = 'https://2f50f430.ngrok.io/callback.php?key=Vincentbettoh@kabarak12';
$Time_Stamp = date("Ymdhis");
$password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

$curl_Tranfer = curl_init();
curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
$credentials = base64_encode($consumer_key . ':' . $consumer_secret);
curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
$curl_Tranfer_response = curl_exec($curl_Tranfer);

$token = json_decode($curl_Tranfer_response)->access_token;
$curl_Tranfer2 = curl_init();
curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

$curl_Tranfer2_post_data = [
    'BusinessShortCode' => $Business_Code,
    'Password' => $password,
    'Timestamp' =>$Time_Stamp,
    'TransactionType' =>$Type_of_Transaction,
    'Amount' => $total_amount,
    'PartyA' => $phone_number,
    'PartyB' => $Business_Code,
    'PhoneNumber' => $phone_number,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => 'Donation Site',
    'TransactionDesc' => 'Test',
];

$data2_string = json_encode($curl_Tranfer2_post_data);

curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
$curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);
$transaction_code=$curl_Tranfer2_response->CheckoutRequestID;
$amount=$_POST['amount'];
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$street=$_POST['street'];
$conn=mysqli_connect("localhost","root","","donation_site");
$sql="insert into donations(Name,Email,Address,City,phone,TransactionCode,Amount) values('$name','$email','$address','$street','$phone_number','$transaction_code','$amount')";
 $query=mysqli_query($conn,$sql);
 if($query)
 {
    
$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'vincentbettoh@gmail.com';				
	$mail->Password = 'bgqfhjzyghscmxob';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom("antoninan@kabarak.ac.ke", "Donation Site");		
	$mail->addAddress($email);	
	$mail->isHTML(true);								
	$mail->Subject = 'Money Donation';
	$mail->Body='Dear '.$name.' Your Donation of KES'.$amount.' with transaction code '.$transaction_code.' has been received.Thankyou ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}  
 }
 else{
    echo "Error".mysqli_error($conn);
 }

?>
