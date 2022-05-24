<?php 
   require_once('lib/kontrolki.php');
   if (!empty($_POST['rodzaj_id']))
     $rodzaj = $_POST['rodzaj_id'];
   else $rodzaj='K';  
   $kategoriaPlast = new kontrolka;
   $lookup = '';
   //$lookup = $lookup.'<select id="kategorie" name="kategorie" onchange="">';
   $lookup = $lookup.$kategoriaPlast->klasy_lookup($rodzaj);
   //$lookup = $lookup.'</select>';
   echo $lookup;
?>