<?php

require "database.php";

	//validation error
	$idError = null;
	//post values
	$id = $_POST['id'];
	//validate input
	$valid = true;
	if(empty($id)){
	$iderror = "ID error";
	$valid = false;
}
	
if($valid){
	
	$query = "SELECT * FROM `forum_users` WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
	$result = mysqli_query($conn, $query);
	$rows = array();

	if (mysqli_num_rows($result) > 0) {

		while($fetch = mysqli_fetch_assoc($result)) {
			$rows[] = $fetch;
		}
	} else {
		echo "0 results";
	}

	mysqli_close($conn);

	echo json_encode($rows, JSON_UNESCAPED_UNICODE);
}
?>