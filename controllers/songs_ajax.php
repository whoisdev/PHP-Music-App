<?php include "../db.php"?>
<?php   session_start(); ?>
<?php
    if(isset($_GET['get_session']) && !empty($_SESSION['current'])){
        echo $_SESSION['current'];
    }
    if(isset($_GET['request'])){
        $_SESSION['current'] = 'request';
        $query_get_all_songs = "SELECT * FROM songs";
        $result_recieved = mysqli_query($connection, $query_get_all_songs);
        ?>
        <h2>ALL SONGS</h2>
        <?php
       print_songs($result_recieved);
    }
    else if(isset($_GET['playlist'])){
        $_SESSION['current'] = 'playlist';
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
                        <button class="icons play_playlist"  id="<?php echo $row['playlist_id'];?>"><img src="./images/play.png " class="music-icon-playlist"></button>
                        <span class="song-title play_playlist"><?php  echo $row['playlist_name'] ?></span>
                        <span class="number_of_songs"><?php  echo strlen($row['song_id'])  ?></span>
                    </div>
                </div>

            </div>
            <?php
        }
    }
    else if(isset($_GET['songid'])){
        $_SESSION['current'] = 'songid';
        $id = $_GET['songid'];
        $query_get_song = "SELECT * FROM songs WHERE id = '{$id}'";
        $result = mysqli_query($connection,$query_get_song);
        $row = mysqli_fetch_assoc($result);
        echo $row['location'];
    }
    else if(isset($_GET['search'])){
        $_SESSION['current'] = 'search';
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
        $query_find_songs_playlist = "SELECT song_id FROM playlist WHERE playlist_id = '{$id}'";
        $result = mysqli_query($connection, $query_find_songs_playlist);
        $row = mysqli_fetch_assoc($result);
        $ids = $row['song_id'];
        $songs_in_playlist = "SELECT * FROM songs WHERE id IN({$ids})";
        $query_all_songs_in_playlist = mysqli_query($connection,$songs_in_playlist);
        echo "<h1>All songs in playlist</h1>";
        print_songs($query_all_songs_in_playlist);
    }

    else if(isset($_GET['playlist_add'])){
        $id_of_song = $_GET['playlist_add'];
        $query = "SELECT * FROM playlist";
        $result = mysqli_query($connection,$query);
        ?>
         <h4> Click on the playlist to add</h4>
        <?php
        while($row = mysqli_fetch_assoc($result)){
            $play_list_id = $row['playlist_id'];
            ?>
            <form method="get" action="./?q=add&play_list=<?php echo $play_list_id ?>&song=<?php echo $id_of_song ?>" class="playlist_add" >
            <h3 id="<?php echo $play_list_id;?>"><?php echo $row['playlist_name'];?></h3>
            </form>
            <?php
        }
    }

    function print_songs($result_recieved){
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

?>