$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url:'ajax_drukowanieListy.php',
        data:{
              rodzaj: '1'
             },
        success:function(html){
            $('#Lista').html(html);
        }

    })
})