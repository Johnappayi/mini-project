<?php
include 'dbConfig.php';

$projId = $_POST['pro_id'];

// Delete the employee from the database using the user ID
$sql3 = "DELETE FROM `project` WHERE proj_id = '$projId'";

if (mysqli_query($db, $sql3)) {
    echo 'true'; // Success response code
  } else {
    echo 'false'; // Error response code
  }

// Close the database connection
mysqli_close($db);
