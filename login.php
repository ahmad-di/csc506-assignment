<?php
session_start();

	include("connection.php");
	include("functions.php");

	// $user_data = check_login($conn);

	if (isset($_SESSION['hash_id'])) {
	  header("Location:dashboard.php");
	}
 ?>

 <?php
 // session_start();
 // include 'connection.php';

 if(isset($_POST['register'])){

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


 //check if email filed is empty and create an error
 If(empty($_POST['phone'])){
 $error['phone'] = "Please enter phone";
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

	<?php

	 if(isset($_POST['login'])){

	 //create and error array
	 $error = array();


	 //check if email filed is empty and create an error
	 If(empty($_POST['email'])){
	 $error['email'] = "Please enter email";
	 }


	 //check if password filed is empty and create an error
	 If(empty($_POST['password'])){
	 $error['password'] = "Please enter password";
 }else{
 	$password=$_POST['password'];
 }



	 		if(empty($error)){
	 		$statement = $conn->prepare("SELECT * FROM user WHERE email=:user");
	 		$statement->bindParam(":user",$_POST['email']);
	 		$statement->execute();
	 		$row = $statement->fetch(PDO::FETCH_BOTH);


	       if($statement->rowCount() < 1 || !password_verify($password,$row['password']) ){
	         // header("Location:/login?error=Either Email or Password Incorrect");
	         $error['failure'] = "Either Email or Password is Incorrect";
	 		}else{
	 			$_SESSION["hash_id"] = $row["hash_id"];
	 			$_SESSION["email"] = $row["email"];
	 			header("Location:dashboard.php");
	 		}

	 	}
}

	 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Loging</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container" style="background-image: url(wll.png)">
		<div class="card">
			<div class="inner-box" id="card">
				<div class="card-front" style="background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6))">

				<h2>LOGIN</h2>
				<form method="post">
					<?php if (isset($error['failure'])): ?>
						<p style="color:red"><?=$error['failure']?></p>
						<?php
							unset($error['failure']);
							endif; ?>
					<?php if (isset($_SESSION['error'])): ?>
						<p style="color:red"><?=$_SESSION['error']?></p>
					<?php
						unset($_SESSION['error']);
						endif; ?>
					<input type="text" name="email" class="input-box" placeholder="EMAIL" required>
					<input type="password" name="password" class="input-box" placeholder="PASSWORD" required><br><br>
					<button type="submit" name="login" class="bton">Sign in</button>
					<input type="checkbox"><span>Remember Me</span>
				</form>
				<button type="button" class="btn" onclick="openRegister()">Sign up</button>
				<a href="">Forgot Password</a>
				</div>

				<div class="card-back" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6))">
					<h2>REGISTER</h2>
				<form method="post">
					<?php if (isset($error['name'])): ?>
						<p style="color:red"><?=$error['name']?></p>
					<?php endif; ?>
					<input type="text" name="name" class="input-box" placeholder="Name" required>
					<?php if (isset($error['email'])): ?>
						<p style="color:red"><?=$error['email']?></p>
					<?php endif; ?>
					<input type="email" name="email" class="input-box" placeholder="Email" required>
					<?php if (isset($error['phone'])): ?>
						<p style="color:red"><?=$error['pphone']?></p>
					<?php endif; ?>
					<input type="phone" name="phone" class="input-box" placeholder="Phone No" required>
					<?php if (isset($error['address'])): ?>
						<p style="color:red"><?=$error['address']?></p>
					<?php endif; ?>
					<input type="text" name="address" class="input-box" placeholder="Address" required>
					<?php if (isset($error['password'])): ?>
						<p style="color:red"><?=$error['password']?></p>
					<?php endif; ?>
					<input type="password" name="password" class="input-box" placeholder="Create Password" required>
					<input type="submit" name="register" class="login" value="Register">
				</form>
				<button type="button" class="btn" onclick="openLogin()">I've an account</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		var card = document.getElementById("card");

		function openRegister(){
			card.style.transform = "rotateY(-180deg)";
		}
		function openLogin(){
			card.style.transform = "rotateY(0deg)";
		}
	</script>
</body>
</html>
