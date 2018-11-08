<div id="playbar">
    <div class="container">
        <div class="play-bar row">
            <div id="prev" class="col-xs-2 playbar_button">
                <img src=<?php echo URLROOT."/images/prev.png"?>>
            </div>
            <div class="col-xs-2 playbar_button">
                <img src=<?php echo URLROOT."/images/shuffle.png"?>>
            </div>
            <div id="play" class="col-xs-4 playbar_button">
                <img src=<?php echo URLROOT."/images/play.png"?>>
            </div>
            <div id='mute' class="col-xs-2 playbar_button">
                <img src=<?php echo URLROOT."/images/mute.png"?>>
            </div>

            <div id="next" class="col-xs-2 playbar_button">
                <img src=<?php echo URLROOT."/images/next.png"?>>
            </div>

        </div>
        <div class="row">
            <div class="player">
                <div class="col-xs-2 playbar_button" id="start_time">- -</div>
                <div class="col-xs-8 play">
                    <div id ="played">

                    </div>
                </div>
                <div class="col-xs-2 playbar_button" id="end_time">- -</div>
                <audio id='html_player' controls="controls">
                    <source src=" " id='audiosrc' type="audio/mpeg"/>
                </audio>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 playbar_button" id="song_name">
                <h4 id="title_name"></h4>
            </div>
        </div>
    </div>
</div>
