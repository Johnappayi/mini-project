<?php
  // Include the database configuration file
  include 'dbConfig.php';
  // Prepare and execute the query to retrieve the profile picture data

  $empid = $_SESSION['emp_id'];
  $query = "SELECT * FROM images WHERE user_id = '$empid'";
  $executedRes = mysqli_query($db, $query);
  $exeRow = mysqli_fetch_array($executedRes);
  if (mysqli_num_rows($executedRes) == 0){
?><img src="../Resources/Assets/profile-pic.png" alt="display picture" />
<?php 
  }elseif($exeRow["status"]){
  $imageURL = './uploads/'.$exeRow["file_name"] ;
?>
  <img src="<?php echo $imageURL; ?>" alt="" style="border-radius: 50%;"/>
<?php }else{?>
  <img src="../Resources/Assets/profile-pic.png" alt="display picture" />
<?php
}
?>
 