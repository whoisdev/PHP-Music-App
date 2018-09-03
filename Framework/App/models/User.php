<?php
if(!isset($_SESSION)){
    session_start();
}
class User{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    /*
        - Log in a user and set the session
    */
    public function login($values){
        $this->db->query("SELECT password FROM users WHERE username = :username");
        $this->db->bind(':username',$values['username']);
        $password = $this->db->result();
        if($password->password === md5($values['password'])){
            $_SESSION['username'] = $values['username'];
            return true;
        } else{
            unset($_SESSION['username']);
            return false;
        }
    }
    /*
        - Sign up a user and set the session.
    */
    public function signup($values){
        $this->db->query('INSERT INTO users (username,password) VALUES (:username,:password)');
        $this->db->bind(':username', $values['username']);
        $this->db->bind(':password', md5($values['password']));
        if(!$this->db->execute()){
            die('something went wrong');
        } else{
            $_SESSION['username'] = $values['username'];
        }
    }
}
?>