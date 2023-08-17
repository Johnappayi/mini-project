<?php
include 'dbConfig.php';

// Check if the employee ID is provided
if (isset($_POST['projectId'])) {
    $projectId = $_POST['projectId'];
    $project_nameE = $_POST['project_nameE'];
    $pro_locE = $_POST['pro_locE'];
    $pro_manE = $_POST['pro_manE'];
    $due_dateE = $_POST['due_dateE'];
    $expenseE = $_POST['expenseE'];
    $pro_statE = $_POST['pro_statE'];

    $updatePro = "UPDATE `project` SET `project_name`='$project_nameE',`location`='$pro_locE',`manager`='$pro_manE',`due date`='$due_dateE',`expense`='$expenseE',`status`=' $pro_statE' WHERE proj_id = '$projectId'";
    mysqli_query($db, $updatePro);

    // Return a success response
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
} else {
    // No employee ID provided
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['error' => 'Employee ID is required']);
}
