<?php
    error_reporting(0);
    $IdMod = $_POST['idmod'];
    $Rodzajmodelu = $_POST['rodzajmodelu'];
    $NazwaMod = $_POST['nazwamod'];
    $Skala = $_POST['skala'];
    $Wydawca = $_POST['wydawca'];
    $IdUsr = $_POST['idusr'];
    $IdKat = $_POST['idkat'];
    if (isset($_POST['admin']))
      $admin=$_POST['admin'];
    else $admin='nie'; 
    $response = array(array());

    require_once('lib/kontrolki.php');

    try {
        $wstaw = new festiwal;
        $wstaw->Zmien_Model($IdUsr, $IdMod, $NazwaMod, $Skala, $Wydawca, $IdKat);
        $tabela = new kontrolka;
        if ($admin==='tak')
          $wynik = $tabela->modele_zawodnikaAdmin($IdUsr);
        else   
          $wynik = $tabela->modele_zawodnika($IdUsr); 
        if (empty ($wynik)) {
            $wynik= '';
        }
        else {
            $response['uzytkownik']['modele'] = $wynik;    
        }
    } catch(PDOException $e) {
        http_response_code(500);
        $komunikat = $e->getMessage();
    }
    //echo $wynik;

    $response['uzytkownik']['id'] = $IdUsr;
    header( 'Content-Type: application/json' );
    echo json_encode ($response);
?>
