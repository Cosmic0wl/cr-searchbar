<?php require_once 'actions/db_connect.php'; 

if ($_GET['id']) {
   $media_id = $_GET['id'];
   $sql = "SELECT dvd.dvd_id, dvd.audio_description, dvd.aspect_ratio, dvd.subtitles, dvd.run_time, dvd.rated, med.media_id, med.title, med.img_path, med.description, med.availability, med.publish_date, publisher.name as publisher_name, publisher.address, publisher.size, author.name as author_name, author.surname, genre.name as genre_name FROM dvds dvd join media med on dvd.fk_media = med.media_id join publishers publisher on med.fk_publisher = publisher.publisher_id join authors author on med.fk_author = author.author_id join genres genre on med.fk_genre = genre.genre_id WHERE media_id = {$media_id}";
               $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

            if ($mysqli->connect_errno) {
               echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    $connect->close();
}
include 'head.php';

//detail
echo "
<div class='row d-flex justify-content-center align-items-center'>
    <div class='col-lg-6 col-md-6 col-sm-12 my-3'>
    <img class='img-fluid' src='".$data['img_path']."'>
    </div>
    <div class='col-lg-6 col-md-6 col-sm-12 my-3'>
            <h5 class='font-weight-bold text-darkerblue'>Title: ".$data['title']."</h5>
            <p class='text-darkerblue'>Description: ".$data['description']."</p>
            <p class='text-darkerblue'>Author: ".$data['author_name']." ".$data['surname']."</p>
            <p class='text-darkerblue'>Availability: ".$data['availability']."</p>
            <p class='text-darkerblue'>Publisher: ".$data['publisher_name']."</p>
            <p class='text-darkerblue'>Publication Date: ".$data['publish_date']."</p>
            <p class='text-darkerblue'>Audio Description: ".$data['audio_description']."</p>
            <p class='text-darkerblue'>Aspect Ratio: ".$data['aspect_ratio']."</p>
            <p class='text-darkerblue'>Subtitles: ".$data['subtitles']."</p>
            <p class='text-darkerblue'>Run Time: ".$data['run_time']." minutes</p>
            <p class='text-darkerblue'>Rated: ".$data['rated']."</p>
            <a href='library.php' class='btn btn-primary'>back</a>
        </div>
    </div>
</div>";
include 'footer.php' ?>
