<?php
include 'dbconfig.php';

if (isset($_POST["announce_msg"])) {
  $message = $_POST["announce_msg"];

  // Process the message or store it in a database, etc.
  $insert ="INSERT INTO `announcement`(`message`) VALUES ('$message')" ;
    mysqli_query($db,$insert);
  
  // Send a response back to the client
  echo "Message Added";
}
