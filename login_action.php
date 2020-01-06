<?php

if(!isset($_SESSION)){
	session_start();
}

	$email=$_POST['email'];
	$password=$_POST['password'];
	
//2process Data
	$errors = "";

	if(strlen($password)<4){
		$errors .= "Password must have at least 4 characters.<br/>";
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors .= "Email must be valid.";
	}
	
	if($errors){
		header("Location: login.php?error=".$errors);
		die();
	}

	//db connection
	include_once("includes/db.php");

	//create sql satatements
	$sql="SELECT * FROM member WHERE email='$email' AND password='$password'";

	$result=mysqli_query($con,$sql);

	if($row=mysqli_fetch_array($result)){

		$_SESSION["NAME"]=$row["name"];
		$_SESSION["ID"]=$row["id"];
		$_SESSION["ROLE"]=$row["role"];
		$_SESSION["EMAIL"]=$row["email"];
		$_SESSION["PHOTO"]=$row["photo"];

		header("Location: index.php");
	}else{
		header("Location: login.php?error= Invalid Email or Password");
	}

	?>