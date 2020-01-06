<?php

	//1. Collect Form Data
	$name = $_POST["name"];
	$brand_id = $_POST["brand_id"];
	
	//2. Process Data (a. Fillable validation) 
	$errors = "";
	if(strlen($name)<2){
		$errors .= "Model Name should have 2 characters.";
	}
	
	if($errors){
		header("Location: add.php?error=".$errors);
		die();
	}
	//2. Process Data (b. Non Fillable Genrate)
	
	//3. DB Connection
	include_once('../includes/db.php');
	
	//4. Create the SQL Statement
	$sql  = "INSERT INTO model  (name, brand_id)  VALUES ('$name','$brand_id')";
	
	//5. Excecute Statement
	if(mysqli_query($con, $sql)){
		header("Location: ../message.php?msg=Model Add Successfull!");
	}else{
		echo "Error: ".mysqli_error($con);
	}
	
?>