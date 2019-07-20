<?php 
require_once 'db_connect.php';
if ($_POST) {
   $media_id = $_POST['media_id'];
   $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

   if ($mysqli->connect_errno) {
                   echo "Failed to connect to MySQL: " . $mysqli->connect_error;
     }
   $sql1 = "DELETE FROM cds WHERE fk_media = {$media_id}; "; 
   $sql2 = "DELETE FROM dvds WHERE fk_media = {$media_id}; "; 
   $sql3 = "DELETE FROM books WHERE fk_media = {$media_id}; "; 
   $sql4 = "DELETE FROM media WHERE media_id = {$media_id}; ";
    if($connect->query($sql1) === TRUE) {

   } else {
       echo "Error updating record : " . $connect->error;
   }
       if($connect->query($sql2) === TRUE) {

   } else {
       echo "Error updating record : " . $connect->error;
   }
       if($connect->query($sql3) === TRUE) {

   } else {
       echo "Error updating record : " . $connect->error;
   }
       if($connect->query($sql4) === TRUE) {
       header("Location: ../library.php");
   } else {
       echo "Error updating record : " . $connect->error;
   }
   $connect->close();
}
?>