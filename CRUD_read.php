<?php

require "database.php";

$query = "SELECT * FROM  forum_users ORDER BY id DESC";
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




//JSON encode

echo json_encode($rows, JSON_UNESCAPED_UNICODE);

?>