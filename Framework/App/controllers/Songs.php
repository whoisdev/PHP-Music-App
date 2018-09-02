<?php

class Songs extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
        $this->postModel = $this->model('Song');
    }
    /*
        - This function will get all the songs
    */
    public function all(){
        $allSongs = $this->postModel->getSongs();
        $data = [
            'songs'=> $allSongs
        ];
        $this->view('index',$data);
    }
    /*
        - This Function Will get all the playlist for the user
    */
    public function playlists(){

    }
}

?>