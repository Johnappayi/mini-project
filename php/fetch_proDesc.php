<?php
include 'dbConfig.php';


$proID = $_POST['pro_id'];

// Perform a database query based on the input value
$sql = "SELECT * FROM `project` WHERE proj_id = '$proID' ";
$stmt = $db->prepare($sql);
$stmt->execute();
$outputDisplay = '';
// Fetch the result
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Output the employee details
    while ($row = $result->fetch_assoc()) {

    $outputDisplay .= '<div class="pro-desc-col">
    <div class="pro-desc-col-head">
        <div class="pro-desc-col-head-ttl">
            <h5>Project name</h5>
            <h5>:</h5>
        </div>';
    $outputDisplay .= $row["project_name"];
    $outputDisplay .= '</div>
    <div class="pro-desc-col-head">
        <div class="pro-desc-col-head-ttl">
            <h5>Manager</h5>
            <h5>:</h5>
        </div>';
    $outputDisplay .= $row["manager"]; 
    $outputDisplay .= '</div>
    <div class="pro-desc-col-head">
        <div class="pro-desc-col-head-ttl">
            <h5>Status</h5>
            <h5>:</h5>
        </div>';
    $outputDisplay .= $row["status"];
    $outputDisplay .=  '</div>
    </div>
    <div class="pro-desc-col">
    <div class="pro-desc-col-head">
        <div class="pro-desc-col-head-ttl">
            <h5>Location</h5>
            <h5>:</h5>
        </div>';
    $outputDisplay .= $row["location"];
    $outputDisplay .= '</div>
    <div class="pro-desc-col-head">
        <div class="pro-desc-col-head-ttl">
            <h5>Expense</h5>
            <h5>:</h5>
        </div>';
    $outputDisplay .= $row["expense"];
    $outputDisplay .=  '</div>
    <div class="pro-desc-col-head">
        <div class="pro-desc-col-head-ttl">
            <h5>Due Date</h5>
            <h5>:</h5>
        </div>';
    $outputDisplay .= $row["due date"];
    $outputDisplay .=  '</div>
    </div>';

    echo $outputDisplay;


    }
} else {
    echo "No employee found with the provided user ID.";
}
$db->close();
