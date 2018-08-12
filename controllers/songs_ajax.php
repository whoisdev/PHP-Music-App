<?php include "../db.php"?>
<?php
    if(isset($_GET['request'])){
        $query_get_all_songs = "SELECT * FROM songs";
        $result_recieved = mysqli_query($connection, $query_get_all_songs);
        ?>
        <h2>ALL SONGS</h2>
        <?php
        while($row = mysqli_fetch_assoc($result_recieved)) {
            ?>
            <div class="songs-cards">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <img src="./images/music.png " class="play_song">
                        <img src="./images/add_to.png " class="play_song">
                        <button class="icons get_song" id="<?php echo $row['id']  ?>"><img src="./images/play.png" class="play_song"></button>
                        <span class="song-title"><?php  echo substr($row['title'],0,25)  ?></span>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    else if(isset($_GET['playlist'])){
        $query_get_all_songs = "SELECT * FROM playlist";
        $result_recieved = mysqli_query($connection, $query_get_all_songs);
        ?>
        <h2>ALL PLAYLISTS</h2>
        <?php
        while($row = mysqli_fetch_assoc($result_recieved)) {
            ?>
            <div class="songs-cards">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <img src="./images/play.png " class="music-icon-playlist">
                        <span class="song-title"><?php  echo $row['playlist_name'] ?></span>
                        <span class="number_of_songs"><?php  echo strlen($row['song_id'])  ?></span>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    else if(isset($_GET['songid'])){
        $id = $_GET['songid'];
        $query_get_song = "SELECT * FROM songs WHERE id = '{$id}'";
        $result = mysqli_query($connection,$query_get_song);
        $row = mysqli_fetch_assoc($result);
        echo $row['location'];
    }
?>