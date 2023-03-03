<?php
require_once ('config.php'); // For storing username and password.

session_start();
?>

<!-- HTML code for Bootstrap framework and form design -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Sign in</title>
</head>
<body>
        <div class='header'>
        <div class="doc">
            <h3>Navigation</h3>
            <a href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="donate.html">Donate</a>
            <a href="contact.html">Contact</a>
            <a href="contact.html">Login</a>
        </div>
<div class="container" style="background-image:url('images/back.jpg'); margin-top: 10em;width: 100%">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign Up here</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus><br/>
        <label for="inputPassword" class="sr-only">Password</label>
    
        <input name="Password" maxlength="6" minlength="6" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input name="Password" maxlength="6" minlength="6" type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" style='background-image: linear-gradient(red,yellow);' value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
<a style='background-image: linear-gradient(blue,yellow);' class="btn btn-lg btn-primary btn-block" href="login.php">Login here</a>
        <?php

        /* Check if login form has been submitted */
        if(isset($_POST['Submit'])){

            // Rudimentary hash check
            $result = password_verify($_POST['Password'], $Password);
            $conn=mysqli_connect('localhost','root','','seatbook');
$username=$_POST['Username'];
$password=$_POST['Password'];
$sql="insert into login(username,password) values('$username','$password')";
$query=mysqli_query($conn,$sql);
            /* Check if form's username and password matches */
            if($query) {

                ?>
                <!-- Show an error alert -->
                &nbsp;
                <div class="alert alert-danger alert-dismissible" role="alert" style="background-color: green;color:black;font-weight: bolder">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Successful!</strong> Proceed to login by clicking button bellow.
                </div>
                <?php
            } else {
                ?>
                <!-- Show an error alert -->
                &nbsp;
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> Unsuccessful!! try again
                </div>
                <?php
            }
        }
        ?>

    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
