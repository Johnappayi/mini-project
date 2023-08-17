<?php
// Include the database configuration file
include 'dbConfig.php';

if (isset($_POST['newemp_submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $street = $_POST['street'];
    $line = $_POST['line'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $doe = $_POST['doe'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $empid = $_POST['empid'];

    $request = "INSERT INTO `employee_cms`(`user_id`,`firstname`, `lastname`, `street`, `line`, `city`, `state`, `zip`, `dob`, `email`, `number`, `dob_join`, `designation`,`salary`) VALUES ('$empid','$firstName','$lastName ','$street','$line','$city','$state','$zip','$dob','$email','$number','$doe','$designation','$salary') ";
    mysqli_query($db, $request);
    header('location:cmsemployee.php');
}
?>
