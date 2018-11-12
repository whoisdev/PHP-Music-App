// Vue.http.options.emulateJSON = true;
new Vue({
    el : '#main',
    data : {
        ajaxRequest : false
    },
    methods : {
        addInputField : function (){
            $('.playlist_name').fadeIn();
            let button = event.target;
            button.id = 'submit_playlist';
            // this.$http({
            //     method : 'POST',
            //     url : `${site_url}/playlist/add`,
            //     data : {name:$('.playlist_name').val()} 
            // })
            // .then(response =>{
            //     $('body').append(response);
            // })
            // .catch((err) => {
            //     console.log(err);
            // })
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

// this.$http({method: 'POST', url: URL, data: data})
// .then(response => {
//    this.postResults = data;
//    this.ajaxRequest = false;
// }).catch((err) => {
//   console.log(err)
// })