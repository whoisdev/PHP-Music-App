<?php
    class songs{
     static function get_all_songs(){
         global $connection;
        ?>
            <div class="col-sm-4 col-md-4 songs-div">
                <div class="input-group">
                    <input type="text" class="form-control search-bar" placeholder="Search Songs" id="search_query">
                    <div class="input-group-btn">
                        <button class="btn btn-default search-btn" id="search_song">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
                <h4>All songs</h4>
                <?php
                $get_all_songs = "SELECT * FROM songs";
                $result_all_songs = mysqli_query($connection,$get_all_songs);
                while($row = mysqli_fetch_assoc($result_all_songs)){
                    $id_of_song = $row['id'];
                    ?>
                    <div class="card w-50">
                        <div class="card-body">
                            <div>
                                <button class="icons get_song" id="<?php echo $row['id'];?>"><img  src="images/play.png" class="add_to"></button>
                                <a href="?add=<?php echo $id_of_song;?>"><img class="add_to" src="images/add_to.png" id="<?php echo $row['id'];?>"></a>
                            </div>
                            <p class="card-title"><?php echo $row['title'] ?></p>
                            <p class="card-text"><?php echo $row['length'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <?php
                }
                ?>
            </div>
            <?php
     }
     static function get_songs_for_playlist($playList_id){
         global $connection;
        $query_get_songs = "SELECT song_id FROM playlist WHERE playlist_id = '{$playList_id}'";
        $result = mysqli_query($connection,$query_get_songs);
        $row = mysqli_fetch_assoc($result);
        $all_songs = $row['song_id'];
        $all_songs = str_split($all_songs);
        $query_get_all_songs = "SELECT * FROM songs WHERE id IN ( ";
        for($i=0;$i<sizeof($all_songs)-1;$i++){
            $query_get_all_songs.="'{$all_songs[$i]}',";
        }
        $query_get_all_songs.="'{$all_songs[sizeof($all_songs)-1]}')";
        $result = mysqli_query($connection, $query_get_all_songs);
        ?>
        <div class="col-sm-4 col-md-4 songs-div">
            <div class="input-group">
                <input type="text" class="form-control search-bar" placeholder="Search Songs" id="search_query">
                <div class="input-group-btn">
                    <button class="btn btn-default search-btn" id="search_song">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
            </div>
        </div>
         <?php
        while($row = mysqli_fetch_assoc($result)){
            ?>
                <div class="card w-50">
                    <div class="card-body">
                        <div>
                            <button class="icons get_song" id="<?php echo $row['id'];?>"><img  src="images/play.png" class="add_to"></button>
                            <a href="?add=<?php echo $id_of_song;?>"><img class="add_to" src="images/add_to.png" id="<?php echo $row['id'];?>"></a>
                        </div>
                        <p class="card-title"><?php echo $row['title'] ?></p>
                        <p class="card-text"><?php echo $row['length'] ?></p>
                    </div>
                </div>
                <hr>
            <?php
        }
        ?>
        </div>
            <?php
     }
    }
?>


<?php //include "controllers/songs_controller.php"?>
<!--        --><?php
//            if(isset($_GET['add'])){
//                $id_to_add_song = $_GET['add'];
//                songs::get_all_songs();
//                mainsection::add_song_to_playlist($id_to_add_song);
//
//            }
//            else if(isset($_GET['play'])){
//                songs::get_songs_for_playlist($_GET['play']);
//                mainsection::print_all();
//
//            }
//            else{
//                songs::get_all_songs();
//                mainsection::print_all();
//            }
//        ?>
<!--        --><?php //include "controllers/profile_controller.php" ?>

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
                                <a href="?play=<?php echo $row['playlist_id'] ?>" class="btn btn-primary">Play</a>
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




