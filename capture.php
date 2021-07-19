<!DOCTYPE html>
<html>
<head>
	<title>capture</title>
</head>
<body>
<?php
include "connection.php";


if (isset($_POST['submit'])){

$myname = $_POST ['myname'];
$surname = $_POST ['surname'];
$gender = $_POST['gender'];
$address = $_POST ['address'];
$phone= $_POST ['phone-no'];
$username= $_POST['username'];
$password = $_POST['password'];
$email= $_POST['email'];



$query = mysqli_query($connected, "INSERT INTO users (firstname, surname, gender, email, address, phone, username, password) VALUES ('$myname', '$surname', '$gender', '$email', '$address', '$phone', '$username', '$password' )");


	
 echo "You are successfully registered";
}
 
 ?>
</body>
</html>>