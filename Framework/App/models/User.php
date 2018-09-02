<?php

class User{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function login($values){
        $this->db->query("SELECT password FROM users WHERE username = :username");
        $this->db->bind(':username',$values['username']);
        $password = $this->db->result();
        if($password->password === md5($values['password'])){
            $_SESSION['username'] = $values['username'];
            return true;
        } else{
            $_SESSION['username'] = null;
            return false;
        }
    }

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