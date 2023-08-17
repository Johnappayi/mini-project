<?php
// Include the database configuration file
include 'dbConfig.php';

// Retrieve data from the database
$sql = "SELECT * FROM `application` ";
$result = mysqli_query($db, $sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $app_id = $row['app_id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $occupation = $row['occupation'];
        
        echo '<div class="dyn-row">';
        echo '<div class="dyn-row-id hide-user-id">'.$row['app_id'].'</div>';
        echo '<div style="display: flex; flex-direction: column; gap: .25rem;">';
        echo '<div class="dyn-row-name">' . $firstname . ' ' . $lastname . '</div>';
        echo '<div style="color: var(--stroke);">' . $occupation . '</div>';
        echo '</div>';
        echo '<img src="../Resources/Icons/arrow-right.svg">';
        echo '</div>';
    }
} else {
    echo "No data available.";
}