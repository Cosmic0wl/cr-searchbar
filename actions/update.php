<?php 
require_once 'db_connect.php';
if ($_POST) {
   $title = $_POST['title'];
   $img_path = $_POST['img_path'];
   $description = $_POST['description'];
   $availability = $_POST['availability'];
   $publish_date = $_POST['publish_date'];
   $fk_genre = $_POST['fk_genre'];
   $fk_publisher = $_POST['fk_publisher'];

   $media_id = $_POST['media_id'];
   $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

    if ($mysqli->connect_errno) {
                   echo "Failed to connect to MySQL: " . $mysqli->connect_error;
     }
   $sql = "UPDATE media SET title = '$title', img_path = '$img_path', description = '$description', availability = '$availability', publish_date = '$publish_date', fk_genre = '$fk_genre', fk_publisher = '$fk_publisher'  WHERE media_id = {$media_id}" ;
   if($mysqli->query($sql) === TRUE) {
       header("Location: ../library.php");
   } else {
        echo "Error while updating record : ". $mysqli->error;
   }
   $mysqli->close();
}
?>