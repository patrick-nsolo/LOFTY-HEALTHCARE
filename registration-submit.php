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

//Insert formdata into DB
$sql = "INSERT INTO registrations (userName, password, confirmPassword, firstName, surname, email, countryCode, phoneNumber, address, profession )
        VALUES ($userName, $password, $confirmPassword, $firstName, $surname, $email, $countryCode, $phoneNumber, $address, $profession )";

if ($conn->query(sql) === true){
    //registration successful
    //email user
    $to = $email;
    $subject = "Registration Successful";
    $message = "thanks for registering with LHC,Your registration is successful. Your username is: $userName and password is: $password";

}


?>