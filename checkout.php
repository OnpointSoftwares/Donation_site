<?php
$conn=mysqli_connect("localhost","root","","donation_site");
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$street=$_POST['street'];
$credit_card_number=$_POST['cardno'];
$expirationdate=$_POST['expiration'];
$cvv=$_POST['cvv'];
$bzp=$_POST['bzp'];
?>