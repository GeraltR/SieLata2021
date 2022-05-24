<?php 
   include ('lib/kontrolki.php');
  if (!empty($_POST['model_id']))
     $modelid = $_POST['model_id'];
   else $modelid = 0;  
   if (isset($_POST['idcri']))
     $IdCri=$_POST['idcri'];
   else $IdCri=0;
   if ($IdCri != 0)
   {
      $wynik = 0;
      $wykonaj = new festiwal;
      $wynik = $wykonaj->Daj_Obecna_Ocene($modelid, $IdCri);
      if ($wynik < 3) $wynik = $wynik + 1;
      else $wynik = 0;
      $wykonaj->Dodaj_Ocene($modelid,$wynik,$IdCri);
      if (!empty($_POST['kategoria_id']))
        $kategoria = $_POST['kategoria_id'];
      else $kategoria=0;  
      $modeleSenior = new kontrolka;
      $tabelasenior = $modeleSenior->seniorzy_ocenianie($kategoria, $IdCri);
   }
   else {
      $tabelasenior = '';
   }
   echo $tabelasenior;
?>