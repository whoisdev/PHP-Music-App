<?php include "../db.php"?>
<?php
if(isset($_GET['title'])){
    global $connection;
    $id_of_song = $_GET['title'];
    $query_get_song = "SELECT * FROM songs WHERE id = '{$id_of_song}'";
    $result_retured = mysqli_query($connection,$query_get_song);
    $row = mysqli_fetch_assoc($result_retured);
    echo $row['title'];
}
?>