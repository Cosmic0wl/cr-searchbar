<?php require_once 'actions/db_connect.php'; 

include 'head.php';

        if ($_GET['id']) {
               $publisher_id = $_GET['id'];
            }

            // function getBooks
            function getBooks($publisher_id) {
            $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

            if ($mysqli->connect_errno) {
               echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }
                $sql_statement  = "SELECT book.book_id, book.isbn, book.written_language, book.pages, med.media_id, med.title, med.img_path, med.description, med.availability, med.publish_date, publisher.name as publisher_name, publisher.address, publisher.size, author.name as author_name, author.surname, genre.name as genre_name FROM books book join media med on book.fk_media = med.media_id join publishers publisher on med.fk_publisher = publisher.publisher_id join authors author on med.fk_author = author.author_id join genres genre on med.fk_genre = genre.genre_id WHERE $publisher_id = publisher.publisher_id";
                    $result = $mysqli->query($sql_statement);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    $books = array();
                    foreach ($rows as $row) {
                        
                        $book = new Book();
                        $book->media_id = $row['media_id'];
                        $book->title = $row['title'];
                        $book->img_path = $row['img_path'];
                        $book->description = $row['description'];
                        $book->availability = $row['availability'];
                        $book->publish_date = $row['publish_date'];
                        $book->isbn = $row['isbn'];
                        $book->pages = $row['pages'];
                        $book->written_language = $row['written_language'];
                        $publisher = new Publisher();
                        $publisher->name = $row['publisher_name'];
                        $publisher->address = $row['address'];
                        $publisher->size = $row['size'];
                        $book->publisher = $publisher;
                        $author = new Author();
                        $author->name = $row['author_name'];
                        $author->surname = $row['surname'];
                        $book->author = $author;
                        $genre = new Genre();
                        $genre->name = $row['genre_name'];
                        $book->genre = $genre;
                        array_push($books, $book);
                    }
                    return $books;
            }
            // function getCDs

            function getCDs($publisher_id) {
            $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

            if ($mysqli->connect_errno) {
               echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }
                $sql_statement = "SELECT cd.cd_id, cd.length, cd.num_of_discs, cd.num_of_tracks, med.media_id, med.title, med.img_path, med.description, med.availability, med.publish_date, publisher.name as publisher_name, publisher.address, publisher.size, author.name as author_name, author.surname, genre.name as genre_name FROM cds cd join media med on cd.fk_media = med.media_id join publishers publisher on med.fk_publisher = publisher.publisher_id join authors author on med.fk_author = author.author_id join genres genre on med.fk_genre = genre.genre_id WHERE $publisher_id = publisher.publisher_id";
                $result = $mysqli->query($sql_statement);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $cds = array();
                foreach ($rows as $row) {
                        
                        $cd = new CD();
                        $cd->media_id = $row['media_id'];
                        $cd->title = $row['title'];
                        $cd->img_path = $row['img_path'];
                        $cd->description = $row['description'];
                        $cd->availability = $row['availability'];
                        $cd->publish_date = $row['publish_date'];
                        $cd->length = $row['length'];
                        $cd->num_of_discs = $row['num_of_discs'];
                        $cd->num_of_tracks = $row['num_of_tracks'];
                        $publisher = new Publisher();
                        $publisher->name = $row['publisher_name'];
                        $publisher->address = $row['address'];
                        $publisher->size = $row['size'];
                        $cd->publisher = $publisher;
                        $author = new Author();
                        $author->name = $row['author_name'];
                        $author->surname = $row['surname'];
                        $cd->author = $author;
                        $genre = new Genre();
                        $genre->name = $row['genre_name'];
                        $cd->genre = $genre;
                        array_push($cds, $cd);
                    }
                    return $cds;
            }

            // function get DVDs

            function getDVDs($publisher_id) {
            $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

            if ($mysqli->connect_errno) {
               echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }
                $sql_statement = "SELECT dvd.dvd_id, dvd.audio_description, dvd.aspect_ratio, dvd.subtitles, dvd.run_time, dvd.rated, med.media_id, med.title, med.img_path, med.description, med.availability, med.publish_date, publisher.name as publisher_name, publisher.address, publisher.size, author.name as author_name, author.surname, genre.name as genre_name FROM dvds dvd join media med on dvd.fk_media = med.media_id join publishers publisher on med.fk_publisher = publisher.publisher_id join authors author on med.fk_author = author.author_id join genres genre on med.fk_genre = genre.genre_id WHERE $publisher_id = publisher.publisher_id";
                $result = $mysqli->query($sql_statement);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $dvds = array();
                foreach ($rows as $row) {
                        $dvd = new dvd();
                        $dvd->media_id = $row['media_id'];
                        $dvd->title = $row['title'];
                        $dvd->img_path = $row['img_path'];
                        $dvd->description = $row['description'];
                        $dvd->availability = $row['availability'];
                        $dvd->publish_date = $row['publish_date'];
                        $dvd->audio_description = $row['audio_description'];
                        $dvd->aspect_ratio = $row['aspect_ratio'];
                        $dvd->subtitles = $row['subtitles'];
                        $dvd->run_time = $row['run_time'];
                        $dvd->rated = $row['rated'];
                        $publisher = new Publisher();
                        $publisher->name = $row['publisher_name'];
                        $publisher->address = $row['address'];
                        $publisher->size = $row['size'];
                        $dvd->publisher = $publisher;
                        $author = new Author();
                        $author->name = $row['author_name'];
                        $author->surname = $row['surname'];
                        $dvd->author = $author;
                        $genre = new Genre();
                        $genre->name = $row['genre_name'];
                        $dvd->genre = $genre;
                        array_push($dvds, $dvd);
                    }
                    return $dvds;
            }

            class Publisher {
                public $name;
                public $address;
                public $size;

            }

            class Author {
                public $name;
                public $surname;
            }

            class Genre {
                public $name;
            }

            abstract class Media {
                public $media_id;
                public $title;
                public $img_path;
                public $description;
                public $availability;
                public $publish_date;
                public $publisher;
                public $author;
                public $genre;
            }

            class Book extends Media {
                public $isbn;
                public $pages;
                public $written_language;

                 function render() {              
                        echo "
                        <div class='col-lg-4 col-md-6 col-sm-12 my-3 p-4'><div class='card h-100'>
                                <img class='card-img-top border-bottom p-2' src='".$this->img_path."'>
                              <div class='card-body'>
                                <h5 class='card-title text-darkerblue'>Title: ".$this->title."</h5>
                                <p class='card-text'>Description: ".$this->description."</p>
                                <p class='card-text'>Publisher: ".$this->publisher->name."</p>
                                <p class='card-text'>Publication Date: ".$this->publish_date."</p>
                                <p class='card-text'>Author: ".$this->author->name." ".$this->author->surname."</p>
                                <p class='card-text'>Genre: ".$this->genre->name."</p>
                                <a href='#' class='btn btn-primary'>detail</a>
                                <a href='update_media.php?id=".$this->media_id."'><button class='btn btn-primary'>edit</button></a>
                                <a href='delete_media.php?id=".$this->media_id."'><button class='btn btn-primary'>delete</button></a>
                              </div>
                            </div></div>";
                    }
                }

            class CD extends Media {
                public $length;
                public $num_of_discs;
                public $num_of_tracks;

                function render() {              
                        echo "
                        <div class='col-lg-4 col-md-6 col-sm-12 my-3 p-4'><div class='card h-100'>
                                <img class='card-img-top border-bottom p-2' src='".$this->img_path."'>
                              <div class='card-body'>
                                <h5 class='card-title text-darkerblue'>Title: ".$this->title."</h5>
                                <p class='card-text'>Description: ".$this->description."</p>
                                <p class='card-text'>Publisher: ".$this->publisher->name."</p>
                                <p class='card-text'>Publication Date: ".$this->publish_date."</p>
                                <p class='card-text'>Author: ".$this->author->name." ".$this->author->surname."</p>
                                <p class='card-text'>Genre: ".$this->genre->name."</p>
                                <a href='#' class='btn btn-primary'>detail</a>
                                <a href='update_media.php?id=".$this->media_id."'><button class='btn btn-primary'>edit</button></a>
                                <a href='delete_media.php?id=".$this->media_id."'><button class='btn btn-primary'>delete</button></a>
                              </div>
                            </div></div>";
                    }
                }

            class DVD extends Media {
                public $audio_description;
                public $aspect_ratio;
                public $subtitles;
                public $run_time;
                public $rated;

                function render() {              
                        echo "
                        <div class='col-lg-4 col-md-6 col-sm-12 my-3 p-4'>
                        <div class='card h-100'>
                                <img class='card-img-top border-bottom p-2' src='".$this->img_path."'>
                              <div class='card-body'>
                                <h5 class='card-title text-darkerblue'>Title: ".$this->title."</h5>
                                <p class='card-text'>Description: ".$this->description."</p>
                                <p class='card-text'>Publisher: ".$this->publisher->name."</p>
                                <p class='card-text'>Publication Date: ".$this->publish_date."</p>
                                <p class='card-text'>Author: ".$this->author->name." ".$this->author->surname."</p>
                                <p class='card-text'>Genre: ".$this->genre->name."</p>
                                <a href='#' class='btn btn-primary'>detail</a>
                                <a href='update_media.php?id=".$this->media_id."'><button class='btn btn-primary'>edit</button></a>
                                <a href='delete_media.php?id=".$this->media_id."'><button class='btn btn-primary'>delete</button></a>
                              </div>
                            </div></div>";
                    }
            }
            
            foreach (getBooks($publisher_id) as $book) {
                $book->render();
            }

            foreach (getCDs($publisher_id) as $cd) {
                $cd->render();
            }

            foreach (getDVDs($publisher_id) as $dvd) {
                $dvd->render();
            }
include 'footer.php';?>
