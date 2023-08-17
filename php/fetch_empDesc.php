<?php
include 'dbConfig.php';


$userId = $_POST['emp_id'];

// Perform a database query based on the input value
$sql = "SELECT * FROM `employee_cms` WHERE user_id = '$userId' ";
$stmt = $db->prepare($sql);
$stmt->execute();
$outputDisplay = '';
// Fetch the result
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Output the employee details
    while ($row = $result->fetch_assoc()) {

        $outputDisplay .= '</div> 
        <div class="emp-desc-col">
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>First name</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["firstname"];
        $outputDisplay .= '</div>
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>Date of birth</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["dob"];
       
        $outputDisplay .= '</div>
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>Joining date</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["dob_join"];
        $outputDisplay .= '</div>
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>Address</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["street"] . ' ' . $row["line"] . ' ' . $row["city"] . ' ' . $row["state"] . 'PO.' . $row["zip"];
        $outputDisplay .= '</div>
        </div>
        <div class="emp-desc-col">
            <div class="emp-desc-col-head">
                <div class="emp-desc-col-head-ttl">
                    <h5>Last name</h5>
                    <h5>:</h5>
                </div>';
        $outputDisplay .= $row["lastname"];
        $outputDisplay .= '</div>
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>Age</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["age"];
        $outputDisplay .= '</div>
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>Designation</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["designation"];
        $outputDisplay .= '</div>
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>Salary</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["salary"];
        $outputDisplay .= '</div>
        <div class="emp-desc-col-head">
            <div class="emp-desc-col-head-ttl">
                <h5>Status</h5>
                <h5>:</h5>
            </div>';
        $outputDisplay .= $row["status"];
        $outputDisplay .= '</div>
        </div>';

        $_SESSION['emp_id'] = $userId;
        echo '<div class="empDP_frame">';
        include 'getPPuser.php';
        echo $outputDisplay;
    }
} else {
    echo "No employee found with the provided user ID.";
}
$db->close();

