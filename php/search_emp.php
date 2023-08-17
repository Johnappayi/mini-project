<?php
session_start();
include 'dbConfig.php';

// Retrieve the value sent from the client-side
$inputValue = $_POST['search_emp_txt'];

// Perform a database query based on the input value
$sql = "SELECT * FROM employee_cms WHERE (firstname like '%$inputValue%' || lastname like '%$inputValue%')";
$result = $db->query($sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['emp_id'] = $row['user_id'];
    echo '<div class="dyn-row">
    <div class="smallDP_frame">';
    include 'getPPuser.php';
    echo '
    </div>
    <div class="dyn-row-id  ">'.$row['user_id'].'</div>
    <div class="dyn-row-name">' . $row['firstname'] . ' ' . $row['lastname'] . '</div>
    <img src="../Resources/Icons/trash.svg" class="delete-icon" id="delete-icon">
    </div>';
  }
} else {
  echo "No data available.";
}

// Close the database connection
$db->close();

