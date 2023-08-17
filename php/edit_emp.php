<?php
include 'dbConfig.php';

// Check if the employee ID is provided
if (isset($_POST['employeeId'])) {
    $employeeId = $_POST['employeeId'];

    // Update the employee data in the database for the selected fields only
    // Adjust the code based on your database update logic


    if (isset($_POST['firstNameE'])) {
        $firstName = $_POST['firstNameE'];
        $updateFNameQuery = "UPDATE employee_cms SET firstname = '$firstName' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updateFNameQuery);
    }
    if (isset($_POST['lastNameE'])) {
        $lastName = $_POST['lastNameE'];
        $updateLNameQuery = "UPDATE employee_cms SET lastname = '$lastName' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updateLNameQuery);
    }

    if (isset($_POST['streetE'])) {
        $street = $_POST['streetE'];
        $updatestreetQuery = "UPDATE employee_cms SET street = '$street' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatestreetQuery);
    }


    if (isset($_POST['lineE'])) {
        $line = $_POST['lineE'];
        $updateLineQuery = "UPDATE employee_cms SET line = '$line' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updateLineQuery);
    }

    if (isset($_POST['cityE'])) {
        $city = $_POST['cityE'];
        $updatecityQuery = "UPDATE employee_cms SET city = '$city' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatecityQuery);
    }

    if (isset($_POST['stateE'])) {
        $state = $_POST['stateE'];
        $updatestateQuery = "UPDATE employee_cms SET state = '$state' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatestateQuery);
    }

    if (isset($_POST['zipE'])) {
        $zip = $_POST['zipE'];
        $updatezipQuery = "UPDATE employee_cms SET zip = '$zip' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatezipQuery);
    }

    if (isset($_POST['dobE'])) {
        $dob = $_POST['dobE'];
        $updatedobQuery = "UPDATE employee_cms SET dob = '$dob' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatedobQuery);
    }

    if (isset($_POST['emailE'])) {
        $email = $_POST['emailE'];
        $updateemailQuery = "UPDATE employee_cms SET email = '$email' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updateemailQuery);
    }

    if (isset($_POST['numberE'])) {
        $number = $_POST['numberE'];
        $updatenumberQuery = "UPDATE employee_cms SET number = '$number' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatenumberQuery);
    }

    if (isset($_POST['doeE'])) {
        $doe = $_POST['doeE'];
        $updatedoeQuery = "UPDATE employee_cms SET dob_join = '$doe' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatedoeQuery);
    }

    if (isset($_POST['designationE'])) {
        $designation = $_POST['designationE'];
        $updatedesignationQuery = "UPDATE employee_cms SET designation = '$designation' WHERE user_id = '$employeeId'";
        mysqli_query($db, $updatedesignationQuery);
    }

    // Return a success response
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
}else {
    // No employee ID provided
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['error' => 'Employee ID is required']);
}
