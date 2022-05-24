$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url:'ajax_drukowanieDyplomu.php',
        data:{
              dypidmod: $('#dypidmod').val(),
              dypnagroda: $('#dypnagroda').val(),
              dyprodzaj: $('#dyprodzaj').val()
             },
        success:function(html){
            $('#Dyplom').html(html);
            if ($('#dyprodzaj').val()!=3){
               $('#Dyplom').summernote();
            }
        }

    })
})