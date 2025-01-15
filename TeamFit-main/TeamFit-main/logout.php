
<?php

session_start(); //Start the session

//Unset all the session variables
$_Session = array();

//Destroy the session
session_destroy();

//Redirect to the login page
//echo "Logged out successfully!";
header("Location: /TeamFit-main/login.html");

exit;

?>
