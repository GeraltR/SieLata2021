<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>
<select class="form-control form-control-lg" id="rodzaj" name="rodzaj" style="font-size: 42px; height: 70px;">
    <option value="k">karton</option>
    <option value="p">plastik</option>
</select>
<select class="form-control form-control-lg" id="kategorie" name="kategorie" onchange="pokazModeleWKategorii(this.value)" style="font-size: 42px; height: 70px;">
</select>
</br><p> </p>
<div class="table-responsive" style="font-size: 22px;">
<table class="table table-striped table-hover table-sm" id="seniorzy"></table>
</div>
</br>


<script type="text/javascript">
      function dodajOcene(AId) {
        var val = document.getElementById("kategorie").value;
        $.ajax({
                type:'POST',
                url:'ajax_dodajOcene.php',
                data:'model_id='+AId+'&kategoria_id='+val,
                success:function(html){
                  $('#seniorzy').html(html);} 
                });
      }

      function pokazModeleWKategorii(AKategoria) {
        $.ajax({
                type:'POST',
                url:'ajax_modelewkategorii.php',
                data:'kategoria_id='+AKategoria,
                success:function(html){
                  $('#seniorzy').html(html);} 
                });
      }


      $(function() {
        $(document).on('change', '[name="rodzaj"]' , function(){
          var rodzaj = $('#rodzaj').val();
          $.ajax({
                type:'POST',
                url:'ajax_kategorie.php',
                data:'rodzaj_id='+rodzaj,
                success:function(html){
                  $('#kategorie').html(html);
                  $('#seniorzy').html('<table class="table table-striped table-hover table-sm" id="seniorzy"></table>');} 
                });      
        });
      });

      $(function() {
        $(document).ready(function(){
          var rodzaj = $('#rodzaj').val(); 
          $.ajax({
            type:'POST',
                url:'ajax_kategorie.php',
                data:'rodzaj_id='+rodzaj,
                success:function(html){
                  $('#kategorie').html(html);
                  $('#seniorzy').html('<table class="table table-striped table-hover table-sm" id="seniorzy"></table>');} 
                });
          });
        
      });

</script>


</body>
</html>