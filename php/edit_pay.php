<?php
include 'dbConfig.php';

// Check if the employee ID is provided
if (isset($_POST['employeeId'])) {
    $empID = $_POST['employeeId'];
    $firstName = $_POST['firstNameE'];
    $lastName = $_POST['lastNameE'];
    $salaryE = $_POST['salaryE'];
    $overtime_hrE = $_POST['overtime_hrE'];
    $overtime_rtE = $_POST['overtime_rtE'];
    $food_allowE = $_POST['food_allowE'];
    $house_allowE = $_POST['house_allowE'];
    $tax_redE = $_POST['tax_redE'];
    $property_damE = $_POST['property_damE'];

    $updatePro = "UPDATE `payroll` SET `firstname`='$firstName',`lastname`='$lastName',`salary`='$salaryE',`overtime_hour`='$overtime_hrE',`overtime_rate`='$overtime_rtE',`house_allow`='$house_allowE',`food_allow`='$food_allowE ',`tax_reduction`='$tax_redE',`property_damage`='$property_damE' WHERE `user_id`='$empID'";
    mysqli_query($db, $updatePro);

    // Return a success response
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
} else {
    // No employee ID provided
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['error' => 'Employee ID is required']);
}