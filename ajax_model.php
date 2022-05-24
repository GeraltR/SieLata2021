<?php
    error_reporting(0);
    $IdMod = $_POST['idmod'];
    require_once('lib/baza.php');
    $response = array();
    try {
        $baza = new festiwal;
        $wynik = $baza->Daj_Model($IdMod); 
        if (empty ($wynik)) {
            $response= '';
        }    
        else {
            $response['model_id'] = $wynik['id'];
            $response['model_idkat'] = $wynik['IdKat'];
            $response['model_nazwa'] = $wynik['nazwa'];
            $response['model_skala'] = $wynik['skala'];
            $response['model_producent'] = $wynik['producent'];
            $response['model_klasa'] = $wynik['klasa'];
            $response['model_katname'] = $wynik['katname'];
            $response['model_konkurs'] = $wynik['konkurs'];
        }
    } catch(PDOException $e) {
        http_response_code(500);
        $response = $e->getMessage();
    }
    header( 'Content-Type: application/json' );
    echo json_encode ($response);
?>