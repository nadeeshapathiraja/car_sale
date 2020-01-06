<?php

	$_BASE_URL = "../";

	if(!isset($_SESSION)){
        session_start();
    }
	//1. Collect Form Data
	$model_id = $_POST["model_id"];
	$title = $_POST["title"];
	$description = $_POST["description"];
	$price = $_POST["price"];
	$fuel_type = $_POST["fuel_type"];
	$milage = $_POST["milage"];
	$year = $_POST["year"];
	
	//2. Process Data (a. Fillable validation) 
	$errors = "";
	if(strlen($title)<10){
		$errors .= "Title should have 10 characters.";
	}
	
	if($errors){
		header("Location: add.php?error=".$errors);
		die();
	}
	//2. Process Data (b. Non Fillable Genrate)
	$date = date('Y-m-d');
	$member_id = $_SESSION["ID"]; 	//this would change After Login Implementation
	$view_count = 0;
	$sold = 0;
	$photo = "images/default.png";

	$destFile= "uploads/".basename($_FILES["photo"]["name"]);
	$sourceFile=$_FILES["photo"]["tmp_name"];

	if(move_uploaded_file($sourceFile, $_BASE_URL.$destFile)){
		$photo=$destFile;
	}else{
		header("Location: add.php?error=Error File Uplording".$_FILES['photo']['error']);
		die();
	}
	
	
	//3. DB Connection
	include_once('../includes/db.php');
	
	//4. Create the SQL Statement
	$sql  = "INSERT INTO car ".
	" (model_id, title,  description, price, fuel_type, milage, ".
	" year, date, member_id, view_count, sold, photo )  VALUES  ".
	"('$model_id','$title','$description','$price','$fuel_type','$milage',".
	"'$year','$date','$member_id','$view_count','$sold','$photo')";
	
	//5. Excecute Statement
	if(mysqli_query($con, $sql)){ 
		header("Location: ../message.php?msg=Car Add Successfull!");
	}else{
		echo "Error: ".mysqli_error($con);
	}
	
?>