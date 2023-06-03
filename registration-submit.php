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
$userName = $_POST['user-name']

?>