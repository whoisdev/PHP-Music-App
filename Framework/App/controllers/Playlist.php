<?php

class Playlist extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    /*
        - This function will get all the playlist
    */
    public function all(){
       echo "<script>alert()</script>";
    }
}

?>