<?php
if(!isset($_SESSION['username'])){
    session_start();
}
class Playlist extends Controller{
    private $db;
    public function __construct(){
        $this->db = new Database;
        if(!empty($_SESSION['username'])){
            $this->playListModel = $this->model('UserPlaylist');
        }
    }
    /*
        - This function will get all the playlist
    */
    public function all(){
        if(!empty($_SESSION['username'])){
            $data = $this->playListModel->all();
            $this->view('playlist',$data); 
        } else{
            header("location:http://localhost/PHP-Music-App/Framework/profile/signin");
        }
    }

    public function play($params){
        $params = str_replace("-"," ",$params);
        $data = $this->playListModel->playlist_songs($params);
        $this->view('playlist',$data); 
        
     }

    public function ajax(){
        ?>
        <ul class="options">
        <?php
        if(empty($_SESSION['username'])){
            echo "<li><h4><a href = 'http://localhost/PHP-Music-App/Framework/profile/signin'>Sign In To add Songs to Playlist</a></h4></li>";            
        } else{
            $result = $this->playListModel->getPlayList();
            foreach($result as $val){
                echo "<li class='values' id={$val->playlist_id}><h4>{$val->name}</h4></li>";
            }
        }
        ?>
        </ul>
        <?php
    }
    public function addsong(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $playlist_id = $_POST['playlist_id'];
            $song_id = $_POST['song_id'];
            if($this->playListModel->addToPlaylist($playlist_id,$song_id)){
                echo "<h3 class='message success'>SUCCESS</h3>";
            }
            else{
                echo "<h3 class='message banner'>ERROR OCCURED</h3>";
            }
        }
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            if($this->playListModel->addPlaylist($name)){
                echo "<h3 class='message success'>SUCCESS</h3>";
            }
            else{
                echo "<h3 class='message banner'>ERROR OCCURED</h3>";
            }
        }
        else{
            $this->all();
        }
    }
}

?>