<?php 
//establish DB connection
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "registrationDB";

$conn = new mysqli($servername,$username,$password,$dbname);

//Check connection
if (!$conn){
    die("Connection failed: " .mysqli_connect_error);
}

//Retrieve form data
$userName = $_POST['user-name'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$firstName = $_POST['first-name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$countryCode = $_POST['country-code'];
$phoneNumber = $_POST['phone-number'];
$address = $_POST['address'];
$profession = $_POST['profession'];


if (mysqli_query($conn, $sql)){
    //registration successful
    //email user
    $to = $email;
    $subject = "Registration Successful";
    $message = "Thanks for registering with LHC,Your registration is successful. Your username is: $userName and password is: $password";
    $headers = "From: patricknsolo@gmail.com";

    mail($to, $subject, $message, $headers);

    // Redirect the user to a success page
    echo "Thanks for registering with LHC,Your registration is successful. Your username is: $userName and password is: $password""

} else {
    //Registration failed
    echo "Error: " . $sql . "<br>" . 
}
$conn->close();

?>