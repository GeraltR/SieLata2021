<?php
    error_reporting(0);
    $IdUsr = $_POST['idusr'];
    if (isset($_POST['admin']))
      $admin=$_POST['admin'];
    else $admin='nie';  
    require_once('lib/kontrolki.php');
    try {
        $tabela = new kontrolka;
        if ($admin==='tak')
          $wynik = $tabela->modele_zawodnikaAdmin($IdUsr);
        else   
          $wynik = $tabela->modele_zawodnika($IdUsr); 
        if (!isset ($wynik)) {
            $wynik= '';
        }    
    } catch(PDOException $e) {
        http_response_code(500);
        $komunikat = $e->getMessage();
    }
    echo $wynik;
 ?>  
 