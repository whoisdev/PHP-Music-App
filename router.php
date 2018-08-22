<?php
class router{

    public function get($request){
        if($request == 'singup'){
            include "controllers/singup.php";
        }
        else if($request == 'request'){
            global $connection;
            $_SESSION['current'] = 'request';
            $query_get_all_songs = "SELECT * FROM songs";
            $result_recieved = mysqli_query($connection, $query_get_all_songs);
            self::print_songs($result_recieved,'All Songs');
        }
        else if($request == 'playlist'){
            global $connection;
            global $twig;
            $_SESSION['current'] = 'playlist';
            $query_get_all_songs = "SELECT * FROM playlist";
            $result_recieved = mysqli_query($connection, $query_get_all_songs);
            echo $twig->render('playlist.html', array('data' => $result_recieved));
        }
        else if($request == 'profile'){
            global $connection;
            global $twig;
            if(!isset($_SESSION['user'])){
                echo $twig-> render('login.html');
            }
            else{
                $username = $_SESSION['user'];
                $query_user = "SELECT username FROM users WHERE username = '{$username}'";
                $result = mysqli_query($connection, $query_user);
                $result = mysqli_fetch_assoc($result);
                echo $twig->render('user_profile.html',array('data'=> $result));
            }
        }
    }

    private function print_songs($result_recieved,$title){
        global $twig;
        echo $twig->render('songs.html', array(
                'data' => $result_recieved,
                'title' => $title )
        );
    }
}
?>