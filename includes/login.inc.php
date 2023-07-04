<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST["submit"])) {
  // Retrieve form data
$userName = $_POST['user-name'];
$password = $_POST['password'];

// instantiate LoginContr class
include "../classes/dbh.classes.php";
include "../classes/login.classes.php";
include "../classes/login-contr.classes.php";
$login = new LoginContr($userName, $password);

// run error handlers and register users

$login->loginUser();

// go back to login page

header("Location: ../profile.php?error=none");

}

?>
