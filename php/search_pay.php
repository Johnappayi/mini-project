<?php
session_start();
include 'dbConfig.php';

// Retrieve the value sent from the client-side
$inputValue = $_POST['search_pay_txt'];

// Perform a database query based on the input value
$sql = "SELECT * FROM `payroll` WHERE (firstname like '%$inputValue%' || lastname like '%$inputValue%')";
$result = $db->query($sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
        // $_SESSION['enq_id'] = $row['enq_id'];
        echo '
        <div class="dyn-row">
        <div class="dyn-row-id  ">'.$row['user_id'].'</div>
        <div style="flex-basis:50%; text-transform: capitalize;">' . $row['firstname'] .' '.$row['lastname']. '</div>
        <div >' . $row['salary'] . '</div>
        <div style="color: var(--stroke);">' . $row['net_amount'] . '</div>
        </div>';
    }
} else {
    echo "No data available.";
}
// Close the database connection
$db->close();