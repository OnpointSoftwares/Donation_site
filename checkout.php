<html>
   <head>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<?php
   use AfricasTalking\SDK\AfricasTalking;
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require_once "PHPMailer/src/PHPMailer.php";
  require_once "PHPMailer/src/Exception.php";
  require_once "PHPMailer/src/SMTP.php";
  require_once"vendor/autoload.php";
$amount=$_POST['amount'];
$conn=mysqli_connect("localhost","root","","donation_site");
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$street=$_POST['street'];
$creditno=$_POST['cardno'];
$expirationdate=$_POST['expiration'];
$cvv=$_POST['cvv'];
$phone=$_POST['phone'];
$transactioncode="AZW".rand(100000,10000000);
echo $name,$email,$address,$street,$creditno,$expirationdate,$cvv;
$sql="insert into donations(Name,Email,Address,City,CreditCardno,ExpirationDate,CCV,phone,TransactionCode,Amount) values('$name','$email','$address','$street','$creditno','$expirationdate','$cvv','$phone','$transactioncode','$amount')";
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
	$mail->Body='Dear '.$name.' Your Donation of KES'.$amount.' with transaction code '.$transactioncode.' has been received.Thankyou ';
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
</body>
</html>