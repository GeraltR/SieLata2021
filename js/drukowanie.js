$(document).ready(function(){
    $.ajax({
        type: 'POST',
        url:'ajax_drukowaniekart.php',
        data:{czyseniorzy: $('#czysenior').val(),
              czymlodzicy: $('#czymlod').val(),
              czykarton: $('#czykarton').val(),
              czyplastik: $('#czyplastik').val(),
              jakiorder: $('#jakiorder').val(),
              idmod: $('#idmod').val(),
              odnumeru:$('#odnumeru').val()
             },
        success:function(html){
            $('#kartystartowe').html(html);
        }

    })
})