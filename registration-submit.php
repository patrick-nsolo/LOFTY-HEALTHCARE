<?php 
//establish DB connection
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "registrationDB";

$conn = new mysqli($servername,$username,$password,$dbname);

//Check connection
if ($conn->connection_error){
    die("Connection failed: " , $conn->connect_error);
}

//Retrieve form data
$userName = $_POST['user-name'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$firstName = $_POST['first-name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$countryCode = $_POST['country-code'];
$phoneNumber = $_POST['phone-number'];
$address = $_POST['address'];
$profession = $_POST['profession'];


?>