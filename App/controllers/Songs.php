<?php
require_once '../../vendor/autoload.php';
class Songs extends Controller{
    private $db;
    private $twig;
    public function __construct(){
        $this->db = new Database;
        $this->postModel = $this->model('Song');
        $loader = new Twig_Loader_Filesystem('../App/templates');
        $this->twig = new Twig_Environment($loader, array(
            'debug' => true
        ));
        $this->twig->addExtension(new Twig_Extension_Debug());
    }
    /*
        - This function will get all the songs
    */
    public function all(){
        $allSongs = $this->postModel->getSongs();
        $data = [
            'songs'=> $allSongs,
            'Title'=>'All songs'
        ];
        $this->view('index',$data);
    }
    /*
        - This Function Will get all the playlist for the user
    */
    public function ajax(){
        $allSongs = $this->postModel->getSongs();
        echo $this->twig->render('songs.html',array(
            'data' => $allSongs,
            'title' => 'ALL SONGS',
            'root'=>URLROOT
        ));
    }
    /*
        - AJAX search for songs
    */
    public function search(){
        if($_SERVER['REQUEST_METHOD']== 'GET'){
           $data = $this->postModel->search($_GET['request']);
           if(empty($data)){
               $title = 'Sorry no results Found :(';
           } else{
               $title = 'Your Search Result';
           }
           echo $this->twig->render('songs.html',array(
               'data'=>$data,
               'title'=>$title,
                'root'=>URLROOT
           ));
        }
    }
    /*
        - AJAX search for getting the location of the song 
    */
    public function playsong(){
        if($_SERVER['REQUEST_METHOD']== 'GET'){
            $song_id = $_GET['song'];
            $data = [
                'name'=> $this->postModel->getSongLocation($song_id)->name,
                'location'=>$this->postModel->getSongLocation($song_id)->location
            ];
            $response = json_encode($data);
            echo $response;
         }
    }
    /*
        - Will return all the history of the active user.
    */
    public function history(){
        $allSongs = $this->postModel->history();

        $data = [
            'songs'=> $allSongs
        ];
        $this->view('history',$data);
    }
}

?>