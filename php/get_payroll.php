<?php
include 'dbConfig.php';

if (isset($_GET['id2'])) {
    $empID = $_GET['id2'];
    $query = "SELECT * FROM `payroll` WHERE user_id = '$empID'";
    $result = mysqli_query($db, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the employee data from the result set
        $row = mysqli_fetch_assoc($result);

        $payrollData = array(
            'user_id' => $row['user_id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'salary' => $row['salary'],
            'overtime_hour' => $row['overtime_hour'],
            'overtime_rate' => $row['overtime_rate'],
            'food_allow' => $row['food_allow'],
            'house_allow' => $row['house_allow'],
            'tax_reduction' => $row['tax_reduction'],
            'property_damage' => $row['property_damage'],           
        );
            
        // Return the employee data as JSON response
        header('Content-Type: application/json');
        echo json_encode($payrollData);
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