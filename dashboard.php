<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['hash_id'])) {
  header("Location:login.php");
  $_SESSION['error'] = "Login is required to acces the dashboard";
}
// var_dump($_SESSION);
extract($_SESSION);

$stmt = $conn->prepare("SELECT * FROM user WHERE hash_id = '$hash_id'");
$stmt->execute();

$userInfo = $stmt->fetch(PDO::FETCH_BOTH);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
  </head>
  <body>
    <p>Welcome <?=$userInfo['name']?> to dashboard</p>

    <p>Here are your infos below</p>

    <p>
      Email: <?=$userInfo['email']?> <br>
      Phone Number: <?=$userInfo['phone']?> <br>
      Address: <?=$userInfo['address']?><br>

    </p>

    <p> <a href="logout.php">Logout</a> </p>


  </body>
</html>
