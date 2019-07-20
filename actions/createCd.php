<?php
require_once 'db_connect.php';
if ($_POST) {
    $author_name    = $_POST['name'];
    $author_surname = $_POST['surname'];
    $title          = $_POST['title'];
    $img_path       = $_POST['img_path'];
    $description    = $_POST['description'];
    $availability   = $_POST['availability'] == "available";
    $publish_date   = $_POST['publish_date'];
    $fk_genre       = $_POST['fk_genre'];
    $fk_publisher   = $_POST['fk_publisher'];
    $num_of_discs   = $_POST['num_of_discs'];
    $num_of_tracks  = $_POST['num_of_tracks'];
    $length         = $_POST['length'];
    $select         = "SELECT author_id FROM authors WHERE name = '$author_name' AND surname = '$author_surname'";
    $mysqli         = new mysqli('localhost', 'root', '', 'cr10_valentina_panetta_biglibrary');
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $result    = $mysqli->query($select);
    $rows      = $result->fetch_all(MYSQLI_ASSOC);
    $author_id = -1;
    foreach ($rows as $row) {
        $author_id = $row['author_id'];
    }
    
    if ($author_id == -1) {
        $insertAuthor = "INSERT INTO authors(name, surname) VALUES ('$author_name','$author_surname')";
        
        if ($connect->query($insertAuthor) === TRUE) {
            $author_id = $connect->insert_id;
        } else {
            echo "Error " . $insertAuthor . ' ' . $connect->connect_error;
        }
    }
    
    $sql1 = "INSERT INTO media (title, img_path, description, availability, publish_date, fk_genre, fk_publisher, fk_author) VALUES ('$title', '$img_path', '$description', '$availability', '$publish_date', '$fk_genre', '$fk_publisher', '$author_id')";
    if ($connect->query($sql1) === TRUE) {
        header("Location: ../library.php");
        $fk_media = $connect->insert_id;
    } else {
        echo "Error " . $sql1 . ' ' . $connect->connect_error;
    }
    $sql2 = "INSERT INTO cds (num_of_discs, num_of_tracks, length, fk_media) VALUES ('$num_of_discs', '$num_of_tracks', '$length', '$fk_media')";
    
    
    if ($connect->query($sql2) === TRUE) {
        header("Location: ../library.php");
    } else {
        echo "Error " . $sql2 . ' ' . $connect->connect_error;
    }
    $connect->close();
}
?>