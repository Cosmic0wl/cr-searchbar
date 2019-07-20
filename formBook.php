<?php require_once 'actions/db_connect.php'; 

function getPublisherOptions() {
    $selectPublisher = "SELECT publisher_id, name FROM publishers";
    $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

    if ($mysqli->connect_errno) {
       echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $result = $mysqli->query($selectPublisher);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $option = "";
    foreach ($rows as $row) {
    $option .= '<option value="'.$row['publisher_id'].'">';
    $option .= $row['name'];
    $option .= '</option>';
  }
  echo $option;
}
function getGenreOptions() {
    $selectGenre= "SELECT genre_id, name FROM genres";
    $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

    if ($mysqli->connect_errno) {
       echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $result = $mysqli->query($selectGenre);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $option = "";
    foreach ($rows as $row) {
    $option .= '<option value="'.$row['genre_id'].'">';
    $option .= $row['name'];
    $option .= '</option>';
  }
  echo $option;
}
include 'head.php';
?>
<div class="col-lg-6 col-md-6 col-sm-12 pt-5">
    <form  action="actions/createBook.php" method="post">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title">
            <small id="titleHelp" class="form-text text-muted">Input title</small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="publisher">Select Publisher</label>
            <select name="fk_publisher" class="form-control" id="publisher">
                <?php getPublisherOptions(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="publishDate">Publish Date</label>
            <input type="text" name="publish_date" class="form-control" id="publishDate" aria-describedby="publishDateHelp" placeholder="Enter publishDate">
            <small id="publishDateHelp" class="form-text text-muted">Input publish date (YYYY-MM-DD)</small>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="name" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter author">
            <small id="authorHelp" class="form-text text-muted">Input author name</small>
            <input type="text" name="surname" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter author">
            <small id="authorHelp" class="form-text text-muted">Input author surname</small>
        </div>
        <!-- default img settings -->
        <div class="form-group d-none">
            <input class="form-control" name="img_path" value="resources/img/book.png" type="hidden" placeholder="book" readonly>
        </div>
        <!-- default availability settings -->
        <div class="form-group d-none">
            <input class="form-control" name="availability" value="available" type="hidden" placeholder="available" readonly>
        </div>
        <div class="form-group">
            <label for="genre">Select Genre</label>
            <select name="fk_genre" class="form-control" id="genre">
                <?php getGenreOptions(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter ISBN">
            <small id="authorHelp" class="form-text text-muted">Input isbn</small>
        </div>
        <div class="form-group">
            <label for="pages">Number Of Pages</label>
            <input type="text" name="pages" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter number of pages">
            <small id="authorHelp" class="form-text text-muted">Input number of pages</small>
        </div>
        <div class="form-group">
            <label for="written_language">Written Language</label>
            <input type="text" name="written_language" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter language">
            <small id="authorHelp" class="form-text text-muted">Input written language</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
    <img class="img-fluid" src="resources/img/bg.jpg">
</div>
<?php include 'footer.php'; ?>