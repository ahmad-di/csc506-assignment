<?php

// $dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

try{
$conn = new PDO('mysql:host=localhost;dbname='.$dbname,$dbuser,$dbpass);

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
echo $e->getMessage();

}
