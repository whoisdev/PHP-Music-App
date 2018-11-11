new Vue({
    el : '#main',
    methods : {
        addInputField : function (){
            $('.playlist_name').fadeIn();
            let button = event.target;
            button.id = 'submit_playlist';
            $("#submit_playlist").on('click',()=>{
                $.post(`${site_url}/playlist/add`,{name:$('.playlist_name').val()},(data)=>{
                    $('body').append(data);
                    setTimeout(()=>{
                        $('.message').fadeOut();
                        location.reload();
                    },500);
                });
            });
        }
    }
});