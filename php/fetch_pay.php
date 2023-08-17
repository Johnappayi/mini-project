<?php
// Include the database configuration file
include 'dbConfig.php';

// Retrieve data from the database
$sql = "SELECT * FROM `payroll`";
$result = mysqli_query($db, $sql);

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
mysqli_close($db);