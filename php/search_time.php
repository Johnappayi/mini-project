<?php
session_start();
include 'dbConfig.php';

// Retrieve the value sent from the client-side
$inputValue = $_POST['search_time_txt'];

// Perform a database query based on the input value
$sql = "SELECT * FROM timesheet WHERE (firstname like '%$inputValue%') ";
$result = $db->query($sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        echo '
        <div class="dyn-row">
        <div class="dyn-row-id  ">'.$row['user_id'].'</div>
        <div style="flex-basis:50%; text-transform: capitalize;">' . $row['firstname'] . '</div>
        <div style="color: var(--stroke);">' . $row['timein'] . '</div>
        <div style="color: var(--stroke);">' . $row['timeout'] . '</div>
        </div>';
    }
} else {
    echo "No data available.";
}
// Close the database connection
mysqli_close($db);