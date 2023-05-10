<?php
session_start();
if(isset($_REQUEST['submit']))
{
    $_SESSION['loggedin'] = false;
    unset($_SESSION['email']);
    header("location:./login.php");
}
?>