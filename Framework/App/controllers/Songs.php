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
            'songs'=> $allSongs
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
    public function search(){
        if($_SERVER['REQUEST_METHOD']== 'GET'){
           echo $this->twig->render('songs.html',array(
               'data'=>$this->postModel->search($_GET['request']),
               'title'=>'Your Search Result',
                'root'=>URLROOT
           ));
        }
    }
    public function playsong(){
        if($_SERVER['REQUEST_METHOD']== 'GET'){
            $song_id = $_GET['song'];
            $data = [
                'name'=> $this->postModel->getSongLocation($song_id)->name,
                'location'=>$this->postModel->getSongLocation($song_id)->location
            ];
            echo json_encode($data);
         }
    }
    public function history(){
        $allSongs = $this->postModel->history();

        $data = [
            'songs'=> $allSongs
        ];
        $this->view('index',$data);
    }
}

?>