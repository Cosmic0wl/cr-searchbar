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
    <form action="actions/createDvd.php" method="post">

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
            <small id="publishDateHelp" class="form-text text-muted">Input the publish date (YYYY-MM-DD)</small>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="name" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter author">
            <small id="authorHelp" class="form-text text-muted">Input director name</small>
            <input type="text" name="surname" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter author">
            <small id="authorHelp" class="form-text text-muted">Input director surname</small>
        </div>
        <!-- default img settings -->
        <div class="form-group d-none">
            <input class="form-control" name="img_path" value="resources/img/movie.png" type="hidden" placeholder="DVD" readonly>
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
            <label for="audio_description">Select Audio Description</label>
            <select name="audio_description" class="form-control" id="publisher">
                <option>English</option>
                <option>French</option>
                <option>Italian</option>
                <option>German</option>
                <option>Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="aspect_ratio">Aspect Ratio</label>
            <input type="text" name="aspect_ratio" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter aspect ratio">
            <small id="authorHelp" class="form-text text-muted">Input aspect ratio</small>
        </div>
        <div class="form-group">
            <label for="subtitles">Select Subtitles</label>
            <select name="subtitles" class="form-control" id="publisher">
                <option>English</option>
                <option>French</option>
                <option>Italian</option>
                <option>German</option>
                <option>Spanish</option>
            </select>
        </div>
        <div class="form-group">
            <label for="run_time">Run Time</label>
            <input type="text" name="run_time" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter run time in minutes">
            <small id="authorHelp" class="form-text text-muted">Input run time as minutes (for example 123)</small>
        </div>
        <div class="form-group">
            <label for="rated">Rated</label>
            <input type="text" name="rated" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter rating">
            <small id="authorHelp" class="form-text text-muted">Input rating</small>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
    <img class="img-fluid" src="resources/img/bg.jpg">
</div>
<?php include 'footer.php'?>