<?php
// Include the database configuration file
include 'dbConfig.php';

// Query to retrieve the notification count
$query = "SELECT COUNT(*) AS notification_count FROM employee_notification WHERE isRead = 0";

// Execute the query
$result = $db->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    
    // Get the notification count from the row
    $notificationCount = $row['notification_count'];
    
    // Return the count 
    if($notificationCount) 
    {
        echo $notificationCount;
    }
} else {
    // Handle query error
    echo 'Error retrieving notification count: ' . $db->error;
}

// Close the database connection
$db->close();
