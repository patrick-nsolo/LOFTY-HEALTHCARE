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
$confirmPassword = $_POST['confirm-password'];
$firstName = $_POST['first-name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$countryCode = $_POST['countryCode'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$profession = $_POST['profession'];
// File upload handling
$cvFileName = $_FILES['cv']['name'];
$cvTmpName = $_FILES['cv']['tmp_name'];
$pictureFileName = $_FILES['picture']['name'];
$pictureTmpName = $_FILES['picture']['tmp_name'];
// Move uploaded files to a directory
$uploadDir = 'uploads/';
$cvFilePath = $uploadDir . $cvFileName;
$pictureFilePath = $uploadDir . $pictureFileName;

// instantiate RegisterContr class
include "../classes/dbh.classes.php";
include "../classes/register.classes.php";
include "../classes/register-contr.classes.php";
$register = new RegisterContr($userName, $password, $confirmPassword, $firstName, $surname, $gender, $email, $countryCode, $phoneNumber, $address, $profession);

// run error handlers and register users

$register->registerUser();

// send mail

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.zeikdevelopment.buzz';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@zeikdevelopment.buzz';                     //SMTP username
    $mail->Password   = 'Rickross99$$';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('info@loftyhealthcare.com', 'Lofty HealthCare');
    $mail->addAddress($email);

    $mail->Subject = 'Registration Confirmation';
    $mail->Body = "Dear $firstName, thank you for registering.";

    $mail->send();
    //echo "Message sent successfully!";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// go back to login page

header("Location: ../login.php?error=none");

}

?>
