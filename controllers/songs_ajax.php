<?php include "../db.php"?>
<?php
    if(isset($_GET['request'])){
        $query_get_all_songs = "SELECT * FROM songs";
        $result_recieved = mysqli_query($connection, $query_get_all_songs);
        ?>
        <h2>ALL SONGS</h2>
        <?php
        while($row = mysqli_fetch_assoc($result_recieved)) {
            $pattern = '/(.mp3)/i';
            $title = preg_replace($pattern, "", $row['title']);
            if(strlen($title)>25){
                $title = substr($title,0,25).' ...';
            }
            ?>
            <div class="songs-cards">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <img src="./images/music.png " class="play_song">
                        <button class="icons song_add_playlist" id="<?php echo $row['id']?>"><img src="./images/add_to.png " class="play_song"></button>
                        <button class="icons get_song" id="<?php echo $row['id']  ?>"><img src="./images/play.png" class="play_song"></button>
                        <span class="song-title"><?php  echo $title?></span>
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
                        <span class="song-title play_playlist" id="<?php echo $row['playlist_id'];?>"><?php  echo $row['playlist_name'] ?></span>
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
    else if(isset($_GET['search'])){
        $query = $_GET['search'];
        $query_find_song = "SELECT * FROM songs WHERE title LIKE '%{$query}%'";
        $result = mysqli_query($connection, $query_find_song);
        $row = mysqli_num_rows($result);
        if($row>=1){
            ?>
            <h3>YOUR SEARCH MATCHES FOLLOWING RESULTS</h3>
            <?php
        while($row = mysqli_fetch_assoc($result)) {

            $pattern = '/(.mp3)/i';
            $title = preg_replace($pattern, "", $row['title']);
            if(strlen($title)>25){
                $title = substr($title,0,25).' ...';
            }
            ?>
            <div class="songs-cards">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <img src="./images/music.png " class="play_song">
                        <button><img src="./images/add_to.png " class="play_song"></button>
                        <button class="icons get_song" id="<?php echo $row['id']  ?>"><img src="./images/play.png" class="play_song"></button>
                        <span class="song-title"><?php  echo $title?></span>
                    </div>
                </div>
            </div>
            <?php
            }
        }
        else{
            echo "<h3>OOPSS NO RESULTS</h3>";
        }
    }
    else if(isset($_GET['playlist_get'])){
        $id = $_GET['playlist_get'];
        $query_get_all_songs = "SELECT * FROM playlist WHERE playlist_id = '{$id}'";
        $result_recieved = mysqli_query($connection, $query_get_all_songs);
        ?>
        <h5>ALL PLAYLISTS</h5>
        <?php
        while($row = mysqli_fetch_assoc($result_recieved)) {
            ?>
            <div class="songs-cards">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <input type="radio" name="playlist_select" value ="<?php echo $row['playlist_id'];?>">
                        <span class="song-title play_playlist"><?php  echo $row['playlist_name'] ?></span>
                    </div>
                </div>
            </div>
            <?php
        }
    }

?>