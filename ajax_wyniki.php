<?php
   require_once('lib/kontrolki.php');
   if (isset($_POST['czydyplom'])) {
      $CzyDyplom=$_POST['czydyplom'];
   }
   else {
      $CzyDyplom='';
   }
   $ns= new kontrolka;
   $nagrody='<div class="row" id="wyniki">';
   if($CzyDyplom=='tak'){
      $nagrody.='<button id="btnAllDyplomy" type="submit" style="margin: 5px 5px 5px 15px;" class="btn-primary btn-block" onclick="drukujDyplom(0,0,3)"> Wszystkie dyplomy </button>';
      $nagrody.='<button id="btnDrukujDyplomyMlodzik" type="submit" style="margin: 5px 5px 5px 15px;" class="btn-secondary btn-block" onclick="drukujDyplom(0,0,5)"> Dyplomy dla młodzików i juniorów </button>';
      $nagrody.='<button id="btnDrukujDyplomyListe" type="submit" style="margin: 5px 5px 5px 15px;" class="btn-secondary btn-block" onclick="DrukujListeMlodzikJunior()"> Drukuj listy: młodzików i juniorów, seniorów wyników </button>';
   }
   $nagrody.='<div class="col-sm-10">';
   $nagrody.= $ns->info_dlaAdmina();
   $nagrody.='</div>';
   $nagrody.='<div class="col-sm-5">';
   $nagrody.= $ns->Nagrody_specjalne($CzyDyplom);
   $nagrody.='</div><div class="col-sm-5">';
   $nagrody.= $ns->Nagrody_klasy($CzyDyplom);
   $nagrody.='</div>';
   $nagrody.='</div>';

   header( 'Content-Type: application/json' );
   echo json_encode($nagrody);
?>