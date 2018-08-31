<div id="playbar">
    <div class="container">
        <div class="play-bar row">
            <div id="prev" class="col-xs-2">
                <button class="icons"><img src="images/prev.png"></button>
            </div>
            <div class="col-xs-2">
                <button class="icons"><img src="images/shuffle.png"></button>
            </div>
            <div id="play" class="col-xs-4">
                <button class="icons" id="play_song"><img src="images/play.png"></button>
            </div>
            <div class="col-xs-2">
                <button class="icons"><img src="images/repeat.png"></button>
            </div>

            <div id="next" class="col-xs-2">
                <button class="icons"><img src="images/next.png"></button>
            </div>

        </div>
        <div class="row">
            <div class="player">
                <div class="col-xs-2" id="start_time">- -</div>
                <div class="col-xs-8 play">
                    <div id ="played">

                    </div>
                </div>
                <div class="col-xs-2" id="end_time">- -</div>
                <audio controls id="html_player">
                    <source src="music/" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        </div>
    </div>
</div>