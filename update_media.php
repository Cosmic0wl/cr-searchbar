<?php require_once 'actions/db_connect.php'; 

if ($_GET['id']) {
   $media_id = $_GET['id'];
   $sql = "SELECT * FROM media WHERE media_id = {$media_id}";
               $mysqli = new mysqli('localhost','root' ,'', 'cr10_valentina_panetta_biglibrary');

            if ($mysqli->connect_errno) {
               echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            }
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();
   $connect->close();
}

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
    <form action="actions/update.php" method="POST">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title" value="<?php echo $data['title']?>" >
            <small id="titleHelp" class="form-text text-muted">Input title</small>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"><?php echo $data['description']?></textarea>
        </div>
        <div class="form-group">
            <label for="publisher">Select Publisher</label>
            <select name="fk_publisher" class="form-control" id="publisher">
            <?php getPublisherOptions(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="publishDate">Publish Date</label>
            <input type="text" name="publish_date" class="form-control" id="publishDate" aria-describedby="publishDateHelp" placeholder="Enter publishDate" value="<?php echo $data['publish_date']?>">
            <small id="publishDateHelp" class="form-text text-muted">Input the publish date (YYYY-MM-DD)</small>
        </div>
        <div class="form-group d-none">
            <label for="img">img</label>
            <input type="text" value="<?php echo $data['img_path']?>"name="img_path" class="form-control" id="author" aria-describedby="authorHelp" placeholder="Enter img">
            <small id="authorHelp" class="form-text text-muted">Input the img path (resources/img/book.png)</small>
        </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Availability</label>
            <select class="form-control" name="availability" id="exampleFormControlSelect1">
              <option value="1">available</option>
              <option value="0">not available</option>
            </select>
          </div>
        <div class="form-group">
            <label for="genre">Select Genre</label>
            <select name="fk_genre" class="form-control" id="genre">
                <?php getGenreOptions(); ?>
            </select>
        </div>
        <input type = "hidden" name="media_id" value="<?php echo $data['media_id']?>" />
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
    <img class="img-fluid" src="resources/img/bg.jpg">
</div>
<?php include 'footer.php' ?>