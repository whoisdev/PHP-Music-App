//Driver Functions
$( document ).ready(function() {
    var UI = UIcontroller();
    UI.toggle_class();
    UI.playbar();
    ajax_controller(UI);
});

let ajax_controller = function(UI) {
    $('#main').on('click', '.song_add_playlist', function (){
        var id = this.id;
        let data = {
            song_id: id
        };
        var element = (event.target.parentElement.classList[1]);

        $.ajax({
            url: "http://localhost/PHP-Music-App/Framework/playlist/ajax",
            data: data
            , success: function (data) {
                $('#'+id).append(data);
            }
        });
    });
    $("#all_songs").on('click', () => {
        history.pushState({},"",'http://localhost/PHP-Music-App/Framework/songs/all');
        $.get('http://localhost/PHP-Music-App/Framework/songs/ajax', { request:1 }, function(data) {
            $("#main").html(data);
        });
    });

    $('body').click(function () {
        $('.options').hide();
    });
    $('#search_query').keyup(()=>{
        $.get('http://localhost/PHP-Music-App/Framework/songs/search', { request:$('#search_query').val() }, function(data) {
            $("#main").html(data);
        });
    });
    $("#mobile").on('click',()=>{
        $(".songs-div").toggle();
    })
}


let UIcontroller = function () {
    let button = $('#html_player')[0];
    return {
          song_handle : function () {
              if(button.paused == false){
                  $('#play_song img').attr("src","../images/play.png");
                  button.pause();
              }
              else{
                  $('#play_song img').attr("src","../images/pause.png");
                  button.play();
              }
          },
        dom_manupulation : function (id,content) {
            $("#"+id).html(content);
        },
        toggle_class : function () {
            $('.sidebar_button').on('click',(e)=>{
                $( ".sidebar_button").removeClass( "active" );
                $(this).toggleClass("active");
            });
        },
        playbar : function () {
            button.addEventListener('timeupdate', (event) => {
                const currentTime = (button.currentTime / button.duration)*100;
                if(currentTime){
                    $("#start_time").html(millisToMinutesAndSeconds(button.currentTime));
                    $("#played").css('width',currentTime+"%");
                }
            }, false);
        }
      }

};

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

    return minutes + ':' + seconds;
}

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