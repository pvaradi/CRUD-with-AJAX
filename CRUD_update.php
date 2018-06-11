<?php

require "database.php";

$id = null;

if (null == $_POST['id']) {
    header("Location: index.php");
}

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
		$query = "UPDATE forum_users SET
		user_name = '".mysqli_real_escape_string($conn, $_POST['user_name'])."',
		user_password = '".mysqli_real_escape_string($conn, $_POST['user_password'])."', 
		user_email = '".mysqli_real_escape_string($conn, $_POST['user_email'])."'
		WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
		
		$result = mysqli_query($conn, $query);
		
		if($result){
			echo "Data Updated";
		}
		else{
			echo "Data Not Updated";
		}
		
		mysqli_close($conn);
	}
	
}

?>