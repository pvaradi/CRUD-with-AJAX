<?php

require "database.php";

if(!empty($_POST)){
	$id = $_POST['id'];
	
	$query = "DELETE FROM forum_users WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
	
	$result = mysqli_query($conn, $query);
    
    if($result)
    {
        echo "Data Deleted";
    }else{
        echo "Data Not Deleted";
    }
	
	mysqli_close($conn);
}

?>