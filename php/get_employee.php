<?php
include 'dbConfig.php';

if (isset($_GET['id2'])) {
    $employeeId = $_GET['id2'];
    $query = "SELECT * FROM `employee_cms` WHERE user_id = '$employeeId'";
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the employee data from the result set
        $row = mysqli_fetch_assoc($result);

        $employeeData = array(
            'user_id' => $row['user_id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'street' => $row['street'],
            'line' => $row['line'],
            'city' => $row['city'],
            'state' => $row['state'],
            'zip' => $row['zip'],
            'dob' => $row['dob'],
            'email' => $row['email'],
            'number' => $row['number'],
            'dob_join' => $row['dob_join'],
            'designation' => $row['designation'],
        );
            
        // Return the employee data as JSON response
        header('Content-Type: application/json');
        echo json_encode($employeeData);
    } else {
        // No employee found with the provided ID
        header("HTTP/1.1 404 Not Found");
        echo json_encode(['error' => 'Employee not found']);
    }
} else {
    // No employee ID provided
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['error' => 'Employee ID is required']);
}
?>    