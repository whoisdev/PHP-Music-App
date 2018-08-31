<?php include "db.php"; ?>
<?php

if(isset($_POST['add_song'])) {
    $sourcePath = $_FILES['music_file']['tmp_name'];
    $targetPath = "./music/" . $_FILES['music_file']['name'];
    if (move_uploaded_file($sourcePath, $targetPath)) {
        $file_name = $_FILES['music_file']['name'];
        $query_to_add_to_sql = "INSERT INTO songs (title,location) VALUES ('{$file_name}','{$targetPath}')";
        $result_add = mysqli_query($connection,$query_to_add_to_sql);
        header("location:index.php");
    } else {
        echo "<h1>An Error Occured Please Try Again</h1>";
        header("location:add_songs.php");

    }
}
?>
