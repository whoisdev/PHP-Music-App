<?php
/*

    - Base Controller will load views and models

*/
 class Controller{

    public function view($view, $data = []){
        if(file_exists('../App/views/' . $view .'.php')){
            require_once '../App/views/' . $view .'.php';
        } else{
            die('does Not exists');
        }
    }

 }

?>