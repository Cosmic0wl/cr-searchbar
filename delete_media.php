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
    <div class="col-12 p-4 d-flex justify-content-center flex-column align-items-center">
        <img class="img-fluid" src="resources/img/delete.png">
        <form action="actions/delete.php" method="POST">
            <h3 class="text-darkerblue py-2">Do you really want to delete this media?</h3>           
            <input type = "hidden" name="media_id" value= "<?php echo $data['media_id']?>" />
            <button type="submit" class="btn btn-primary btn-lg btn-block my-4">Yes</button>
            <a class="text-decoration-none" href="library.php"><button type="button" class="btn btn-primary btn-lg btn-block">No</button></a>
        </form>
    </div>
<?php include 'footer.php'; ?>
