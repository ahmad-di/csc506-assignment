<?php

session_start();

session_destroy();


session_unset($_SESSION["username"]);

session_unset($_SESSION["email"]);


header("Location:login.php")


?>
