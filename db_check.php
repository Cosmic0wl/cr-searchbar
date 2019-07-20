
<?php

// Require conn.php (DB connection) file
require_once("actions/db_connect.php");

// This query will check do we have car_id in the table car
// for the provided $id
$sql = "SELECT * FROM media WHERE media_id=$id";

// Perform a query on the DB
$result = mysqli_query($connect, $sql);

// Fetch the query into $row
$row = mysqli_fetch_assoc($result); 
    
    // Store values into the variables
    $title=$row['title']; 
    $availability=$row['availability'];

// Close the DB connection
mysqli_close($connect);

?>