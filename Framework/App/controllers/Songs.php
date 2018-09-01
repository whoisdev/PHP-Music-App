<?php

class Songs extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
        $this->postModel = $this->model('Song');
    }
    
    public function all(){
        $allSongs = $this->postModel->getSongs();
        $data = [
            'songs'=> $allSongs
        ];
        $this->view('index',$data);
    }
    public function playlists(){
        
    }
}

?>