<?php require_once 'actions/db_connect.php'; 

if ($_GET['id']) {
   $media_id = $_GET['id'];
   $sql = "SELECT book.book_id, book.isbn, book.written_language, book.pages, med.media_id, med.title, med.img_path, med.description, med.availability, med.publish_date, publisher.name as publisher_name, publisher.address, publisher.size, author.name as author_name, author.surname, genre.name as genre_name FROM books book join media med on book.fk_media = med.media_id join publishers publisher on med.fk_publisher = publisher.publisher_id join authors author on med.fk_author = author.author_id join genres genre on med.fk_genre = genre.genre_id WHERE media_id = {$media_id}";
               $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

            if ($mysqli->connect_errno) {
               echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($data['availability'] == 1) {
        $availability = 'available';
    } else {
        $availability = 'not available';
    }
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
        <p class='text-darkerblue'>Availability: ".$availability."</p>
        <p class='text-darkerblue'>Publisher: ".$data['publisher_name']."</p>
        <p class='text-darkerblue'>Publication Date: ".$data['publish_date']."</p>
        <p class='text-darkerblue'>Number of Pages: ".$data['pages']."</p>
        <p class='text-darkerblue'>Written Language: ".$data['written_language']."</p>
        <p class='text-darkerblue'>ISBN: ".$data['isbn']."</p>
        <a href='library.php' class='btn btn-primary'>back</a>
    </div>
</div>
";
include 'footer.php';?>