<?php
// Include the database configuration file
include 'dbConfig.php';

// Retrieve data from the database
$sql = "SELECT * FROM `quote`";
$result = mysqli_query($db, $sql);

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dbDatetime = $row['recv']; 
        // Convert the datetime to 12-hour format
        $formattedTime = date("h:i A", strtotime($dbDatetime));
        echo '
        <div class="dyn-row" style="padding-top:4%;">
        <div class="dyn-row-id  ">' . $row['enq_id'] . '</div>
        <div class="dyn-row-name">' . $row['firstName'] . ' ' . $row['lastName'] . '</div>
        <div style="color: var(--stroke); font-size: 12px;">' . $formattedTime . '</div>
        </div>';
    }
} else {
    echo "No data available.";
}

// $sql2 = "SELECT * FROM quote WHERE isRead = '1";
// $result2 = mysqli_query($db, $sql2);

// // Display the data in the div
// if (mysqli_num_rows($result2) > 0) {
//     while ($row = mysqli_fetch_assoc($result2)) {
//         $_SESSION['enq_id'] = $row['enq_id'];
//         echo '
//         <div class="dyn-row">
//         <div class="dyn-row-id  ">'.$row['enq_id'].'</div>
//         <div class="dyn-row-name">' . $row['firstname'] . ' ' . $row['lastname'] . '</div>
//         <div style="color: var(--stroke);">'.$row['recv'].'
//         </div>';
//     }
// } else {
//     echo "No data available.";
// }





// Close the database connection
mysqli_close($db);
