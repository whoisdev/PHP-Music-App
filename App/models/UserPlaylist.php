<?php
class UserPlaylist{
    private $db;

    public function __construct(){
      $this->db = new Database;
      $this->db->query("SELECT user_id FROM users WHERE username = :username ");
      $this->db->bind(':username',$_SESSION['username']);
      $this->user_id = $this->db->result()->user_id; 
    }
    /*
        - Gets all the playlist for the active user
    */
    public function getPlayList(){
        $this->db->query("
        SELECT * FROM playlist 
        WHERE user_id = :user_id");
        $this->db->bind(':user_id',$this->user_id);
        return $this->db->resultSet();
    }
    /*
        - Gets all the playlist for the active user
    */
    public function all(){
        return $this->getPlayList();
    }
    /*
        - Add a song into playlist
    */
    public function addToPlaylist($playlist_id,$song_id){
        $this->db->query("
        INSERT INTO playlist_assoc (playlist_id,song_id) 
        VALUES (:playlist_id, :song_id)
        ");
        $this->db->bind(':playlist_id',$playlist_id);
        $this->db->bind(':song_id',$song_id);
        return $this->db->execute();
    }
    /*
        - Gets all the songs in the playlist
    */
    public function playlist_songs($name){
        $this->db->query("
            SELECT playlist_id 
            FROM playlist 
            WHERE name = :name
        ");
        $this->db->bind(':name',$name);
        $playlist_id = $this->db->result()->playlist_id;
        $this->db->query("
            SELECT playlist_assoc.song_id,
            name,location
            FROM playlist_assoc JOIN songs
            ON playlist_assoc.song_id = songs.song_id
            WHERE playlist_id = :playlist_id
        ");
        $this->db->bind(':playlist_id',$playlist_id);
        return ($this->db->resultSet());
    }
    /*
        - Add a playlist
    */
    public function addPlaylist($name){
        $this->db->query("
            INSERT INTO playlist (name,user_id) VALUES (:name,:user_id); 
        ");
        $this->db->bind(':name',$name);
        $this->db->bind(':user_id',$this->user_id);
        return $this->db->execute();

    }
}


?>