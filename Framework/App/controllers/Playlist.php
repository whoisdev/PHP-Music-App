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
    public function ajax(){
        $result = $this->playListModel->getPlayList();
        ?>
        <ul class="options">
        <?php
        foreach($result as $val){
            echo "<li class='values'><h4>{$val->name}</h4></li>
            ";
        }
        ?>
        </ul>
        <?php
    }
}

?>