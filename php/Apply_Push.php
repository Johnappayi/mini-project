<?php
// Include the database configuration file
include 'dbConfig.php';

if(isset($_POST['apply_submit']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $occupation = $_POST['occupation'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];

    $request ="INSERT INTO `application`(`firstname`, `lastname`, `occupation`, `experience`, `email`, `addrress`, `number`, `dob`) VALUES ('$firstName','$lastName','$occupation','$experience','$email','$address','$number','$dob')" ;

    mysqli_query($db,$request);
    header('location: ../html/index.html');

}else{
    echo 'something went wrong try again';
}

?>