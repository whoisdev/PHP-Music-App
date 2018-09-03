<?php
class UserPlaylist{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPlayList(){
        $this->db->query("SELECT * FROM playlist");
        return $this->db->resultSet();
    }

    public function all(){
        return $this->getPlayList();
    }
    public function addToPlaylist($id){
        $this->db->query("INSERT INTO playlist_assoc (:playlist_id)");
    }

}


?>