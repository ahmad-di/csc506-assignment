<?php
session_start();
include 'connection.php';

if(isset($_POST['submit'])){

//create and error array
$error = array();


//check if name filed is empty and create an error
If(empty($_POST['name'])){
$error['name'] = "Please enter name";
}


//check if email filed is empty and create an error
If(empty($_POST['email'])){
$error['email'] = "Please enter email";
}


//check if address filed is empty and create an error
If(empty($_POST['address'])){
$error['address'] = "Please enter address";
}


//check if password filed is empty and create an error
If(empty($_POST['password'])){
$error['password'] = "Please enter password";
}


if(empty($error)){

  $hash= password_hash($_POST['password'],PASSWORD_BCRYPT);
  $hash_id = rand(0,999).time();

  $stmt = $conn->prepare("INSERT INTO user VALUES(NULL, :hash_id, :name, :email, :phone, :address, :hash, NOW(), NOW() )");

  $stmt->bindParam(":hash_id",$hash_id);
  $stmt->bindParam(":name",$_POST['name']);
  $stmt->bindParam(":email",$_POST['email']);
  $stmt->bindParam(":phone",$_POST['phone']);
  $stmt->bindParam(":address",$_POST['address']);
  $stmt->bindParam(":hash",$hash);
  $stmt->execute();

  $_SESSION['hash_id'] = $hash_id;

  header("Location:dashboard.php");
}



}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
  </head>
  <body>
    <p>Sign Up</p>

<form class="" action="" method="post">

      <p>Name</p>
      <input type="text" name="name" value="">
      <p>Email</p>
      <input type="text" name="email" value="">
      <p>Phone Number</p>
      <input type="text" name="phone" value="">
      <p>Address</p>
      <input type="text" name="address" value="">
      <p>Password</p>
      <input type="password" name="password" value="">
      <br>
      <input type="submit" name="submit" value="Sign Up">

</form>
  </body>
</html>
