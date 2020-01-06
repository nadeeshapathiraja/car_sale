<?php

	$_BASE_URL="";
	//1. Collect Form Data
	$name = $_POST["name"];
	$mobile = $_POST["mobile"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	//2. Process Data (a. Fillable validation)
	$errors = "";
	if(!$name){
		$errors .= "Name must be entered.<br/>";
	}
	
	if(!$mobile){
		$errors .= "Mobile Number must be entered.<br/>";
	}
	
	if(strlen($password)<4){
		$errors .= "Password must have at least 4 characters.<br/>";
	}
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors .= "Email must be valid.";
	}
	
	if($errors){
		header("Location: register.php?error=".$errors);
		die();
	}
	
	
	//2. Process Data (b. Generate Non Fillables)
	$join_date = date('Y-m-d');
	$role = 'u';
	$active = 1;
	$photo = "images/profile.png";

	$destFile= "uploads/".basename($_FILES["photo"]["name"]);
	$sourceFile=$_FILES["photo"]["tmp_name"];

	if(move_uploaded_file($sourceFile, $_BASE_URL.$destFile)){
		$photo=$destFile;
	}else{
		header("Location: add.php?error=Error File Uplording".$_FILES['photo']['error']);
		die();
	}
	
	
	//3. DB Connection
	include_once('includes/db.php');
	
	//4. Create the SQL Statement
	$sql  = "INSERT INTO member ".
	"(name, mobile, email, password, join_date, role, active, photo)".
	" VALUES ".
	"('$name','$mobile','$email','$password','$join_date','$role','$active','$photo')";
	

	//Email
	// the message
	$msg = "Thank You for register Our WebSite";

	// use wordwrap() if lines are longer than 70 characters
	$msg = wordwrap($msg,70);

	// send email
	mail("$email","Welcome To Car Sale",$msg);


	//Msg
	$user = "94766222181";
	$password = "7555";
	$text = urlencode("Thank You For Register Our Car Sale");
	$to = "94".$mobile;
	 
	$baseurl ="http://www.textit.biz/sendmsg";
	$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
	$ret = file($url);
	 
	$res= explode(":",$ret[0]);
	 
	if (trim($res[0])=="OK")
	{
	echo "Message Sent - ID : ".$res[1];
	}
	else
	{
	echo "Sent Failed - Error : ".$res[1];
	}
	//5. Excecute Statement
	if(mysqli_query($con, $sql)){
		header("Location:login.php?msg=Registration Successfull!");
	}else{
		echo "Error: ".mysqli_error($con);
	}
	
	
	
?>