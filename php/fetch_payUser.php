<?php
session_start();
include 'dbConfig.php';

$userId = $_SESSION['user_id'];

// Perform a database query based on the input value
$sql = "SELECT * FROM `payroll` WHERE user_id = '$userId' ";
$stmt = $db->prepare($sql);
$stmt->execute();
$outputDisplay = '';
// Fetch the result
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Output the employee details
    while ($row = $result->fetch_assoc()) {
        $outputDisplay .= '
        <div class="paydesc-col2">
            <div class="paydesc-col-row">
                <h5>Net Pay : </h5>';
        $outputDisplay .= $row['net_amount'];
        $outputDisplay .= ' 
            </div>
            <div class="paydesc-col-row">
                <h5>Overtime : </h5>';
        $outputDisplay .= ($row['overtime_hour'] * $row['overtime_rate']);
        $outputDisplay .= ' 
            </div>
            <div class="paydesc-col-row2">
                <h5>Allowance</h5>
                <div class="paydesc-col-row" style="padding-left: 4%;">
                    <h5>1.House rent allowance : </h5>';
        $outputDisplay .= $row['house_allow'];
        $outputDisplay .= ' 
                </div>
                <div class="paydesc-col-row" style="padding-left: 4%;">
                    <h5>2. Food Allowance : </h5>';
        $outputDisplay .= $row['food_allow'];
        $outputDisplay .= ' 
                </div>
            </div>
            <div class="paydesc-col-row">
                <h5>Net Allowance:</h5>';
        $outputDisplay .= $row['net_allow'];
        $outputDisplay .= ' 
            </div>
        </div>
        <div class="paydesc-col2">
            <div class="paydesc-col-row">
                <h5>Basic Salary:</h5>';
        $outputDisplay .= $row['salary'];
        $outputDisplay .= ' 
            </div>
            <div class="paydesc-col-row">
                <h5>Bonus:</h5>';
        $outputDisplay .= $row['bonus'];
        $outputDisplay .= ' 
            </div>
            <div class="paydesc-col-row2">
                <h5>Deduction</h5>
                <div class="paydesc-col-row" style="padding-left: 4%;">
                    <h5>1. Tax reduction : </h5>';
        $outputDisplay .= $row['tax_reduction'];
        $outputDisplay .= ' 
                </div>
                <div class="paydesc-col-row" style="padding-left: 4%;">
                    <h5>2. Property damage : </h5>';
        $outputDisplay .= $row['property_damage'];
        $outputDisplay .= ' 
                </div>
            </div>
            <div class="paydesc-col-row">
                <h5>Net Reduction:</h5>';
        $outputDisplay .= $row['net_reduction'];
        $outputDisplay .= ' 
            </div>
        </div>';

        echo $outputDisplay;
    }
} else {
    echo "No employee found with the provided user ID.";
}
$db->close();
