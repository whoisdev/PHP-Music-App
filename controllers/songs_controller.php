<div class="col-sm-4 col-md-4 songs-div">
    <div class="input-group">
        <input type="text" class="form-control search-bar" placeholder="Search Songs">
        <div class="input-group-btn">
            <button class="btn btn-default search-btn" id="search_song">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
    <h4>All songs</h4>
    <?php
    $get_all_songs = "SELECT * FROM songs";
    $result_all_songs = mysqli_query($connection,$get_all_songs);
    while($row = mysqli_fetch_assoc($result_all_songs)){
        $id_of_song = $row['id'];
        ?>
        <div class="card w-50">
            <div class="card-body">
                <div>
                    <button class="icons get_song" id="<?php echo $row['id'];?>"><img  src="images/play.png" class="add_to"></button>
                    <a href="?add=<?php echo $id_of_song;?>"><img class="add_to" src="images/add_to.png" id="<?php echo $row['id'];?>"></a>
                </div>
                <p class="card-title"><?php echo $row['title'] ?></p>
                <p class="card-text"><?php echo $row['length'] ?></p>
            </div>
        </div>
        <hr>
<?php
    }
?>
</div>


