<?php

    //1. Collect Form Data
    $id = $_GET["id"];
	
	//3. DB Connection
	include_once('../includes/db.php');
	
	//4. Create the SQL Statement
	$sql  = "DELETE FROM brand WHERE id='$id' ";
	
	 //5. Excecute Statement
	if(mysqli_query($con, $sql)){
		header("Location: ../message.php?msg=Brand Delete Successfull!");
	}else{
		echo "Error: ".mysqli_error($con);
	}
	
?>