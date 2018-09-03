<?php
class Song{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getSongs(){
        $this->db->query("SELECT * FROM songs");
        return $this->db->resultSet();
    }
    public function search($val){
       $this->db->query("SELECT * FROM songs WHERE name LIKE :query");
       $this->db->bind(':query',"%".$val."%");
       return $this->db->resultSet();
    }
    public function getSongLocation($id){
        $this->db->query("SELECT name,location FROM songs WHERE song_id = :id");
        $this->db->bind(':id',$id);
        return $this->db->result();
    }
}


?>