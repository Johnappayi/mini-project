<?php
// Include the database configuration file
include 'dbConfig.php';

// Retrieve data from the database
$sql = "SELECT * FROM `announcement` ORDER BY recv_time DESC";
$result = mysqli_query($db, $sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="dyn-row">
                    <div class="dyn-row-id  ">' . $row['a_id'] . '</div>
                    <div >' . $row['message'] . '</div>
                  </div>';
    }
} else {
    echo "No data available.";
}
// Close the database connection
mysqli_close($db);
