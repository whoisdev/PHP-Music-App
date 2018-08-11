<?php include "partials/header.php"; ?>
        <?php  include "controllers/songs_controller.php"?>
        <?php
            if(isset($_GET['add'])){
                $id_to_add_song = $_GET['add'];
                mainsection::add_song_to_playlist($id_to_add_song);

            }
            else{
                mainsection::print_all();
            }
        ?>
        <?php include "controllers/profile_controller.php" ?>
        <?php include "controllers/player_controller.php";?>
<?php  include "partials/footer.php"?>



