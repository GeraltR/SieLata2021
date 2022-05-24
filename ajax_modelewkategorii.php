<?php 
   session_start();
   include ('lib/kontrolki.php');
   if (!empty($_POST['kategoria_id']))
     $kategoria = $_POST['kategoria_id'];
   else $kategoria=0;  
   if (isset($_POST['idcri']))
      $idcri=$_POST['idcri'];
   else { 
      $idcri=0;
   }
   if ($idcri!=0){   
      $modeleSenior = new kontrolka;
      $tabelasenior = $modeleSenior->seniorzy_ocenianie($kategoria, $idcri);
   }
   else $tabelasenior = '';
   echo $tabelasenior;
?>