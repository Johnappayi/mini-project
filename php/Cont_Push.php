<?php

// Include the database configuration file
include 'dbConfig.php';

if(isset($_POST['contact_submit']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    $request = "INSERT INTO `quote`(`firstName`, `email`, `number`, `lastName`, `message`) VALUES ('$firstName','$email','$number','$lastName','$message')";
    
    mysqli_query($db,$request);
    header('location:../html/index.html');
}else{
    echo 'something went wrong try again';
}


?>