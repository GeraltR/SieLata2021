<?php
   require_once('lib/kontrolki.php');
   if (!empty($_POST['kategoria_target']))
     $cel = $_POST['kategoria_target'];
   else $cel='';
   if (!empty($_POST['kategoria_source']))
     $zrodlo = $_POST['kategoria_source'];
   else $zrodlo='';
   if ($zrodlo != '' && $cel != '') {
     $wykonaj = new festiwal;
     $wynik = $wykonaj->przeniesDoKategorii($zrodlo, $cel);
   }
   $wynik = $cel;

   echo $wynik;
?>