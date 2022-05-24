<?php
    error_reporting(0);
    $IdMod = $_POST['idmod'];
    $response = array(array());

    require_once('lib/kontrolki.php');

    try {
        $user = new festiwal;
        $IdUsr = $user->DajIdUzytkownika($IdMod);

        $user->Usun_Model($IdMod);

        $tabela = new kontrolka;
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
