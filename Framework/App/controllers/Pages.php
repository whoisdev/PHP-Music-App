<?php

class Pages extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    
    public function index(){
        $data = [
            'Title'=>'Welcome to the MVC'
        ];
        $this->view('index',$data);
    }

    public function add($id){
    }
    
}

?>