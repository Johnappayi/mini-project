<?php
// Include the database configuration file
include 'dbConfig.php';

$appId = $_POST['applicantID'];

// Retrieve data from the database
$sql = "SELECT * FROM `application` WHERE app_id = '$appId'";
$result = mysqli_query($db, $sql);

$outDisp='';

// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $outDisp .= '<div class="rec-con-row">
            <div class="rec-text">
                <h3>Applicant Name</h3>
                <div class="rec-text-inner">
                    <h4>' . $row['firstname'] . ' ' . $row['lastname'] . '</h4>
                </div>
            </div>
            <div class="rec-text">
                <h3>Post Applied</h3>
                <div class="rec-text-inner">
                    <h4>' . $row['occupation'] . '</h4>
                </div>
            </div>
        </div>
        <div class="rec-con-row">
            <div class="rec-text">
                <h3>Experience</h3>
                <div class="rec-text-inner">
                    <h4>' . $row['experience'] . '</h4>
                </div>
            </div>
            <div class="rec-text">
                <h3>E-mail</h3>
                <div class="rec-text-inner">
                    <h4>' . $row['email'] . '</h4>
                </div>
            </div>
        </div>
        <div class="rec-con-row">
            <div class="rec-text">
                <h3>Phone No.</h3>
                <div class="rec-text-inner">
                    <h4>' . $row['number'] . '</h4>
                </div>
            </div>
            <div class="rec-text">
                <h3>Address</h3>
                <div class="rec-text-inner">
                    <h4>' . $row['addrress'] . '</h4>
                </div>
            </div>
        </div>';
        echo $outDisp;
    }
    
} else {
    echo "No data available.";
}

mysqli_close($db);
