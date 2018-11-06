<?php
if(!isset($_SESSION)){
    session_start();
}
class AddSongs{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function addPage(){
        echo 'here';
    }
}

?>