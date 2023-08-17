<?php
include 'dbConfig.php';

if (isset($_GET['id2'])) {
    $projID = $_GET['id2'];
    $query = "SELECT * FROM `project` WHERE proj_id = '$projID'";
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the employee data from the result set
        $row = mysqli_fetch_assoc($result);

        $projectData = array(
            'proj_id' => $row['proj_id'],
            'project_name' => $row['project_name'],
            'location' => $row['location'],
            'manager' => $row['manager'],
            'due_date' => $row['due date'],
            'expense' => $row['expense'],
            'status' => $row['status'],
           
        );
            
        // Return the employee data as JSON response
        header('Content-Type: application/json');
        echo json_encode($projectData);
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