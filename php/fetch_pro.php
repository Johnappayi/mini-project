<?php
// Include the database configuration file
include 'dbConfig.php';


// Retrieve data from the database
$sql = "SELECT * FROM project";
$result = mysqli_query($db, $sql);

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
    echo "No data available.";
}
// Close the database connection
mysqli_close($db);
