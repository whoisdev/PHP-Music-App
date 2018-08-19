<?php include "../db.php"?>
<?php   session_start(); ?>

<?php require_once '../vendor/autoload.php'; ?>
<?php $loader = new Twig_Loader_Filesystem('../templates/'); ?>
<?php $twig = new Twig_Environment($loader); ?>

<?php

if(isset($_GET['get_session']) && !empty($_SESSION['current'])){
    echo $_SESSION['current'];
}

else if(isset($_GET['request'])){
    $_SESSION['current'] = 'request';
    $query_get_all_songs = "SELECT * FROM songs";
    $result_recieved = mysqli_query($connection, $query_get_all_songs);
    print_songs($result_recieved);
}

else if(isset($_GET['playlist'])){
    $_SESSION['current'] = 'playlist';
    $query_get_all_songs = "SELECT * FROM playlist";
    $result_recieved = mysqli_query($connection, $query_get_all_songs);
    echo $twig->render('playlist.html', array('data' => $result_recieved));
}

else if(isset($_GET['songid'])){
    $_SESSION['current'] = $_GET['songid'];
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
        echo "<h3>YOUR SEARCH MATCHES FOLLOWING RESULTS</h3>";
        print_songs($result);
    }
    else{
        echo "<h3>OOPSS NO RESULTS</h3>";
    }
}
else if(isset($_GET['playlist_get'])){
    $_SESSION['current'] = $_GET['playlist_get'];
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

else if(isset($_GET['song_id'])){
    $_SESSION['current'] = 'playlist';

    $id_of_song = $_GET['song_id'];
    $query = "SELECT * FROM playlist";
    $result = mysqli_query($connection,$query);
    ?>
     <h4> Click on the playlist to add</h4>
    <?php
    while($row = mysqli_fetch_assoc($result)){
        $play_list_id = $row['playlist_id'];
        ?>
        <a href="?q=playlist_id&song_id=<?php echo $id_of_song;?>"><h3 class="playlist_add" id="<?php echo $play_list_id;?>"><?php echo $row['playlist_name'];?></h3></a>
        <?php
    }
}

else if(isset($_GET['get_user_profile'])){
    $_SESSION['current'] = $_GET['get_user_profile'];
    echo $_SERVER['REMOTE_ADDR'];
}

function print_songs($result_recieved){
    global $twig;
    echo $twig->render('songs.html', array('data' => $result_recieved));
}

?>