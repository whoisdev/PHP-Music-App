<?php

class Songs extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    
    public function all(){
        $data = [
            'Title'=>'Welcome to the MVC'
        ];
        $this->view('index',$data);
    }
}

?>