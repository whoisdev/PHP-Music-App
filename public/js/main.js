//Driver Functions
const site_url = 'http://localhost/PHP-Music-App';
$( document ).ready(function() {
    var UI = UIcontroller();
    UI.playbar();
    ajax_controller(UI);
});

let ajax_controller = function(UI) {
    $('#main').on('click', '.song_add_playlist', function (){
        var id = this.id;
        let data = {
            song_id: id
        };
        $.ajax({
            url: `${site_url}/ajax`,
            data: data
            , success: function (data) {
                $('.options').remove();
                $('#'+id).append(data);
            }
        });
    });
    $("#all_songs").on('click', () => {
        history.pushState({},"",`${site_url}/songs/all`);
        $.get(`${site_url}/songs/ajax`, { request:1 }, function(data) {
            $("#main").html(data);
        });
        if($( window ).width()<='768'){
            $('.songs-div').fadeOut();
        }
    });

    $('body').click(function () {
        $('.options').html('');
    });
    $('#search_query').keyup(()=>{
        $.get(`${site_url}/songs/search`, { request:$('#search_query').val() }, function(data) {
            $("#main").html(data);
        });
    });
    $("#mobile").on('click',()=>{
        $(".songs-div").toggle();
    })
    $('#main').on('click', '.get_song', function (){
        let id = this.id;
        $.ajax({
            url:`${site_url}/songs/playsong`,
            type: 'get',
            data : { song:id, isajax:'true'},
            success : function (response){
                response = JSON.parse(response);
                handle_song(response, id);           
            }
        });
    });
    $('#play').on('click',()=>{
        UI.song_handle();
    });
    $('#html_player').on("canplay", function () {
        $("#start_time").html('0.00');
        $("#end_time").html(millisToMinutesAndSeconds(this.duration));
    });
    $('#main').on('click', '.values', function (){
        let id = this.id;
        var element = $(this).parent().parent().attr('id');
        let values ={
            'playlist_id' : id,
            'song_id' : element
        };
        $.post(`${site_url}/playlist/addsong`,values,(data)=>{
            $('body').append(data);
            $('.options').html('');
            setTimeout(()=>{
                $('.message').fadeOut();
            },500);
        });
    });
    $('#mute').on('click',()=>{
        let button = $('#html_player')[0];
        if(button.muted){
            button.muted = false;
        }
        else{
            button.muted = true;
        }
    });
    $('#next').on('click',()=>{
        var id_current = getUrlParameter('song');
        if(id_current){
            $.ajax({
                url:`${site_url}/songs/getnextsong`,
                type: 'get',
                data : { song: id_current },
                success : function (response){
                    console.log(response);         
                }
            });
        }
    });
}


let UIcontroller = function () {
    let button = $('#html_player')[0];
    return {
          song_handle : function () {
              if(button.paused == false){
                $('#play img').attr("src","../images/play.png");
                button.pause();
              }
              else{
                $('#play img').attr("src","../images/pause.png");
                button.play();
              }
          },
        dom_manupulation : function (id,content) {
            $("#"+id).html(content);
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

function handle_song(response, id){
    let button = $('#html_player')[0];
    let source = document.getElementById('audiosrc');
    source.src = response.location;
    button.load();
    button.play(); 
    $('#play img').attr("src","../images/pause.png"); 
    window.history.pushState({},"",`${site_url}/songs/playsong?song=${id}`); 
}

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
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};