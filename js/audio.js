$( document ).ready(function() {
        ajax_controller();
});

let ajax_controller = function() {
    /*
        - This function is to check if the user reloaded a page and see what
        - page the user refreshed on
     */
    window.onload = function (e) {
        get_session().
        then((result)=>{
            let obj ={};
            obj[result] = 'all';
            $.ajax({
                type: 'GET',
                url: "./controllers/songs_ajax.php",
                data: obj,
                success: function (data) {
                    $("#main").html(data);
                }
            });
        });
    };

    /*
        - This call back is to get all the songs
     */

    $("#all_songs").on('click', () => {
        $.get('./controllers/songs_ajax.php', { request:1 }, function(data) {
            $("#main").html(data);
        });
    });

    /*
        - This call back is to get all the playlist
     */

    $("#playlist").on('click',()=>{
        $.ajax({
            type: 'GET',
            url: "./controllers/songs_ajax.php",
            data: {playlist: "all"},
            success: function (data) {
                $("#main").html(data);
            }
        });
    });

    /*
        - This callback is to get the location of the songs which is clicked
        - it will return the name of the file
     */

    $('#main').on('click', '.get_song', function (){
        var id = this.id;
        $.ajax({
            url:"./controllers/songs_ajax.php",
            data:{songid:id}
            ,success:function(data) {
                $("#html_player").attr("src",data);
                song_handle();
            }
        });
    });

    /*
        - This callback it to play the song
     */

    $('#play_song').on('click',()=>{
        song_handle();
    });

    /*
        - This callback is to set the time of the player
     */

    $('#html_player').on("canplay", function () {
        $("#start_time").html('0.00');
        $("#end_time").html(millisToMinutesAndSeconds(this.duration));
    });

    /*
        - This is to search the songs whenever a key is pressed
     */
    $("#search_query").keyup(function() {
        var query = $("#search_query").val();
        if (query){
            $.ajax({
                url: "./controllers/songs_ajax.php",
                data: {search: query}
                , success: function (data) {
                    $("#main").html(data);

                }
            });
        }
    });
    /*
        - This is to play a playlist
     */
    $('#main').on('click', '.play_playlist', function (){
        var id = this.id;
        $.ajax({
            url: "./controllers/songs_ajax.php",
            data: {playlist_get: id}
            , success: function (data) {
                $("#main").html(data);
            }
        });
    });

    $('#main').on('click', '.song_add_playlist', function (){
        var id = this.id;
        let data = {
            playlist_add: id
        };
        $.ajax({
            url: "./controllers/songs_ajax.php",
            data: data
            , success: function (data) {
                $("#sidebar").html(data);
            }
        });
        var recursiveEncoded = $.param(data);
        var recursiveDecoded = decodeURIComponent($.param( data ));
        window.history.pushState(recursiveDecoded);
        console.log(recursiveDecoded);
    $('#sidebar').on('click', '.playlist_add', function (){
        this.submit();
    });

    });


    /*
        - This function returns a promise which will return the page on which the webpage is reloaded
     */

    function get_session(){
        return new Promise((resolve,reject)=>{
            $.ajax({
                type: 'GET',
                url: "./controllers/songs_ajax.php",
                data: {get_session:'current'},
                success: function (data) {
                    resolve(data);
                },
                error: function (error) {
                    reject(error);
                }
            });
        })
    }
};

/*
    - This is to change the play and pause state and the image of the player
 */
function song_handle(){
    var button = $('#html_player')[0];
    if(button.paused == false){
        $('#play_song img').attr("src","images/play.png");
        button.pause();
    }
    else{
        $('#play_song img').attr("src","images/pause.png");
        button.play();
    }
}

const button = $('#html_player')[0];
button.addEventListener('timeupdate', (event) => {
    const currentTime = (button.currentTime / button.duration)*100;
    if(currentTime){
        $("#start_time").html(millisToMinutesAndSeconds(button.currentTime));
        $("#played").css('width',currentTime+"%");
    }
}, false);

function millisToMinutesAndSeconds(inputSeconds) {
    const secs = parseInt( inputSeconds, 10 );
    let minutes = Math.floor( secs / 60 );
    let seconds = secs - minutes * 60;

    if ( 10 > minutes ) {
        minutes = minutes;
    }
    if ( 10 > seconds ) {
        seconds = '0' + seconds;
    }

    // Return display.
    return minutes + ':' + seconds;
}