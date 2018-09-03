<?php

class Playlist extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
        $this->playListModel = $this->model('UserPlaylist');
    }
    /*
        - This function will get all the playlist
    */
    public function all(){
       $data = $this->playListModel->all();
       $this->view('playlist',$data);  
    }
    public function ajax(){
        $result = $this->playListModel->getPlayList();
        ?>
        <ul class="options">
        <?php
        foreach($result as $val){
            echo "<li class='values' id={$val->playlist_id}><h4>{$val->name}</h4></li>
            ";
        }
        ?>
        </ul>
        <?php
    }
    public function addsong(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
           $playlist_id = $_POST['playlist_id'];
            $song_id = $_POST['song_id'];
            
        }
    }
}

?>