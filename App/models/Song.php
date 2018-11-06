<?php
if(!isset($_SESSION)){
    session_start();
}
class Song{
    private $db;
    private $user_id;
    public function __construct(){
      $this->db = new Database;
      if(!empty($_SESSION['username'])){
        $this->db->query("
            SELECT user_id FROM users
            WHERE username = :username ");
        $this->db->bind(':username',$_SESSION['username']);
        $this->user_id = $this->db->result()->user_id; 
      }
    }
    /*
        - Query to get all songs.
    */
    public function getSongs(){
        $this->db->query("SELECT * FROM songs");
        return $this->db->resultSet();
    }
    /*
        - Query to get all songs searched for
    */
    public function search($val){
       $this->db->query("
            SELECT * FROM songs
            WHERE name LIKE :query");
       $this->db->bind(':query',"%".$val."%");
       return $this->db->resultSet();
    }
    /*
        - Query to get the location of song when clicked play AJAX
    */
    public function getSongLocation($id){
        if(!empty($_SESSION['username'])){
            $this->add_history($this->user_id,$id);
        }
        $this->db->query("
            SELECT name,location FROM songs
            WHERE song_id = :id");
        $this->db->bind(':id',$id);
        return $this->db->result();
    }
    /*
        - Query to history of the active user.
    */
    public function history(){
        $this->db->query("
            SELECT songs.song_id,
            name,location FROM songs JOIN history
            ON songs.song_id = history.song_id 
            WHERE user_id = :user_id
        ");
        $this->db->bind(':user_id',$this->user_id);
        return $this->db->resultSet();
    }
    /*
        - Query to set the history
    */
    public function add_history($user_id = null,$song_id){
        $this->db->query("
            INSERT INTO history 
            (song_id,user_id) VALUES (:song_id,:user_id)
        ");   
        $this->db->bind(":song_id",$song_id);
        $this->db->bind(":user_id",$user_id);     
        $this->db->execute();
    }
}
?>