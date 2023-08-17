<?php
session_start();

// initializing variables
$_SESSION ["user_id"]="";
$user_id = "";
$email    = "";
$errors = array();  

// Include the database configuration file
include 'dbConfig.php';

// LOGIN USER
if (isset($_POST['login_user'])) {
  $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($user_id)) {
  	array_push($errors, "Employee-ID is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM user WHERE user_id='$user_id' AND password='$password'";
  	$result = mysqli_query($db, $query);

  	if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);

      // $_SESSION['user_id'] = (int)$row['user_id'];
      $_SESSION['user_id'] = $user_id;

      $query2 = "SELECT * FROM employee_cms WHERE user_id='$user_id' ";
      $result2 = mysqli_query($db, $query2);
      $row2 = mysqli_fetch_array($result2);
      
      if($row['user_type'] == 'Admin'){
       
        $_SESSION['firstName'] = $row2['firstname'];
        $_SESSION['lastName'] = $row2['lastname'];
        $_SESSION['designation'] = $row2['designation'];
        header('location: cmsadmin.php');
      }
      else{
        $_SESSION['firstName'] = $row2['firstname'];
        $_SESSION['lastName'] = $row2['lastname'];
        $_SESSION['designation'] = $row2['designation'];
        header('location: cmsemp.php');
      }
         
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>