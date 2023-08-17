<?php
// Include the database configuration file
include 'dbConfig.php';
$user_id = $_SESSION['user_id'];
// Initialize the variables
$message="";

if(isset($_POST['pp_submit']))
{
    $fileName = $_FILES["file_upload"]["name"];
    $fileTmpName = $_FILES["file_upload"]["tmp_name"];
    // Checking whether dp exists or not
    $select = $db->query("SELECT * FROM images WHERE user_id = '$user_id'");
    if (mysqli_num_rows($select) == 0)
    {
        if(move_uploaded_file( $fileTmpName ,"uploads/".$fileName))
            {
                $message = "File uploaded" ;
                $insert = $db->query("INSERT INTO images (user_id, file_name, status) VALUES ('$user_id','" . $fileName . "',1)");
            }
    }else{
        if(move_uploaded_file( $fileTmpName ,"uploads/".$fileName))
            {
                $message = "File uploaded" ;
                $update = $db->query("UPDATE images SET file_name ='$fileName' WHERE user_id = '$user_id' ");
            }
    }
}

?>


