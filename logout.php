<?php
session_destroy();
if(isset($_SESSION['Login']))
{

}
else{
    header("location:index.php");
}
?>