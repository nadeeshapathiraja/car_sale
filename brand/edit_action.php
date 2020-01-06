<?php

    //1. Collect Form Data
    $id = $_POST["id"];
	$name = $_POST["name"];
	
	//2. Process Data (a. Fillable validation) 
	$errors = "";
	if(strlen($name)<2){
		$errors .= "Brand Name should have 2 characters.";
	}
	
	if($errors){
		header("Location: add.php?error=".$errors);
		die();
	}
	//2. Process Data (b. Non Fillable Genrate)
	
	//3. DB Connection
	include_once('../includes/db.php');
	
	//4. Create the SQL Statement
	$sql  = "UPDATE  brand SET name='$name' WHERE id='$id'";
	
	 //5. Excecute Statement
	if(mysqli_query($con, $sql)){
		header("Location: ../message.php?msg=Brand Update Successfull!");
	}else{
		echo "Error: ".mysqli_error($con);
	}
	
?>