new Vue({
    el : '#playbar',
    methods : {
        updatesong : function(event){
            var $div = $(event.target);
            var offset = $div.offset();
            var x = event.clientX - offset.left;
            console.log((x/$div.width())*100);
        },
        onTimeUpdateListener : function(){
            let button = $('#html_player')[0];
            const currentTime = (button.currentTime / button.duration)*100;
            if(currentTime){
                $("#start_time").html(millisToMinutesAndSeconds(button.currentTime));
                $("#played").css('width',currentTime+"%");
            }
        }
    }
})