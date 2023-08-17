<?php
session_start();
include 'dbConfig.php';

// Retrieve the value sent from the client-side
$inputValue = $_POST['search_pro_txt'];

// Perform a database query based on the input value
$sql = "SELECT * FROM project WHERE project_name like '%$inputValue%'";
$result = $db->query($sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="dyn-row">
    <div class="dyn-row-id  ">'.$row['proj_id'].'</div>
    <div class="dyn-row-name">' . $row['project_name'] . '</div>
    <img src="../Resources/Icons/trash.svg" class="delete-icon" id="delete-icon">
    </div>';
  }
} else {
  echo "<div class=\"dyn-row\"> No data available </div>";
}

// Close the database connection
$db->close();
// header("location: cmsemployee.php");
?>
