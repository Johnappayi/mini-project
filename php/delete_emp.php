<?php
include 'dbConfig.php';

$userId = $_POST['emp_id'];

// Delete the employee from the database using the user ID
$sql = "DELETE FROM `employee_cms` WHERE user_id = '$userId'";

if (mysqli_query($db, $sql)) {
    echo 'true'; // Success response code
  } else {
    echo 'false'; // Error response code
  }

// Close the database connection
mysqli_close($db);
?>