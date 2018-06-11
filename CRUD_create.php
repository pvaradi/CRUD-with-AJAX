<?php

require "database.php";

$id = null;

if(!empty($_POST)){
	//validation error
	$nameError = null;
	$passwordError = null;
	$emailError = null;
	
	//post values
	$user_name = $_POST['user_name'];
	$user_password = $_POST['user_password'];
	$user_email = $_POST['user_email'];
	
	//validate input
	$valid = true;
	
	if(empty($user_name)){
		$nameError = "Please enter name";
		$valid = false;
	}
	if(empty($user_password)){
		$nameError = "Please enter password";
		$valid = false;
	}
	if(empty($user_email)){
		$nameError = "Please enter email";
		$valid = false;
	}
	
	if($valid){
		$query = "INSERT INTO forum_users (user_name, user_password, user_email) 
		VALUES ('".mysqli_real_escape_string($conn, $_POST['user_name'])."' , '".mysqli_real_escape_string($conn, $_POST['user_password'])."' , '".mysqli_real_escape_string($conn, $_POST['user_email'])."')";
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "Data Inserted";
		}
		else{
			echo "Data Not Inserted";
		}
		
		mysqli_close($conn);
	}
	
}

?>