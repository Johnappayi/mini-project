<?php
// Include the database configuration file
include 'dbConfig.php';

$enqId = $_POST['enq_id'];


// Retrieve data from the database
$sql4 = "SELECT * FROM `quote` WHERE enq_id = '$enqId'";
$result = mysqli_query($db, $sql4);
$outDisp = '';
// Display the data in the div
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  
        $outDisp .= '<div class="enq-text">
        <h3>Contact Name</h3>
        <div class="enq-text-inner">
          <h4>';
        $outDisp .= $row['firstName'] . ' ' . $row['lastName'];
        $outDisp .= '</h4>
          </div>
        </div>
        <div class="enq-text">
          <h3>E-mail</h3>
          <div class="enq-text-inner">
            <h4>';
        $outDisp .= $row['email'];
        $outDisp .= '</h4>
            </div>
          </div>
          <div class="enq-text">
            <h3>Phone No.</h3>
            <div class="enq-text-inner">
              <h4>';
        $outDisp .= $row['number'];
        $outDisp .= '</h4>
              </div>
            </div>
            <div class="enq-text">
              <h3>Message</h3>
              <div class="enq-text-inner">
                <h4>';
        $outDisp .= $row['message'];
        $outDisp .= '</h4>
                </div>
              </div>';
        echo $outDisp;
    }
} else {
    echo "No data available.";
}
mysqli_close($db);
