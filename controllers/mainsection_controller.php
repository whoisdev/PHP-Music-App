<?php
if(isset($_POST['playlist_name'])){
    $song_id_to_add = $_GET['add'];
    $playlist_id = $_POST['playlist_name'];
    $concat_to = "SELECT song_id FROM playlist WHERE playlist_id = '{$playlist_id}'";
    $result_concat = mysqli_query($connection,$concat_to);
    $row_to_concat = mysqli_fetch_assoc($result_concat);
    $row_to_concat = $row_to_concat['song_id'];
    $row_to_concat .= $song_id_to_add;
    $query_to_update = "UPDATE playlist SET song_id = '{$row_to_concat}' WHERE playlist_id = '{$playlist_id}'";
    $result_add = mysqli_query($connection,$query_to_update);
    header("location:index.php");
}

class mainsection{
    static function print_all(){
       ?>
        <div class="col-sm-7 col-md-7 main-section">
            <h1>Recent Songs and Playlists</h1>
            <h3>Recent Songs</h3>
            <div id="recent-songs">
                <div class="row">
                    <div class="col-sm-12 " id="songs-played">
                        <div class="card w-50">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Button</a>
                            </div>
                        </div>
                        <div class="card w-50">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Button</a>
                            </div>
                        </div>
                        <div class="card w-50">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Button</a>
                            </div>
                        </div>
                        <div class="card w-50">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">With lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Button</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--    Recent Songs        -->
            <h3>Your Playlists</h3>
    <?php
        mainsection::get_all_playlist();
    ?>
        </div>
    <?php
    }
    static function get_all_playlist(){
            $result_all_playlist=self::get_playlist_for_user("1");
        ?>
            <div id="playlist">
                <div class="row">
                    <div class="col-sm-12 " id="playlist-songs">
                        <?php while($row = mysqli_fetch_assoc($result_all_playlist)){?>
                        <div class="card w-50">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $row['playlist_name']?></h2>
                                <a href="#" class="btn btn-primary">Play</a>
                            </div>
                        </div>
                       <?php } ?>
                    </div>
                </div>
            </div>

        <?php
    }
    static function get_playlist_for_user($id){
        global $connection;
        $query_get_all_playlist = "SELECT * FROM playlist WHERE user_id ='{$id}'";
        $result_all_playlist = mysqli_query($connection,$query_get_all_playlist);
        return $result_all_playlist;
    }
    static function add_song_to_playlist($song_id){
        $all_playlist = self::get_playlist_for_user("1");
        ?>
        <div class="col-sm-7 col-md-7 main-section">
            <h3>Select Playlist</h3>
            <form class="row" action="" method="post">
                <button type="submit" class="btn btn-primary"> ADD</button>
                <div class="col-xm-12">
                    <div class="col-sm-12 " id="playlist-songs">
                        <?php while($row = mysqli_fetch_assoc($all_playlist)){?>
                            <div class="card w-50">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <input type="checkbox" name="playlist_name" value="<?php echo $row['playlist_id'];?>">
                                        <?php echo $row['playlist_name']?>
                                    </h2>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
        <?php
    }
}

?>