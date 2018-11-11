<?php
/*
    - Base Controller will load views and models
*/
 class Controller{

    public function view($view, $data = [], $script = null, $title = null){
        if(file_exists('../App/views/' . $view .'.php')){
            require_once '../App/views/' . $view .'.php';
        } else{
            die('does Not exists');
        }
    }

    public function model($model){
        // Require model file
        require_once '../App/models/' . $model . '.php';
  
        // Instatiate model
        return new $model();
    }

 }

?>