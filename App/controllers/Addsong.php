<?php
if(!isset($_SESSION)){
    session_start();
}
/*
    - Add songs and move it to public/music
*/
class Addsong extends controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
        if(!empty($_SESSION['username'])){
            $this->addSongModel = $this->model('AddSongs');
        }
        else{
            header("location:".URLROOT."profile/signin");
        }
    }
    /*
        - Show the front end page for the add
        - new song page.
    */
    public function all(){
        if(!empty($_SESSION['username'])){
            $this->view('addsong');
        }
    }
    /*
        - Form submission end point for the 
        - add new song
    */
    public function submit(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sourcePath = $_FILES['music_file']['tmp_name'];
            $targetPath = "./music/" . $_FILES['music_file']['name'];
            if(move_uploaded_file($sourcePath,$targetPath)){
                $this->addSongModel->addSong($_FILES['music_file']['name'],'../music/'.$_FILES['music_file']['name']);
                header("location:index.php");
            }
            else{
                echo "<h3 class='banner'>An error occured while adding song. Please try again</h3>";
            }
        }
    }
}

?>