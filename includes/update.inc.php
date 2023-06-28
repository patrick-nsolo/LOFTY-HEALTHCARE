<?php
session_start();
$userid = $_SESSION["userid"];

if (isset($_POST["submit"])) {
  // Retrieve form data
$userName = $_POST['user-name'];
$firstName = $_POST['first-name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$countryCode = $_POST['countryCode'];
$phoneNumber = $_POST['phoneNumber'];
$address = $_POST['address'];
$profession = $_POST['profession'];


include "../classes/dbh.classes.php";
include "../classes/update.classes.php";
include "../classes/update-contr.classes.php";

$update = new UpdateContr($userid, $userName, $firstName, $surname, $gender, $email, $countryCode, $phoneNumber, $address, $profession);

// run error handlers and update users

$update->updateUser();

header("Location: ../login.php?error=updatesuccessful");

// header("Location: ../profile.php?error=successful");


}
