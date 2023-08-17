<?php
// Include the database configuration file
include 'dbConfig.php';

if(isset($_POST['newproj_submit']))
{
    $proj_name = $_POST['proj_name'];
    $proj_loc = $_POST['proj_loc'];
    $Proj_man = $_POST['Proj_man'];
    $doc = $_POST['doc'];
    $proj_cost = $_POST['proj_cost'];
    $Proj_status = $_POST['Proj_status'];

    $request ="INSERT INTO `project`(`project_name`, `location`, `manager`, `due date`, `expense`, `status`) 
    VALUES ('$proj_name','$proj_loc','$Proj_man','$doc','$proj_cost','$Proj_status')";

    mysqli_query($db,$request);
    header('location:cmsproject.php');
}else{
    echo 'something went wrong try again';
}


?>