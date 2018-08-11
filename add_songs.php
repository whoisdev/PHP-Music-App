<?php include "partials/add_songs_headder.php"; ?>

<form id="add_songs" enctype="multipart/form-data" class="form-action" method="post" action="upload_image.php" >
    <div class="centered-image">
        <img src="images/upload.png">
        <input type="file" accept="mp3/*" class="form-control" name="music_file">
        <button class="input-group" name="add_song">Add Song</button>
    </div>

</form>

<?php  include "partials/footer.php"?>