<?php
//Handle Logout
if(isset($_POST['logout_user'])){
    // Destroy the session
    session_destroy();
    // Redirect to login page
    header("location: ../html/index.html");
    exit();
  }
?>  