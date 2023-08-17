<?php
  // Include the database configuration file
  include 'dbConfig.php';
  // Prepare and execute the query to retrieve the profile picture data
  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM images WHERE user_id = '$user_id'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) == 0){
?><img src="../Resources/Assets/profile-pic.png" alt="display picture" />
<?php 
  }elseif($row["status"]){
  $imageURL = './uploads/'.$row["file_name"] ;
?>
  <img src="<?php echo $imageURL; ?>" alt="" style="border-radius: 50%; "/>
<?php }else{?>
  <img src="../Resources/Assets/profile-pic.png" alt="display picture" />

<?php
}
?>
 