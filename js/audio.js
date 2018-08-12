$( document ).ready(function() {
    $("#all_songs").on('click', () => {
        $.ajax({
            type: 'GET',
            url: "./controllers/songs_ajax.php",
            data: {request: "all"},
            success: function (data) {
                $("#main").html(data);
            }
        });
    });
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
    $('#main').on('click', '.get_song', function (){
            var id = this.id;
            $.ajax({
                url:"./controllers/songs_ajax.php",
                data:{songid:id}
            ,success:function(data) {
                    console.log(data);
                $("#html_player").attr("src",data);
                $("#html_player")[0].play();
            }
        });
    });
});




























































// $("#search_song").on('click',()=>{
//
// });

//
// function song_handle(){
//     var button = $('#html_player')[0];
//     if(button.paused == false){
//         $('#play_song img').attr("src","images/play.png");
//         button.pause();
//     }
//     else{
//         $('#play_song img').attr("src","images/pause.png");
//         button.play();
//     }
//
// }
