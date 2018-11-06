<?php
if(!isset($_SESSION)){
    session_start();
}
class AddSongs{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function addSong($fileName,$fileLocation){
        $fileName = str_replace('.mp3','',$fileName);
        $this->db->query("
        INSERT INTO songs 
        (name,location) VALUES (:name,:location)
        ");   
        $this->db->bind(":name",$fileName); 
        $this->db->bind(":location",$fileLocation); 
        $this->db->execute();
    }
}

?>