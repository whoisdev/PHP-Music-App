init();
function init(){
    // var duration = $('#html_player')[0];
    // $("#start_time").text('0.00');
    // console.log(duration.duration);
    // $('end_time').text(duration.duration);

}
$("#play_song").on('click',()=>{
    song_handle();
});

$(".get_song").click(function(){
    var id = this.id;
    console.log(id);
    var url= `controllers/player_controller.php`;
    $.ajax({
        type:'GET',
        url:url,
        data:{title:id},
        success: function(data){
            $("#html_player").attr("src","music/"+data);
            init();
            song_handle();
        }
    });
});

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
