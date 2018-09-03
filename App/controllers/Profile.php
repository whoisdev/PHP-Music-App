<?php
if(!isset($_SESSION)){
    session_start();
}
class Profile extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
        $this->userModel = $this->model('User');
    }
    /*
        - Sign in a user when requested with a correct username and password
    */
    public function signin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $values = [
                'username'=>$_POST['username'],
                'password'=>$_POST['password']
            ];
            if(empty($values['username'])){
                $data['username'] = 'Please Enter a Valid Username';
            } else if(empty($values['password'])){
                $data['password'] = 'Please Enter a Valid Password';
            }
            if(!empty($data)){
                $this->view('signin',$data);
            } else{
                if($this->userModel->login($values)){
                    header('location:'.URLROOT.'songs/all');
                }
                else{
                    $data['error'] = 'Invalid Username or Password';
                    $this->view('signin',$data);
                }
            }
        } else{
            $data = [

            ];
            $this->view('signin',$data);
        }
    }
    /*
        - Sign up a user when requested with a correct username and password
    */
    public function singup(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $values = [
                'username'=>$_POST['username'],
                'password'=>$_POST['password']
            ];
            if(empty($values['username'])){
                $data['username'] = 'Please Enter a Valid Username';
            } else if(empty($values['password'])){
                $data['password'] = 'Please Enter a Valid Password';
            }
            if(!empty($data)){
                $this->view('signup',$data);
            } else{
                $this->userModel->signup($values);
                header('location:'.URLROOT.'songs/all');
            }
        } else{
            $data = [

            ];
            $this->view('signup',$data);
        }
    }
    /*
        - Sign out a user
    */
    public function signout(){
        unset($_SESSION['username']);
        header('location:'.URLROOT.'songs/all');        
    }
}


?>