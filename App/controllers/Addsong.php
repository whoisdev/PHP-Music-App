<?php
if(!isset($_SESSION)){
    session_start();
}
class Addsong extends controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
        if(!empty($_SESSION['username'])){
            $this->addSongModel = $this->model('AddSongs');
        }
        else{
            header("location:".URLROOT."profile/signin");
        }
    }
    public function all(){
        if(!empty($_SESSION['username'])){
            $this->view('addsong');
        }
    }
}

?>