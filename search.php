<?php 
$mysqli = new mysqli("localhost", "root", "", "cr10_valentina_panetta_biglibrary");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$title = $_POST['title'];
$sql = 'SELECT med.media_id, med.title, med.img_path, med.description, med.availability, med.publish_date, publisher.name as publisher_name, author.name as author_name, author.surname, genre.name as genre_name FROM media med join publishers publisher on med.fk_publisher = publisher.publisher_id join authors author on med.fk_author = author.author_id join genres genre on med.fk_genre = genre.genre_id WHERE med.title LIKE "'.$title.'%"';
$results = mysqli_query($mysqli, $sql);
if ($results->num_rows == 1) {
	$row = $results->fetch_assoc();
	echo "<div class='col-lg-4 col-md-6 col-sm-12 my-3 p-4'>
            <div class='card h-100'>
                    <img class='card-img-top border-bottom p-2' src='".$row['img_path']."'>
                  <div class='card-body'>
                    <h5 class='card-title text-darkerblue'>Title: ".$row['title']."</h5>
                    <p class='card-text'>Description: ".$row['description']."</p>
            		<p class='card-text'>Publisher: ".$row['publisher_name']."</p>
                    <p class='card-text'>Date: ".$row['publish_date']."</p>
             		<p class='card-text'>Author: ".$row['author_name']." ".$row['surname']."</p>
                    <p class='card-text'>Genre: ".$row['genre_name']."</p>
                    <a href='update_media.php?id=".$row['media_id']."'><button class='btn btn-primary'>edit</button></a>
                    <a href='delete_media.php?id=".$row['media_id']."'><button class='btn btn-primary'>delete</button></a>
                  </div>
                </div></div>";
} elseif ($results->num_rows >1) {
	$row = $results->fetch_all(MYSQLI_ASSOC);
	foreach($row as $value) {
		echo "<div class='col-lg-4 col-md-6 col-sm-12 my-3 p-4'>
            <div class='card h-100'>
                    <img class='card-img-top border-bottom p-2' src='".$value['img_path']."'>
                  <div class='card-body'>
                    <h5 class='card-title text-darkerblue'>Title: ".$value['title']."</h5>
                    <p class='card-text'>Description: ".$value['description']."</p>
            		<p class='card-text'>Publisher: ".$value['publisher_name']."</p>
                    <p class='card-text'>Date: ".$value['publish_date']."</p>
                    <p class='card-text'>Author: ".$value['author_name']." ".$value['surname']."</p>
              		<p class='card-text'>Genre: ".$value['genre_name']."</p>
                    <a href='update_media.php?id=".$value['media_id']."'><button class='btn btn-primary'>edit</button></a>
                    <a href='delete_media.php?id=".$value['media_id']."'><button class='btn btn-primary'>delete</button></a>
                  </div>
                </div></div>";
	}
} else {
	echo '';
}
// Close connection
$mysqli->close();
?>