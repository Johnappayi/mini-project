<?php
session_start();
// Include the database configuration file
include 'dbConfig.php';

$userId= $_SESSION['user_id'];
// Retrieve data from the database
$sql = "SELECT * FROM `timesheet` WHERE user_id = '$userId' ";
$result = mysqli_query($db, $sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $formattedTime1 = date("h:i A", strtotime($row['timein']));
        $formattedTime2 = date("h:i A", strtotime($row['timeout']));
        echo '
        <div class="dyn-row">
        <div class="dyn-row-id  ">' . $row['user_id'] . '</div>
        <div style="flex-basis:25%; text-transform: capitalize;">' . $row['lastname'] . ' ' . $row['firstname'] . '</div>
        <div style="color: var(--stroke);">' . $formattedTime1 . '</div>
        <div style="color: var(--stroke);">' . $formattedTime2 . '</div>
        <div style="padding-right:4%;">' . $row['total_working'] . '</div>
        <div style="padding-right:3%;">' . $row['extra_time'] . '</div>
        </div>';
    }
} else {
    echo "No data available.";
}
// Close the database connection
mysqli_close($db);