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

}


?>