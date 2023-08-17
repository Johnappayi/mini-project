<?php
// Include the database configuration file
include 'dbConfig.php';

// Retrieve data from the database
$sql = "SELECT * FROM employee_notification WHERE isRead=0";
$result = mysqli_query($db, $sql);
$query = "UPDATE employee_notification SET isRead = 1 WHERE isRead=0 ";
$result2 = mysqli_query($db, $query);
// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="dyn-row">
                    <div class="dyn-row-id  ">' . $row['notifi_id'] . '</div>
                    <div >' . $row['message'] . '</div>
                  </div>';
    }
} else {
    echo "No new notifications.";
}
// Close the database connection
mysqli_close($db);
